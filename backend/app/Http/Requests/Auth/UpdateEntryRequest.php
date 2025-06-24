<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Validation\Rule;

class UpdateEntryRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'visit_type' => 'required|string',
            'visit_id' => 'required|integer',
            'date_entry' => 'required|date',
            'date_exit' => 'nullable|date|after:date_entry',

            'name' => 'required|string|max:255',
            'surname' => 'required|string|max:255',
            'email' => [
                'required',
                'email',
            ],

            'family_visit_id' => 'nullable|integer',
            'student_name' => 'nullable|string|max:255',
            'student_surname' => 'nullable|string|max:255',
            'student_course' => 'nullable|string|max:255',
            'motive_id' => 'nullable|integer',
            'custom_motive' => 'nullable|string|max:255',

            // professional_visits
            'company_id' => 'nullable|integer',
            'NIF' => 'nullable|string|max:255',
            'age' => 'nullable|integer',

            //professional_services
            'service_id' => 'nullable|integer',
            'task' => 'nullable|string|max:255',

            // companies
            'CIF' => 'nullable|string|max:255',
            'company_name' => 'nullable|string|max:255',
            'company_telephone' => 'nullable|string|max:255'
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

/* 37
1
18
professional
2025-06-17 18:14:00
NULL
2025-06-17 18:14:21
2025-06-19 23:03:19

pro services
24
37
9
1
tarea a realizar prueba
*/