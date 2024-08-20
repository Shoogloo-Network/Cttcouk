<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Country extends Model
{
    use HasFactory;
    protected $table = 'countries';

    protected $fillable = [
         'name', 'shortcode', 'popularorder', 'slug', 'status', 
    ];

    public static function getCountryDetails($countryId = null, $domainId)
    {
        $data = DB::table('countries')
            ->join('countriesdetails as ctd', 'ctd.country_id', '=', 'countries.id')
            ->select('countries.id as countryId', 'countries.name', 'countries.popularorder', 'countries.slug', 'ctd.domain_id', 'ctd.banner',
                'ctd.logo', 'ctd.header', 'ctd.merchant_link', 'ctd.description', 'ctd.metatitle', 'ctd.metakeyword',
                'ctd.metadescription', 'ctd.shortdesc'
            )->where(['domain_id' => $domainId, 'country_id' => $countryId])
            ->get();
        return $data;
    }
}
