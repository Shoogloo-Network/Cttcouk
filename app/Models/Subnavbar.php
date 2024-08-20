<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subnavbar extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'navbar_id',
        'child_id',
        'name',
        'slug',
        'type',
        'description',
        'order',
        'metatitle',
        'metakeyword',
        'metadescription',
        'status',
        'created_at',
        'updated_at',
    ];

    
}
