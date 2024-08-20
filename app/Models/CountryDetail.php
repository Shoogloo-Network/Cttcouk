<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CountryDetail extends Model
{
    use HasFactory;
    protected $table = 'countriesdetails';
    protected $fillable = [
        'country_id',
        'domain_id',
        'banner',
        'logo',
        'header',
        'merchant_link',
        'description',
        'metatitle',
        'metakeyword',
        'metadescription',
        'shortdesc',
        'status',
    ];
}
