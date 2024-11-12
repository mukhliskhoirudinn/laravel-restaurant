<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MenuRequest extends FormRequest
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
            'name' => 'required|min:3|unique:menus,name',
            'category_id' => 'required|exists:categories,id',
            'description' => 'required|min:3',
            'price' => 'required|numeric',
            'status' => 'required',
            'image' => $this->method() === 'POST' ? 'required|image|mimetypes:image/jpeg,image/png,image/gif,image/svg|mimes:jpeg,png,jpg,gif,svg|max:2048' : 'nullable|image|mimetypes:image/jpeg,image/png,image/gif,image/svg|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ];
    }
}
