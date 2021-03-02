<?php

namespace App\Http\Controllers;

use Validator;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class WebController extends Controller
{
    /**
     * Validate fields
     */
    protected function valid($rule = '', $request, $id = '')
    {
        $rules = $this->getRules($rule, $id);

        $validator = Validator::make($request->all(), $rules);

        // if ($validator->fails()) {
        //     throw new Exception($validator, 422);
        // }

        return $validator;
    }

    /**
     * Get Rules Validation
    */
    protected function getRules($prefix, $id = '')
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
