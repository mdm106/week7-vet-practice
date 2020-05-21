<?php

namespace App\Http\Requests\API;

use Illuminate\Foundation\Http\FormRequest;

class AnimalRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            "name" => ["required", "string", "max:50"],
            "type" => ["required", "string", "max:50"],
            "dob" => ["required", "date"],
            "weight_kg" => ["required", "numeric"],
            "height_cm" => ["required", "numeric"],
            "biteyness" => ["required", "integer", "between:1,5"],
            "treatments" => ["required", "array"],
            "treatments.*" => ["string", "max:30"],
        ];
    }
}
