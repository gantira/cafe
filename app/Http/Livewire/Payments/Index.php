<?php

namespace App\Http\Livewire\Payments;

use App\Models\Payment;
use Livewire\Component;

class Index extends Component
{
    public function getPaymentsProperty()
    {
        return Payment::all();
    }
    
    public function destroy(Payment $payment)
    {
        $payment->delete();

        session()->flash('alert', [
            'type' => 'secondary',
            'title' => '',
            'icon' => 'fa fa-check',
            'message' => 'Delete payment berhasil.',
        ]);

    }
    
    public function render()
    {
        return view('livewire.payments.index');
    }
}
