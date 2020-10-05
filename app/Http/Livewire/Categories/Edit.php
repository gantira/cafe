<?php

namespace App\Http\Livewire\Categories;

use App\Models\Category;
use Livewire\Component;

class Edit extends Component
{
    public $categoryId;
    public $nama;

    protected $rules = [
        'nama' => 'required',
    ];

    public function mount(Category $category)
    {
        $this->categoryId = $category->id;
        $this->fill($category);
    }

    public function submit()
    {
        $result = Category::find($this->categoryId);
        $result->update($this->validate());

        session()->flash('alert', [
            'type' => 'secondary',
            'title' => '',
            'icon' => 'fa fa-check',
            'message' => 'Edit data berhasil.',
        ]);

        return redirect('categories');

    }

    public function render()
    {
        return view('livewire.categories.edit');
    }
}
