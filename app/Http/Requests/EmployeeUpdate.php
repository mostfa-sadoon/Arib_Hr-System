<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmployeeUpdate extends FormRequest
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
            'first_name'=> 'required',
            'last_name' => 'required',
          //  'phone'     => 'required|unique:employees,phone' .$this->get('id'),
            'email'     => 'required',
            'salary'    => 'required',
            'salary'    => 'required',
        ];
    }
}
