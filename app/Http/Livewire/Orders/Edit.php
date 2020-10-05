<?php

namespace App\Http\Livewire\Orders;

use App\Models\Order;
use App\Models\Product;
use Livewire\Component;

class Edit extends Component
{
    public $order;
    public $emitName;

    public function mount(Order $order)
    {
        $this->order = $order;
    }

    public function getProductsProperty()
    {
        return Product::all();
    }

    public function render()
    {
        return view('livewire.orders.edit');
    }
}
