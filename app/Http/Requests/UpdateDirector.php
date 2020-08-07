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
     * @bodyParam email email required email@email.com
     * @bodyParam birthday date_format:d.m.Y required
     * @bodyParam sex boolean required Example 1 or 0
     * @bodyParam phone string required Length 10 chars
     * @bodyParam additional_phone string Length 10 chars
     * @bodyParam type_passport boolean required Example 1 ID-card or 0 old type
     * @bodyParam passport string required Length max 9 chars
     * @bodyParam inn_code sting required Length 10 chars !int
     * @bodyParam image string
     * @bodyParam description string
     * @return array
     */
    public function rules(Request $request)
    {
        return [
            'first_name' => 'required|string|max:255',
            'second_name' => 'required|string|max:255',
            'patronymic' => 'required|string|max:255',
            'email' => [
                'required',
                'email',
                'max:255',
                Rule::unique('users')->ignore($request->id),
            ],
            'birthday' => 'required|date|date_format:d.m.Y',
            'sex' => 'required|boolean',
            'phone' => 'required|starts_with:380|digits:12',
            'additional_phone' => 'starts_with:380|digits:12',
            'type_passport' => 'required|boolean',
            'passport' => [
                'required',
                // 'size:9',// ! check type passport
                Rule::unique('user_info')->ignore($request->id),
            ],
            'inn_code' => [
                'required',
                'digits:10',
                Rule::unique('user_info')->ignore($request->id),
            ],
            'image' => 'nullable|mimes:jpeg,bmp,png',
        ];
    }
}
