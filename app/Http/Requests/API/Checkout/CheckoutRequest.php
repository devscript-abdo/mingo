<?php

namespace App\Http\Requests\API\Checkout;

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
       // $emailRule = auth('sanctum')->check() ? ['required', 'email'] : ['required', 'email', Rule::unique('customers', 'email')->ignore(request()->user()->currentAccessToken()->tokenable_id)];

        return [
            //'email' =>  $emailRule,
            'customer_info' => 'required|array',
            'customer_info.address_id' => 'required',
            'customer_info.shipping_address' => 'required|string',

            'payment_method' => 'required|string',
            'discount' => 'nullable|integer',

            'cart' => 'required|array',
            'cart.*.id' => 'required|integer',
            'cart.*.tax' => 'required',
            'cart.*.quantity' => 'required|integer',
            'cart.*.price' => 'required',
            'cart.*.discount' => 'required',
            'cart.*.discount_type' => 'required|string',
            'cart.*.shipping_method_id' => 'nullable|integer',
            'cart.*.variant' => 'nullable|string',
            'cart.*.variations' => 'nullable|string',
            'cart.*.shipping_cost' => 'nullable|integer',
        ];
    }
}
