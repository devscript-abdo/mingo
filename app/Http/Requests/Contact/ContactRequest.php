<?php

namespace App\Http\Requests\Contact;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
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
            'email' => 'nullable|email',
            'message' => 'required|string',
            'subject' => 'required|string',
            'telephone' => 'nullable|phone:MA',
        ];
    }

    public function attributes()
    {
        return [
            'name' => 'Nom Complet',
            'message' => 'Message',
        ];
    }
}
