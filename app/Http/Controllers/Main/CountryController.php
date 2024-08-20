<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Models\Attraction;
use App\Models\Country;
use App\Models\CountryNavbar;
use App\Models\Deal;
use App\Models\Faq;
use App\Models\Navbar;
use App\Models\Popular;
use App\Models\Review;
use Illuminate\Http\Request;

class CountryController extends Controller
{
    public function index(Request $request, $extension)
    {
        $navbarUrl = substr($request->segments()[0], 0, -5);
        $nestedNavbars = Navbar::getNestedNavbars();
        //dd($nestedNavbars);
        $pageData = Navbar::where('slug', $navbarUrl)->firstOrFail();
        $viewpage = '404';
        $data = Country::where('status', 'Yes')
            ->select('name', 'slug')
            ->orderBy('name','ASC')
            ->get();
        $viewpage = 'country.main';

        return view($viewpage, [
            'result' => $nestedNavbars,
            'data' => $data,
            'pageDetail' => $pageData,
            'pageId' => $pageData->id,
        ]);
    }

    public function countryDetail(Request $request, $url)
    {
        $slug = substr($url, 0, -5);
        $nestedNavbars = Navbar::getNestedNavbars();
        $countryData = Country::where('slug', $slug)->firstOrFail();
        $pageDetail = Country::getCountryDetails($countryData['id'], $_ENV['DOMAIN_ID'])->firstOrFail();
        $pageId = CountryNavbar::where(['domain_id' => $nestedNavbars[0]['domainid'], 'country_id' => $countryData['id']])
            ->pluck('page_id')->firstOrFail();
        $popularCompanies = Popular::getPopularCompanies($pageId, $countryData['id']);
        $attractions = Attraction::where(['domain_id' => $_ENV['DOMAIN_ID'], 'country_id' => $countryData['id']])->get();
        $faqData = Faq::where(['page_id' => $pageId, 'slug' => $countryData['slug'], 'status' => 'Yes'])->get();
        $reviewData = Review::where(['page_id' => $pageId, 'slug' => $countryData['slug'], 'status' => 'Yes'])->get();
        $dealsData = Deal::where(['domain_id'=>$_ENV['DOMAIN_ID'], 'page_id'=>$pageId, 'slug'=>$slug, 'status' => 'Yes'])->orderBy('id', 'desc')->get();

        return view('country.detail', [
            'result' => $nestedNavbars,
            'pageData' => $countryData,
            'pageDetail' => $pageDetail,
            'providerData' => $popularCompanies,
            'attrData' => $attractions,
            'faqData' => $faqData,
            'reviews' => $reviewData,
            'slug' => $slug,
            'pageId' => $pageId,
            'dealsData' => $dealsData,
        ]);
    }

}
