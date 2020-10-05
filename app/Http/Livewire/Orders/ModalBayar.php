<?php

namespace App\Http\Livewire\Orders;

use App\Models\Payment;
use App\Models\Order;
use Livewire\Component;

class ModalBayar extends Component
{
    public $order;
    public $payment_id = 1;
    public $nominal = 0;

    protected $listeners = ['bill'];

    public function bill($id)
    {
        $this->order = Order::with('orderdetails')->find($id);
        $this->emit('modal-bayar');
    }

    public function bayar()
    {
        $this->order->update([
            'payment_id' => $this->payment_id,
            'bayar' => $this->nominal ?: $this->total,
            'kembali' => $this->kembali,
            'paid_status' => 1,
        ]);
        
        $this->order->bayar();
        $this->order->nomor()->kosongkan();

        $this->reset();
        $this->emit('modal-bayar');
        $this->emit('paid');
        $this->emit('alert', ['message' => "Transaksi selesai."]);
    }

    public function getSubtotalProperty()
    {
        return collect($this->order['orderdetails'])->sum('subtotal');
    }

    public function getPajakProperty()
    {
        return $this->subtotal * 10 / 100;
    }

    public function getTotalProperty()
    {
        return $this->subtotal + $this->pajak;
    }

    public function getKembaliProperty()
    {
        return $this->nominal ? $this->nominal - $this->total : 0;
    }

    public function getActiveProperty()
    {
        return $this->payment_id && $this->kembali < 0 ? 'disabled' : '';
    }

    public function render()
    {
        $payments = Payment::all();

        return view('livewire.orders.modal-bayar', compact('payments'));
    }
}
