<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Validation\Rule;

class StoreEntryRequest  extends FormRequest
{
    public function rules(): array
    {
        return [
            'visit_type' => 'required|in:family,professional',
            // Visit
            'name' => 'required|string|max:255',
            'surname' => 'required|string|max:255',
            'email' => 'required|email|max:255',

            // Family Visit
            'student_name' => 'nullable|string|max:255',
            'student_surname' => 'nullable|string|max:255',
            'student_course' => 'nullable|string|max:255',
            'motive_id' => 'nullable|integer',
            'custom_motive' => 'nullable|string',

            // Professional Visit
            'NIF' => 'nullable|string|max:50',
            'age' => 'nullable|integer|min:0',
            'task' => 'nullable|string',
            'service_id' => 'nullable|integer',
            'company_id' => 'nullable|integer', 

            // Professional company
            'CIF' => 'nullable|string|max:50',
            'company_name' => 'nullable|string|max:255',
            'telephone' => 'nullable|string|max:20',
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
