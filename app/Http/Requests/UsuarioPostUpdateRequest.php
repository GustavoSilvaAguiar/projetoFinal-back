<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UsuarioPostUpdateRequest extends FormRequest
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
            'nome' => 'required|min:3|max:70',
            'cpf' => 'required|min:11|max:14'
        ];

        if ($this->method() === 'PUT' || $this->method() === 'PATCH') {
            /* $rules['cpf'] = [
                'required', // 'nullable',
                'min:11',
                'max:14',
                // "unique:supports,subject,{$this->id},id",
                Rule::unique('usuarios')->ignore($this->support ?? $this->id),
            ]; */
        }
        
        return $rules;
    }
    
}
