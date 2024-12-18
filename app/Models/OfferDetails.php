<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OfferDetails extends Model
{
    use HasFactory;
    protected $fillable = ['offer_id', 'stock_id', 'currency', 'quantity', 'price', 'total'];

    public function offer()
    {
        return $this->belongsTo(Offer::class);
    }

    public function stock()
    {
        return $this->belongsTo(Stock::class);
    }
}
