<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EntityRequest extends FormRequest
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
            "entity_name" => "required|string|min:4|unique:entity,name,".$this->id,
            "website" => "required|url",
            "success_url" => "required|url",
            "failed_url" => "required|url",
        ];
    }
}
