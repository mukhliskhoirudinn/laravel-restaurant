<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookingRequest extends FormRequest
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
            'type'      => 'required|in:table,event',
            'name'      => 'required|min:3|max:255',
            'email'     => 'required|email',
            'phone'     => 'required|numeric',
            'date'      => 'required|date',
            'time'      => 'required',
            'people'    => 'required|numeric',
            'amount'    => 'nullable|numeric',
            'file'      => 'required|image|mimes:jpg,jpeg,png|mimetypes:image/jpeg,image/png|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'message'   => 'nullable|min:3'
        ];
    }
}
