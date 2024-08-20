<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HomeNavbar extends Model
{
    use HasFactory;
    protected $table = 'home_navbars';
    protected $fillable = [
        'domain_id',
        'page_id',
    ];
}
