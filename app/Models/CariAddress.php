<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CariAddress extends Model
{
    use HasFactory;

    // Veri tabanı tablosunu belirt
    protected $table = 'cari_adresler';

    // Toplu atama yapılabilecek alanlar
    protected $fillable = [
        'cari_id',
        'address1',
        'address2',
        'country',
        'city',
        'district',
        'postalCode',
        'mobilePhone',
        'phone',
    ];

    /**
     * Cari ile ilişkisi: Bu adres hangi cari'ye ait?
     */
    public function cari()
    {
        return $this->belongsTo(Cari::class, 'cari_id', 'id');
    }
}
