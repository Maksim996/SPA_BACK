<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Info;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

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
     * @bodyParam first_name string required
     * @bodyParam second_name string required
     * @bodyParam patronymic string required
     * @bodyParam birthday date_format:Y-m-d required
     * @bodyParam sex boolean required Example 1 or 0
     * @bodyParam phone string required Length 12 chars
     * @bodyParam additional_phone string Length 12 chars
     * @bodyParam passport string required
     * @bodyParam inn_code sting required Length 10 digits
     * @bodyParam image string
     * @bodyParam background_url string Max 255 chars
     * @bodyParam description string Max 500 chars
     *
     * @return array
     */
    public function rules()
    {
        return [
            'first_name' => 'required|string|max:255',
            'second_name' => 'required|string|max:255',
            'patronymic' => 'required|string|max:255',
            'email' => [
                'required',
                'email',
                'max:255',
                Rule::unique('users')->ignore($this->id),
            ],
            'birthday' => 'required|date|date_format:Y-m-d',
            'sex' => 'required|boolean',
            'phone' => 'required|starts_with:380|digits:12',
            'additional_phone' => 'nullable|starts_with:380|digits:12',
            'type_passport' => 'required|boolean',
            'passport' => [
                'required',
                // 'size:9',// ! check type passport
                Rule::unique('user_info')->ignore($this->id),
            ],
            'inn_code' => [
                'required',
                'digits:10',
                Rule::unique('user_info')->ignore($this->id),
            ],
            'image' => 'nullable|mimes:jpeg,bmp,png|max:255',
            'background_url' => 'nullable|string|max:255',
            'description' => 'nullable|string|max:500'
        ];
    }

    public function bodyParameters()
    {
        return [
            'email' => [
                'description' => 'email',
            ],
            'type_passport' => [
                'description' => 'Example 1 ID-card or 0 old type'
            ],
            'passport' => [
                'description' => 'Max length 9 chars example ID-card 000000001 old type BM000001'
            ],
            'inn_code' => [
                'description' => 'inn_code length digits 10'
            ]
        ];
    }
}
