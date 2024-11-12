<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ChefRequest extends FormRequest
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
            'name' => 'required|min:3',
            'position' => 'required',
            'description' => 'required|min:3',
            'insta_link' => 'required',
            'linked_link' => 'required',
            'photo' => 'nullable|image|mimetypes:image/jpeg,image/png,image/gif,image/svg|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ];
    }
}
