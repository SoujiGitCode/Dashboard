<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
// use Exception;

class WebController extends Controller
{
    /**
     * Validate fields
     */
    public function valid($rule = '', $request, $id = '')
    {
        $rules = $this->getRules($rule, $id);

        return Validator::make($request->all(), $rules);
    }

    public function redirectFailure($route, $validator)
    {
        return redirect($route)
        ->withErrors($validator)
        ->withInput();
    }

    /**
     * Get Rules Validation
    */
    public function getRules($prefix, $id = '')
    {
        $rule = config('rules.' . $prefix);


        if($id) {
            foreach ($rule as $key => $r) {
                if(strpos($rule[$key], 'unique')) {
                    $rule[$key] .=",".$id;
                }
            }
        }

        if(!$rule) throw new Exception('Rule does not exist', 500);

        return $rule;
    }
}
