<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Validation\Rule;

class UpdateCompanyRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'CIF' => [
                'required',
                'string',
                'max:10',
                Rule::unique('companies', 'CIF')->ignore($this->route('company'), 'id'),
            ],
            'name' => [
                'required',
                'string',
                'max:255',
            ],
            'telephone' => [
                'required',
                'string',
                'max:255',
                Rule::unique('companies', 'telephone')->ignore($this->route('company'), 'id'),
            ],
            'enabled' => 'required|boolean',
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'message' => 'Validation failed',
            'errors' => $validator->errors(),
        ], 422));
    }
}
