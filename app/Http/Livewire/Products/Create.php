<?php

namespace App\Http\Livewire\Products;

use App\Models\Category;
use App\Models\Product;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithFileUploads;
use Image;
use File;

class Create extends Component
{
    use WithFileUploads;

    public $nama;
    public $category_id;
    public $harga;
    public $satuan;
    public $deskripsi;
    public $foto;

    protected $rules = [
        'nama' => 'required',
        'category_id' => 'nullable',
        'harga' => 'required|integer|gt:0',
        'satuan' => 'nullable|string',
        'deskripsi' => 'nullable|string',
        'foto' => 'nullable|mimes:jpeg,jpg,png',
    ];

    protected $messages = [
        'category_id.required' => 'Kategori wajib diisi.',
    ];

    public function getCategoriesProperty()
    {
        return Category::all();
    }

    public function submit()
    {
        $path = storage_path('app/public/products');

        $validatedData = $this->validate();

        if ($this->foto) {
            if (!File::isDirectory($path)) {
                File::makeDirectory($path);
            }

            $fileName = Carbon::now()->timestamp . '-' . $this->nama . '.' . $this->foto->getClientOriginalExtension();
            $validatedData['foto'] = $fileName;
            Image::make($this->foto)->fit(500, 500, null, 'center')->save($path . '/' . $fileName);
        }

        $result = Product::create($validatedData);

        $this->reset();

        $this->emit('alert', ['message' => "Produk {$result->nama} berhasil disimpan."]);
    }

    public function render()
    {
        return view('livewire.products.create');
    }
}
