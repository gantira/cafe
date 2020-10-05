<?php

namespace App\Http\Livewire\Payments;

use App\Models\Payment;
use Livewire\Component;

class Create extends Component
{
    public $nama;
    public $deskripsi;

    protected $rules = [
        'nama' => 'required',
        'deskripsi' => 'nullable|string',
    ];

    public function submit()
    {
        $result = Payment::create($this->validate());

        $this->reset();

        $this->emit('alert',['message' => "Payment metode {$result->nama} berhasil disimpan."]);
    }

    public function render()
    {
        return view('livewire.payments.create');
    }
}
