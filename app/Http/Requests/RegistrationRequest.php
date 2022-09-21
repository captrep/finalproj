<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegistrationRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => ['required', 'string', 'min:2'],
            'schoolorigin' => ['required', 'string'],
            'birthplace' => ['required', 'string'],
            'birthdate' => ['required', 'date'],
            'photo' => ['required', 'image', 'mimes:jpeg,png,jpg,svg', 'max:2048'],
            'address' => ['required', 'string'],
            'city' => ['required', 'string'],
            'province' => ['required', 'string'],
            'postalcode' => ['required', 'numeric'],
        ];
    }
}
