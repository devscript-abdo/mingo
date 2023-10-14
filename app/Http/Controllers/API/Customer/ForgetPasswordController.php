<?php

namespace App\Http\Controllers\API\Customer;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\Customer\ForgetPasswordRequest;
use Illuminate\Support\Facades\Password;

class ForgetPasswordController extends Controller
{
    public function forget(ForgetPasswordRequest $request)
    {

        $email = $request->validated();

        $this->broker()->sendResetLink($email);

        return response()->json(['_response' => ['message' => 'Nous vous avons envoyé par email le lien de réinitialisation du mot de passe !']], 200);
    }

    public function broker()
    {
        return Password::broker('customers');
    }
}
