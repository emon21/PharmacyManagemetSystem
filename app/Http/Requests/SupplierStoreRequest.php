<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SupplierStoreRequest extends FormRequest
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
            'supplierName' => 'required|string',
            'supplierEmail' => 'required|string',
            'supplierPhone' => 'required|numeric',
            'supplierAddress' => 'required|string',
            //
        ];
    }

    public function messages()
    {
        return [
            'supplierName' => 'Supplier Name is Empty.Please enter Supplier name.',
            'supplierEmail' => 'Supplier Email is Empty.Please enter Supplier email.',

            'supplierPhone.required' => 'Supplier number is Empty.Please enter a number.',
            'supplierPhone.numeric' => 'Supplier number only number allow.',

            //'contactNumber.min' => 'Contact number must be 11 digits.',

            'supplierAddress' => 'Supplier address is Empty.Please enter Supplier address.',
        ];
    }
}
