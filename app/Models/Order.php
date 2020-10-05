<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'nomor_id',
        'payment_id',
        'nama',
        'jenis',
        'bayar',
        'kembali',
        'paid_status',
    ];

    public function getPaidStatusAttribute($value)
    {
        switch ($value && $this->jenis == 'Dine in') {
            case 0:
                $value = 'Eating <i class="fa fa-cutlery" aria-hidden="true"></i>';
                break;

            case 1:
                $value = 'Paid <i class="fa fa-check-circle-o" aria-hidden="true"></i>';
                break;

            default:
                $value = 'Unpaid';
                break;
        }

        return $value;
    }

    public function orderdetails()
    {
        return $this->hasMany(OrderDetail::class);
    }

    public function nomor()
    {
        return $this->belongsTo(Nomor::class)->withTrashed()->withDefault([
            'nama' => ''
        ]);
    }

    public function payment()
    {
        return $this->belongsTo(Payment::class)->withTrashed()->withDefault([
            'nama' => 'Etc'
        ]);
    }

    public function scopeDineInWithNomor($query)
    {
        return $query->wherePaidStatus(0)->whereHas('nomor', function ($query) {
            return $query->where('status_filled', 1);
        });
    }

    public function scopeDineInWithoutNomor($query)
    {
        return $query->wherePaidStatus(0)->whereNomorId(null);
    }

    public function scopeBayar()
    {
        return $this->update([
            'paid_status' => 1
        ]);
    }
}
