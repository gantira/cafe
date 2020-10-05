<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory;
    use SoftDeletes;

    public $appends = [
        'foto_preview'
    ];

    protected $fillable = [
        'category_id',
        'nama',
        'harga',
        'satuan',
        'deskripsi',
        'foto',
    ];

    public function getFotoPreviewAttribute()
    {
        return $this->foto && !$this->trashed() ? asset('storage/products/' . $this->foto) : url("https://ui-avatars.com/api/?name={$this->nama}&size=400&format=svg");
    }

    public function category()
    {
        return $this->belongsTo(Category::class)->withDefault([
            'nama' => 'Tanpa Kategori',
        ]);
    }
}
