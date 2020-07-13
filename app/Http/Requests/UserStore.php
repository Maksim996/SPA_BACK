<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserStore extends FormRequest
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
            'first_name' => 'required|string|max:255',
            'second_name' => 'required|string|max:255',
            'patronymic' => 'required|string|max:255',
            'email' => 'required|unique:users|email|max:255',
            'birthday' => 'required|date',
            'sex' => 'required|boolean',
            'phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10', // todo
            'additional_phone' => 'regex:/^([0-9\s\-\+\(\)]*)$/|min:10', // tODO +380 need todo
            'passport' => 'required|unique:user_info',
            'inn_code' => 'required|unique:user_info|numeric|size:10',
            'image' => 'nullable|mimes:jpeg,bmp,png',
            'description' => 'nullable|string',
        ];
    }
    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'first_name.required' => 'first_name',
            'second_name.required' => 'second_name',
            'patronymic.required' => 'required|string|max:255',
            'email.required' => 'required|unique:users|email|max:255',
            'birthday.required' => 'required|date',
            'sex.required' => 'required|boolean',
            'phone.required' => 'phone',
            'passport.required' => 'required|unique:user_info',
            'inn_code.required' => 'required|unique:user_info|numeric|size:10',
            // 'image' => 'nullable|mimes:jpeg,bmp,png',
            // 'description' => 'nullable|string',
        ];
    }
}
