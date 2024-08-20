<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FerryDetail extends Model
{
    use HasFactory;
    protected $table = 'ferrydetails';
    protected $fillable = [
        'ferry_id',
        'domain_id',      
        'banner',
        'logo',
        'header',
        'description',
        'metatitle',
        'metakeyword',
        'metadescription',
        'status',
        'topbanner_image',
        'rightbanner_image',
        'shortdesc',
        'rightbanner_code',
        'search_right',
        'merchant_link',
        'merchant_details',
        'ferry_routes_id',
        'attractions_id',
    ];
}
