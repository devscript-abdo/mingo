<?php

namespace App\Http\Requests\Checkout;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CheckoutRequest extends FormRequest
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
        $emailRule = auth()->guard('customer')->user() ? ['required', 'email'] : ['required', 'email', Rule::unique('customers', 'email')->ignore(auth()->id())];

        return [
            'billing_name' => 'required|string',
            'billing_email' => $emailRule,
            'billing_city' => 'required|string',
            'billing_address' => 'required|string',
            'billing_phone' => 'required|numeric|phone:MA',
            /***** see composer.json : propaganistas/laravel-phone */
            'billing_notes' => 'nullable|string',
        ];
    }

    /**
     * Get custom attributes for validator errors.
     *
     * @return array
     */
    public function attributes()
    {
        return [
            'billing_name' => 'Nom Complet',
            'billing_email' => 'Email',
            'billing_city' => 'Ville',
            'billing_address' => 'Address',
            'billing_phone' => 'Phone',
            'billing_notes' => 'Notes',
        ];
    }

    public function messages()
    {
        $loginRoute = route('customer.login');

        return [
            'billing_email.unique' => "
             You already have an account with this email . please 
            <a href='$loginRoute'>login</a> 
            to continue .
            ",
        ];
    }
}
