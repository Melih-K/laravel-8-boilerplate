<?php

namespace App\Models;

use App\Models\CariAddress;
use Illuminate\Database\Eloquent\Model;

class Cari extends Model
{
    protected $table = 'cariler';
    protected $fillable=[
        'cariCode',
        'description',
        'relatedPerson',
        'companyName',
        'country',
        'authorityCode',
        'email',
        'ekalan1',
        'ekalan2',
        'ekalan3',
        'ekalan4',
        'ekalan5',
    ];
    public function adresler()
    {
        return $this->hasMany(CariAddress::class, 'cari_id', 'id');
    }

    public function offers()
{
    return $this->hasMany(Offer::class, 'cari_id');
}

}
