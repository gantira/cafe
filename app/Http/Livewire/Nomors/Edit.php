<?php

namespace App\Http\Livewire\Nomors;

use App\Models\Nomor;
use Livewire\Component;

class Edit extends Component
{
    public $nomorId;
    public $nama;

    protected $rules = [
        'nama' => 'required|unique:nomors,nama,NULL,id,deleted_at,NULL',
    ];

    public function mount(Nomor $nomor)
    {
        $this->nomorId = $nomor->id;
        $this->fill($nomor);
    }

    public function submit()
    {
        $result = Nomor::find($this->nomorId);
        $result->update($this->validate());

        session()->flash('alert', [
            'type' => 'secondary',
            'title' => '',
            'icon' => 'fa fa-check',
            'message' => 'Edit data berhasil.',
        ]);

        return redirect('nomors');

    }

    public function render()
    {
        return view('livewire.nomors.edit');
    }
}
