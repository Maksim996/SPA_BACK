<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateDirector extends FormRequest
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
            'birthday' => 'required|date',
            'sex' => 'required|boolean',
            'phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            'additional_phone' => 'regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            'passport' => 'required|unique:user_info',
            'inn_code' => 'required|unique:user_info|string|size:10',
            'image' => 'nullable|mimes:jpeg,bmp,png',
        ];
    }
}
