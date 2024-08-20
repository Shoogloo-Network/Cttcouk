<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Attraction extends Model
{
    use HasFactory;
    protected $fillable = [
        'city_id',
        'country_id',
        'ota_id',
        'domain_id',
        'banner',
        'title',
        'description',
    ];
}
