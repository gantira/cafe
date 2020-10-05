<?php

namespace App\Http\Livewire\Products;

use App\Models\Product;
use Carbon\Carbon;
use File;
use Illuminate\Support\Facades\Storage;
use Image;
use Livewire\Component;
use Livewire\WithFileUploads;

class Edit extends Component
{
    use WithFileUploads;

    public $productId;
    public $nama;
    public $category_id;
    public $harga;
    public $satuan;
    public $deskripsi;
    public $foto;
    public $foto_preview;
    public $updatedPhoto;

    protected $rules = [
        'nama' => 'required',
        'category_id' => 'nullable',
        'harga' => 'required|integer|gt:0',
        'satuan' => 'nullable|string',
        'deskripsi' => 'nullable|string',
        'updatedPhoto' => 'nullable|mimes:jpeg,jpg,png',
    ];

    protected $messages = [
        'category_id.required' => 'Kategori wajib diisi.',
    ];

    public function mount(Product $product)
    {
        $this->productId = $product->id;
        $this->fill($product);
    }

    public function getCategoriesProperty()
    {
        return Product::all();
    }

    public function submit()
    {
        $path = storage_path('app/public/products');

        $validatedData = $this->validate();
        unset($validatedData['foto']);

        if ($this->updatedPhoto) {
            if (!File::isDirectory($path)) {
                File::makeDirectory($path);
            }

            Storage::delete('/public/products/' . $this->foto);

            $fileName = Carbon::now()->timestamp . '-' . $this->nama . '.' . $this->updatedPhoto->getClientOriginalExtension();
            $validatedData['foto'] = $fileName;
            Image::make($this->updatedPhoto)->fit(500, 500, null, 'center')->save($path . '/' . $fileName);
        }

        $result = Product::find($this->productId);
        $result->update($validatedData);

        session()->flash('alert', [
            'type' => 'secondary',
            'title' => '',
            'icon' => 'fa fa-check',
            'message' => 'Edit produk berhasil.',
        ]);

        return redirect('products');
    }

    public function render()
    {
        return view('livewire.products.edit');
    }
}
