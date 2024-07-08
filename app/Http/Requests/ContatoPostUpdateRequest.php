<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class ContatoPostUpdateRequest extends FormRequest
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
        $rules = [];

        /* if($this->method() === 'PUT' || $this->method() === 'PATCH') {
            $rules['telefone'] = [
                Rule::unique('contatos')->ignore($this->support ?? $this->id)
            ];
            $rules['email'] = [
                Rule::unique('contatos')->ignore($this->support ?? $this->id)
            ];
        } */
        return $rules;
    }
}
