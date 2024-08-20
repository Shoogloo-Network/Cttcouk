<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Footerlink extends Model
{
    use HasFactory;
    protected $table = 'footerlinks';
    protected $primaryKey = 'id';
    protected $fillable = ['name', 'urllink', 'status'];
}
