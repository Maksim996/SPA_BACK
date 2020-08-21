<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePassword extends FormRequest
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
     * @bodyParam old_password string required
     * @bodyParam password string required
     * @bodyParam password_confirmation string required
     *
     * @return array
     */
    public function rules()
    {
        return [
            'old_password' => 'required|min:8|max:255',
            'password' => 'required|min:8|max:255|confirmed',
            'password_confirmation' => 'required|min:8|max:255',

        ];
    }

    /**
     * @var array $response Is our response data.
     */
    $response = [
        "success" => false, // Here I added a new field on JSON response.
        "message" => __("Los datos enviados no son válidos."), // Here I used a custom message.
        "errors" => $validator->errors(), // And do not forget to add the common errors.
    ];
}
