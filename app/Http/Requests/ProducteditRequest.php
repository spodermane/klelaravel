<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProducteditRequest extends FormRequest
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
            'name' =>'required|string|max:255',
            'price'=>'required|numeric|min:0',
            'description'=>'required|string|max:500',
            'image' => "nullable|image|mimes:jpg,jpeg,png,gif|max:2048",
        ];
    }
    public function messages()
    {
        return[
            "name.required"=> "İsim Alanını doldurmanız zorunludur.",
            "price.required"=> "Fiyat Kısmını doldurmanız zorunludur.",
            "price.numeric"=> "Fiyat Kısmı sadece sayı olmalıdır.",
            "description.required"=> "Açıklama Kısmı Boş bırakılamaz.",
            'image.required' => 'Fotoğraf eklemeniz zorunludur.',
            'image.image' => 'Lütfen geçerli bir resim dosyası yükleyin.',
        ];
    }
}
