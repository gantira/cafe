<?php

namespace App\Http\Livewire\Categories;

use App\Models\Category;
use Livewire\Component;

class Create extends Component
{
    public $nama;

    protected $rules = [
        'nama' => 'required',
    ];

    public function submit()
    {
        $result = Category::create($this->validate());

        $this->reset();

        $this->emit('alert',['message' => "Kategori {$result->nama} berhasil disimpan."]);
    }

    public function render()
    {
        return view('livewire.categories.create');
    }
}
