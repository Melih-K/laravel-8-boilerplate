<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StockImage extends Model
{
    protected $fillable=[
        'stock_id',
        'path',
    ];

    public function stock()
    {
        return $this->belongsTo(Stock::class, 'stock_id');
    }
}
