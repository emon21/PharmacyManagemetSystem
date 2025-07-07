<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreMedicineRequest extends FormRequest
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
            'name'     => 'required|string',
            'packing'  => 'required|string',
            'genericName' => 'required|string',
            'supplierName' => 'required|string',
        ];
    }

    // # custom message
    public function messages()
    {
        return [
            'name.required' => 'The medicine name is Empty. Please enter medicine name.',
            'packing.required' => 'The packing information is required. Please enter packing information.',
            'genericName.required' => 'The generic name is required. Please enter generic name.',
            'supplierName.required' => 'The supplier name is required. Please enter supplier name.',
        ];

    }  
}
