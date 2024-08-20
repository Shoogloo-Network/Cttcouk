<?php

namespace App\Models;

use App\Models\Cities;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CityDetail extends Model
{
    use HasFactory;
    protected $table = 'citiesdetails';

    protected $fillable = [
        'city_id',
        'domain_id',
        'banner',
        'smallbanner',
        'header',
        'merchant_link',
        'description',
        'metatitle',
        'metakeyword',
        'metadescription',
        'status',
        'topbanner_code',
    ];

    public function cities()
    {
        //return $this->belongsTo(Cities::class, 'city_id', 'id');
        return $this->belongsTo(Cities::class);
        //return $this->hasMany(Rent::class);
    }
}
