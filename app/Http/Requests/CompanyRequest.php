<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CompanyRequest extends FormRequest
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
            "company_name"=> "required|string|min:4",
            "email" => "required|unique:companies,email,".$this->id,
            "contact_number" => "required|regex:/^([0-9\s\-\+\(\)]*)$/|digits:10|unique:companies,phone,".$this->id,
            "website" => "required|url",
            "address" => "required|string",
            "entity" => "required"

        ];
    }
}
