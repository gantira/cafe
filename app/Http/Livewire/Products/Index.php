<?php

namespace App\Http\Livewire\Products;

use App\Models\Product;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;

class Index extends Component
{

    public function getProductsProperty()
    {
        return Product::all();
    }

    public function destroy(Product $product)
    {
        Storage::delete('/public/products/' . $product->foto);
        
        $product->delete();

        session()->flash('alert', [
            'type' => 'secondary',
            'title' => '',
            'icon' => 'fa fa-check',
            'message' => 'Delete produk berhasil.',
        ]);

    }

    public function render()
    {
        return view('livewire.products.index');
    }
}
