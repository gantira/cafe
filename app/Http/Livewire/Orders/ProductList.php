<?php

namespace App\Http\Livewire\Orders;

use Livewire\Component;

class ProductList extends Component
{
    public $product;
    public $emitName;

    public function render()
    {
        return view('livewire.orders.product-list');
    }
}
