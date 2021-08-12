<?php

namespace App\Http\Requests\API\Customer;

use Illuminate\Foundation\Http\FormRequest;

class AddresseRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth('sanctum')
            ->user()->currentAccessToken()  === request()->user()->currentAccessToken();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [

           // 'country' => ['required', 'string', 'max:255'],
           
            'address' => ['required', 'string', 'max:255'],
            'phone' => ['nullable', 'phone:MA'],
            'city' => ['required', 'string', 'max:255'],
            'zip' => ['nullable', 'numeric'],

        ];
    }
}
