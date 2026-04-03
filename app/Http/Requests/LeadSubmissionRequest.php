<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LeadSubmissionRequest extends FormRequest
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
            'name'                  => ['required', 'string', 'max:255'],
            'email'                 => ['required', 'email:rfc', 'max:255'],
            'company'               => ['nullable', 'string', 'max:255'],
            'inkoopbestand'         => ['required', 'file', 'mimes:csv,xlsx,xls,txt', 'max:10240'],
            'leverancierbestand'    => ['required', 'file', 'mimes:csv,xlsx,xls,txt', 'max:10240'],
            'message'               => ['nullable', 'string', 'max:1000'],
        ];
    }
}
