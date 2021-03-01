<?php

namespace App\Http\Controllers;

use Validator;
use Exception;

class WebController extends Controller
{
    /**
     * Validate fields
     */
    protected function valid($rule = '', $request, $id = '')
    {
        $rules = $this->getRules($rule, $id);

        $validator = Validator::make($request->all(), $rules);

        $errors = $validator->fails() ? $validator->errors() : [];
        $language = request()->header('lang');

        if(count($errors)) {
            $errors = $errors->messages();
            $stringError = '';

            foreach ($errors as $key => $error) {
                foreach ($error as $err) {
                    if($language == 'es') {
                        $arrayValue = explode('_', $key);

                        $oldString = $this->countLabels($arrayValue);
                        $newString = __($key);

                        $replaceString = str_replace($oldString, $newString, $err);
                        $stringError = $replaceString . ' ' . $stringError;
                        continue;
                    }
                    $stringError = $err . ' ' . $stringError;
                }
            }

            throw new Exception($stringError, 422);
        }
        return false;
    }

    private function countLabels($arrLabels)
    {
        if(count($arrLabels) == 1) {
            return "$arrLabels[0]";
        }

        if(count($arrLabels) == 2) {
            return "$arrLabels[0] $arrLabels[1]";
        }

        if(count($arrLabels) == 3) {
            return "$arrLabels[0] $arrLabels[1] $arrLabels[2]";
        }
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
