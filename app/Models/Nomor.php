<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Nomor extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ['nama'];

    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    public function scopeIsi($query)
    {
        return $query->update([
            'status_filled' => 1
        ]);
    }

    public function scopeKosongkan($query)
    {
        return $query->update([
            'status_filled' => 0
        ]);
    }

    public function getLabelAttribute()
    {
        switch ($this->status_filled) {
            case 0:
                $value = 'Kosong';
                break;
            case 1:
                $value = 'Terisi';
                break;
        }

        return $value;
    }
}
