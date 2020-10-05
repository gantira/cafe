<?php

namespace App\Http\Livewire\Payments;

use App\Models\Payment;
use Livewire\Component;

class Edit extends Component
{
    public $paymentId;
    public $nama;
    public $deskripsi;

    protected $rules = [
        'nama' => 'required',
        'deskripsi' => 'nullable|string',
    ];

    public function mount(Payment $payment)
    {
        $this->paymentId = $payment->id;
        $this->fill($payment);
    }

    public function submit()
    {
        $result = Payment::find($this->paymentId);
        $result->update($this->validate());

        session()->flash('alert', [
            'type' => 'secondary',
            'title' => '',
            'icon' => 'fa fa-check',
            'message' => 'Edit payment berhasil.',
        ]);

        return redirect('payments');

    }

    public function render()
    {
        return view('livewire.payments.edit');
    }
}
