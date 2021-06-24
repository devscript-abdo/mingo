<?php

namespace App\Http\Mingo\Livewire\Product;

use Livewire\Component;

class ModalView extends Component
{

    protected $listeners = ['viewProduct' => 'render'];

    public function render()
    {
        return view('livewire.product.modal-view');
    }
}
