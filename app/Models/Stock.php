<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    protected $fillable=[
        'stockCode',
        'description',
        'kdv1',
        'kdv2',
        'kdv3',
        'unit',
        'stockType',
        'ekalan1',
        'ekalan2',
        'ekalan3',
        'ekalan4',
        'ekalan5',
    ];

    public function images()
    {
        return $this->hasMany(StockImage::class);
    }
    public function offerDetail()
    {
        return $this->belongsTo(OfferDetails::class); // offer_details tablosuyla ilişki
    }
}
