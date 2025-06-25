<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules;

class StoreVisitorRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'visit_type' => 'required',
            'name' => 'required|string|max:255',
            'surname' => 'required|string|max:255',
            'email' => [
                'required',
                'email',
                'max:255',
                Rule::unique('visits', 'email'),
            ],
            'NIF' => [
                'nullable',
                'string',
                'max:255',
                Rule::unique('professional_visits', 'NIF'),
            ],
            'age' => 'nullable|string',
            'CIF' => 'nullable|string',
            'company_name' => 'nullable|string',
            'company_telephone' => 'nullable|string',
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
