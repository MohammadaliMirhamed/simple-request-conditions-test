<?php

namespace App\Services;

use Illuminate\Http\Response;
use Illuminate\Http\Request;
use App\Classes\Word;

class ProcessService
{
    
    /**
     * handel the request
     * 
     * @param  Request $request
     * @return mixed
     */
    public function handle(Request $request) :mixed
    {
        // get the request data
        $request = $request->all();

        // check if the request has no fields
        if (count($request) == 0)
            return self::response("No data provided.", [], Response::HTTP_BAD_REQUEST);
        
        // check if the request has one field
        if (count($request) == 1)
            return self::response("Request has one input.", $request, Response::HTTP_OK);

        // if the field has emoji
        $has_emoji = self::hasEmoji($request);
        if($has_emoji['status'])
            return self::response("Field has emojis.", [$has_emoji['key'] => $has_emoji['value']], Response::HTTP_OK);

        // check if the request has more fields
        if (count($request) >= 2) {
            $values = self::getFields($request);

            // if the fields are numric
            if (is_numeric($values['first_field']) && is_numeric($values['second_field']))
                return self::response("Request has numbers.", ["sum" => $values['first_field'] + $values['second_field']], Response::HTTP_OK);
            
            // if the fields are strings
            if (is_string($values['first_field']) || is_string($values['second_field'])) {
                $string = new Word($values['first_field'], $values['second_field']);
                return self::response("Fields has concatenated", [$string->doConcatenater()], Response::HTTP_OK);
            }
                
        }

        
            
    }   

    /**
     * make json response structure
     * 
     * @param  string $message
     * @param  array $data
     * @param  int $status
     * @return mixed
     */
    static function response(string $message, array $data, int $status) :array
    {
        return [
            'details' => [
                'message' => $message,
                'data' => $data,
            ],
            'status' => $status
        ];
    }

    /**
     * Get the fields
     * 
     * @param  array $request
     * @return mixed
     */
    static function getFields(array $request) :array
    {
        $fields_value = (array_values($request));
        return [
            'first_field' => $fields_value[0],
            'second_field' => $fields_value[rand(1, count($request) - 1)],
        ];
    }

    /**
     * Detect emoji in string
     * 
     * @param  array $request
     * @return mixed
     */
    static function hasEmoji(array $request) :array
    {
        foreach ($request as $key => $value) {   
            if (\_::isStringHasEmojis($value)) {
                return ["status" => true, "key" => $key, "value" => $value];
            }
        }

        return ["status" => false];
    }
}