<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:4|confirmed',
            'password_confirmation' => 'required'
        ];
    }
    /**
     * バリデーションエラーメッセージを定義
     *
     * @return array
     */
    public function messages()
    {
        return [
            'name.required'  => '・:attributeは必須項目です。',
            'email.required' => '・:attributeは必須項目です。',
            'email.email'    => '・:attributeを正しく入力してください。',
            'password.required' => '・:attributeは必須項目です。',
            'password.confirmed' => '・:attributeとパスワード確認が一致していません。',
            'password.min' => '・:attributeは4文字以上で入力してください。',
        ];
    }
    /**
     * カスタム属性名を定義
     *
     * @return array
     */
    public function attributes()
    {
        return [
            'name' => 'お名前',
            'email' => 'Email',
            'password' => 'パスワード',
            'password_confirmation' => 'パスワード確認'
        ];
    }
}

