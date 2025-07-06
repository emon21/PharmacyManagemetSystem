<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CustomerStoreRequest extends FormRequest
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
            'customerName'     => 'required|string|max:255',
            'customerAddress'     => 'required|string',
           // 'contactNumber' => 'required|numeric|min:10|max:11|unique:customers,contactNumber',
            'contactNumber' => 'required|numeric',
            'doctorName'  => 'required|string',
            'doctorAddress' => 'required|string',
        ];
    }

    // # custom message
    public function messages()
    {
        return [
            'customerName' => 'Customer name is Empty.Please enter customer name.',
            'customerAddress' => 'Customer address is Empty.Please enter customer address.',

            'contactNumber.required' => 'Contact number is Empty.Please enter contact number.', 
            'contactNumber.numeric' => 'Contact number only number allow.', 
            'contactNumber.min' => 'Contact number must be 11 digits.', 

           
            'doctorName' => 'Doctor name is Empty.Please enter doctor name.',
            'doctorAddress' => 'Doctor address is Empty.Please enter doctor address.',
        ];

        
    }
}
