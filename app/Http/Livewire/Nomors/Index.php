<?php

namespace App\Http\Livewire\Nomors;

use App\Models\Nomor;
use Livewire\Component;

class Index extends Component
{
    public function getNomorsProperty()
    {
        return Nomor::all();
    }

    public function destroy(Nomor $nomor)
    {
        $nomor->delete();

        session()->flash('alert', [
            'type' => 'secondary',
            'title' => '',
            'icon' => 'fa fa-check',
            'message' => 'Delete nomor berhasil.',
        ]);

    }

    public function render()
    {
        return view('livewire.nomors.index');
    }
}
