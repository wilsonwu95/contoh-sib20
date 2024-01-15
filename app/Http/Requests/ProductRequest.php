<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            "product_code" => "required|unique:product,product_code",
            "product_name" => "required",
            "category_id" => "required|exists:category,id",
            "price" => "required|numeric"
        ];
    }

    public function messages()
    {
        return [
            "product_code.required" => "Tolong diinput lah tong",
            "product_code.unique" => "Kode :attribute sudah pernah dipakai coy",
            "product_name.required" => "Tolong isi nama",
            "category_id.required" => "Tolong pilih kategori"
        ];
    }
}
