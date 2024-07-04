<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CategoriaPostUpdateRequest extends FormRequest
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
        $rules = [
            'nome' => 'required',
            'img' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ];

        if ($this->method() === 'PUT' || $this->method() === 'PATCH') {
            $rules['nome'] = [
                'required',
                Rule::unique('categorias')->ignore($this->support ?? $this->id),
            ];
            /* $rules['img'] = [
                'nullable',

                'image',
                'mimes:jpeg,png,jpg,gif',
                'max:2048',
                Rule::unique('categorias')->ignore($this->support ?? $this->id),
            ]; */
        }
        return $rules;
    }
}
