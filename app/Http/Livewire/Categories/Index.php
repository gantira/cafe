<?php

namespace App\Http\Livewire\Categories;

use App\Models\Category;
use Livewire\Component;

class Index extends Component
{
    public function getCategoriesProperty()
    {
        return Category::all();
    }

    public function destroy(Category $category)
    {
        $category->delete();

        session()->flash('alert', [
            'type' => 'secondary',
            'title' => '',
            'icon' => 'fa fa-check',
            'message' => 'Delete data berhasil.',
        ]);

    }
    
    public function render()
    {
        return view('livewire.categories.index');
    }

    
}
