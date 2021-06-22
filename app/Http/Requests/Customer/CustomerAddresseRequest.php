<?php

namespace App\Http\Requests\Customer;

use Illuminate\Foundation\Http\FormRequest;

class CustomerAddresseRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [

            'name' => 'required|string',
            'email' => ['nullable', 'email', 'string'],
            'phone' => ['required', 'string', 'phone:MA'],
            'city' => 'nullable|string',
            'addresse' => ['required', 'string'],
        ];
    }
}
