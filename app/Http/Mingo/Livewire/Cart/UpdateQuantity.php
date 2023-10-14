<?php

namespace App\Http\Mingo\Livewire\Cart;

use Livewire\Component;

class UpdateQuantity extends Component
{
    public $qty;

    public $itemId;

    public $quantity;

    public function mount($qty, $itemId)
    {
        $this->qty = $qty;

        $this->itemId = $itemId;
    }

    public function render()
    {
        return view('livewire.cart.update-quantity');
    }
}
