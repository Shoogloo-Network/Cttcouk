<?php

namespace App\Models;

use App\Models\Cities;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City_navbar extends Model
{
    use HasFactory;

    protected $fillable = [
        'domain_id',
        'city_id',
        'page_id',
    ];

    public function cities()
    {
        return $this->belongsTo(Cities::class);
    }
}
