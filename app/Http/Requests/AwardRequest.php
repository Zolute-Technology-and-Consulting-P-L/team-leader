<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AwardRequest extends FormRequest
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
            "award_name" => "required|string|min:4|unique:awards,name,".$this->id,
            "entity" => "required",
            "award_logo" => "required|mimes:jpg,jpeg,png",
        ];
    }
}
