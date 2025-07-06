<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CustomerUpdateRequest extends FormRequest
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
            'name' => 'required|string',
            'customerAddress' => 'required|string',
            'contactNumber' => 'required|numeric',
            'doctorName' => 'required|string',
            'doctorAddress' => 'required|string',
            
        ];
    }

    # custom message
    public function messages()
    {
        return [
            'name.required' => 'Customer name is Empty. Please enter customer name.',
            'customerAddress.required' => 'Customer address is Empty. Please enter customer address.',

            'contactNumber.required' => 'Contact number is Empty. Please enter contact number.',
            'contactNumber.numeric' => 'Contact number only number allow.',
            'contactNumber.min' => 'Contact number must be  11 digits.',
            
            'doctorName.required' => 'Doctor name is Empty. Please enter doctor name.',
            'doctorAddress.required' => 'Doctor address is Empty. Please enter doctor address.',
        ];
    }
}
