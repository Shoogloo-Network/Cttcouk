<?php

namespace App\Models;

use App\Models\CityDetail;
use App\Models\City_navbar;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Cities extends Model
{
    use HasFactory;

    protected $fillable = [
        'country_id', 'name', 'popularorder', 'slug', 'banner', 'smallbanner', 'weathercode', 'description', 'metatitle', 'metakeyword', 'metadescription', 'status',
    ];

    public static function getCityDetails($cityId = null, $domainId)
    {
        $data = DB::table('cities')
            ->join('citiesdetails as ctd', 'ctd.city_id', '=', 'cities.id')
            ->select('cities.id as cityId', 'cities.name', 'cities.popularorder', 'cities.slug', 'ctd.domain_id', 'ctd.banner',
                'ctd.smallbanner', 'ctd.header', 'ctd.merchant_link', 'ctd.description', 'ctd.metatitle', 'ctd.metakeyword',
                'ctd.metadescription', 'ctd.shortdesc'
            )->where(['domain_id' => $domainId, 'city_id' => $cityId])
            ->inRandomOrder()->limit(3)
            ->orderBy('ctd.id', 'asc')->get();
        return $data;
    }


    public static function getHomeCities($domainId)
    {
        $data = DB::table('cities')
            ->join('citiesdetails as ctd', 'ctd.city_id', '=', 'cities.id')
            ->select('cities.id as cityId', 'cities.name', 'cities.popularorder', 'cities.slug', 'ctd.domain_id', 'ctd.banner',
                'ctd.smallbanner', 'ctd.header', 'ctd.merchant_link', 'ctd.description', 'ctd.metatitle', 'ctd.metakeyword',
                'ctd.metadescription', 'ctd.shortdesc'
            )->where(['domain_id' => $domainId])->whereIn('ctd.city_id', ['1', '2', '5'])
            ->orderBy('ctd.id', 'asc')->get();

        return $data;
    }

    public function cityDetails()
    {
        return $this->hasOne(CityDetail::class, 'city_id');
        //return $this->hasMany(CityDetail::class, 'city_id');
    }

    public function cityNavbar()
    {
        return $this->hasMany(City_navbar::class);
    }
}
