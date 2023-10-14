<?php

namespace App\Http\Mingo\Livewire\Newsletter;

use Livewire\Component;
use Newsletter as News;

class Newsletter extends Component
{
    public $email;

    public function render()
    {
        return view('livewire.newsletter.newsletter');
    }

    public function addToNewsLetter()
    {
        //dd('Ouiiii');
        // News::subscribe($this->email);
        //https://github.com/spatie/laravel-newsletter
    }
}
