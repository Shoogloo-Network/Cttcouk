<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Railcard extends Model
{
    use HasFactory;
    protected $fillable = [
        'country_id',
        'name',
        'slug',        
        'popularorder', 
        'banner',
        'logo',
        'description',
        'metatitle',
        'metakeyword',
        'metadescription',
        'status',
        'image',
        'topbanner_code',
    ];
}
