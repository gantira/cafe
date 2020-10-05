<?php

namespace App\Http\Livewire\Nomors;

use App\Models\Nomor;
use Livewire\Component;

class Create extends Component
{
    public $nama;

    protected $rules = [
        'nama' => 'required|unique:nomors,nama,NULL,id,deleted_at,NULL',
    ];

    public function submit()
    {
        $result = Nomor::create($this->validate());

        $this->reset();

        $this->emit('alert',['message' => "Nomor Order {$result->nama} berhasil disimpan."]);
    }
    
    public function render()
    {
        return view('livewire.nomors.create');
    }
}
