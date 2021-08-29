<?php

namespace App\Http\Controllers\API\Contact;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\Contact\ContactUsRequest;
use App\Mail\Contact\ContactMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactUsController extends Controller
{


    public function contactUs(ContactUsRequest $request): \Illuminate\Http\JsonResponse
    {
        $data = $request;

        $email = setting('contact.email_reciver') ?? 'abdelgha4or@gmail.com'; //'site@' . request()->getHost();

        if ($email) {

            dispatch(function () use ($email, $data) {

                Mail::to($email)->send(new ContactMail($data));

            })->afterResponse();

            if (count(Mail::failures()) > 0) {
            }
            return response()->json(
                [

                    '_response' => ['msg' => 'nous vous remercions de nous avoir contacté', 'is_send' => true]
                ],
                200
            );
        }
    }
}
