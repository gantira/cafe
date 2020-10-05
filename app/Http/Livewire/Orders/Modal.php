<?php

namespace App\Http\Livewire\Orders;

use App\Models\Product;
use Livewire\Component;

class Modal extends Component
{
    protected $listeners = ['edit'];

    public $product;
    public $product_id;
    public $product_qty;
    public $product_catatan;
    public $emitName;

    public function edit($product, $emitName)
    {
        $this->emitName = $emitName;
        
        $this->product = Product::findOrFail($product);
        $cart = session()->get('cart');

        $this->product_id = $cart[$product]['product_id'];
        $this->product_qty = $cart[$product]['product_qty'];
        $this->product_catatan = $cart[$product]['product_catatan'];

        $this->emit('modal-order');
    }

    public function getSubtotalProperty()
    {
        return $this->product['harga'] * $this->product_qty;
    }

    public function getEgProperty()
    {
        $eg = collect([
            'E.g. Tanpa Gula ya',
            'E.g. Tanpa Bawang please',
        ]);

        return $eg->random();
    }

    public function increment()
    {
        $this->product_qty++;
    }

    public function decrement()
    {
        if ($this->product_qty <= 0) {
            return;
        }

        $this->product_qty--;
    }

    public function update()
    {
        $this->emit($this->emitName, $this->product_id, $this->product_qty, $this->product_catatan);
    }

    public function render()
    {
        return view('livewire.orders.modal');
    }
}
