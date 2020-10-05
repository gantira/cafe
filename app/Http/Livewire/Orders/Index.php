<?php

namespace App\Http\Livewire\Orders;

use App\Models\Product;
use Livewire\Component;

class Index extends Component
{
    public function getProductsProperty()
    {
        return Product::all();
    }
    
    public function render()
    {
        return view('livewire.orders.index');
    }
}
