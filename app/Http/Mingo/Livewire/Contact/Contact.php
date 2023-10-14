<?php

namespace App\Http\Mingo\Livewire\Contact;

use App\Mail\Contact\ContactMail;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;

class Contact extends Component
{
    public $data = [
        'name' => '',
        'email' => '',
        'message' => '',
        'subject' => '',
        'telephone' => '',
    ];

    protected $rules = [

        'data.name' => 'required|string',
        'data.email' => 'nullable|email',
        'data.message' => 'required|string',
        'data.subject' => 'required|string',
        'data.telephone' => 'nullable|phone:MA',
    ];

    public function render()
    {
        return view('livewire.contact.contact');
    }

    public function sendEmail()
    {
        // dd($this->data);
        $this->validate();

        $email = setting('contact.email_reciver') ?? 'contact@'.request()->getHost();

        if ($email) {

            Mail::to($email)->send(new ContactMail($this->data));

            $this->dispatchBrowserEvent('added_to_cart', [
                'type' => 'success',
                'message' => 'merci pour votre message',
            ]);
        }
    }
}
