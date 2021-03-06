<?php

namespace App\Http\Livewire\Orders;

use App\Models\Nomor;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use Livewire\Component;

class CartEdit extends Component
{
    public $order;
    public $nama;
    public $nomor_id;
    public $jenis = 'Dine in';
    public $emitName;
    
    protected $listeners = ['tambahItem', 'updateItem'];

    public function mount()
    {
        $this->fill($this->order);
    }
    
    public function tambahItem($id)
    {
        $cart = session()->get('cart');

        if ($cart && array_key_exists($id, $cart)) {
            $product = Product::findOrFail($id);

            $cart[$id]['product_qty'] += 1;
            $cart[$id]['product_subtotal'] = $cart[$id]['product_qty'] * $product->harga;
        } else {
            $product = Product::findOrFail($id);
            $cart[$id] = [
                'product_id' => $product->id,
                'product_qty' => 1,
                'product_nama' => $product->nama,
                'product_harga' => $product->harga,
                'product_deskripsi' => $product->deskripsi,
                'product_subtotal' => 1 * $product->harga,
                'product_catatan' => null,
            ];
        }

        session()->put('cart', $cart);
    }

    protected $rules = [
        'nama' => 'nullable',
        'jenis' => 'nullable',
        'nomor_id' => 'required_if:jenis,Dine in',
    ];

    public function submit()
    {
        foreach (session()->get('cart') as $item) {
            OrderDetail::create([
                'order_id' => $this->order->id,
                'product_id' => $item['product_id'],
                'qty' => $item['product_qty'],
                'harga' => $item['product_harga'],
                'catatan' => $item['product_catatan'],
                'subtotal' => $item['product_subtotal'],
            ]);
        }

        session()->put('cart', []);

        $this->reset();

        $this->emit('alert', ['message' => "Tambah pesanan berhasil."]);
    }

    public function updateItem($id, $qty, $catatan)
    {
        $cart = session()->get('cart');

        if (!$qty) {
            unset($cart[$id]);
        } else if ($cart && array_key_exists($id, $cart)) {
            $product = Product::findOrFail($id);

            $cart[$id]['product_qty'] = $qty;
            $cart[$id]['product_subtotal'] = $cart[$id]['product_qty'] * $product->harga;
            $cart[$id]['product_catatan'] = $catatan;
        }

        session()->put('cart', $cart);

        $this->emit('modal-order');
    }

    public function clearCart()
    {
        session()->put('cart', []);
    }

    public function getNomorsProperty()
    {
        return Nomor::all();
    }

    public function getCartProperty()
    {
        return session()->get('cart');
    }

    public function getDineInWithNomorProperty()
    {
        return Order::dineinwithnomor()->get();
    }


    public function render()
    {
        return view('livewire.orders.cart-edit');
    }
}
