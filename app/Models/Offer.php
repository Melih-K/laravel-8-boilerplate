<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    use HasFactory;
    protected $fillable=[
        'cari_id',
        'authorized',
        'authorizedCustomer',
        'receiptNo',
        'documentNo',
        'date',
        'confirmation',
        'discount',
        'description1',
        'description2',
        'description3',
        'ekalan1',
        'ekalan2',
    ];

    public function cari()
    {
        return $this->belongsTo(Cari::class, 'cari_id');
    }
    public function stocks()
    {
        return $this->hasManyThrough(Stock::class, OfferDetails::class);
    }
    public function details()
    {
        return $this->hasMany(OfferDetails::class);
    }
}
