<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            "name"=>"required",
            "email"=>"required|email|unique:users",
            "password"=>"required|min:6|confirmed"
        ];
    }
    public function messages(): array
    {
        return [
            'name.required' => 'İsim Alanı Zorunludur',
            'email.required' => 'E-posta Alanı Zorunludur',
            'email.email'=> 'Geçerli bir eposta giriniz.',
            'email.unique'=> 'Bu eposta kullanılmış',
            'password.required'=> 'Şifre Alanı Zorunludur',
            'password.min'=> 'Şifre en az 6 karakter olmalıdır.',
            'password.confirmed'=> 'Şifreler Eşleşmiyor.',
        ];
    }
}
