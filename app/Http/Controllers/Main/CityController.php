<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Models\Attraction;
use App\Models\Cities;
use App\Models\City_navbar;
use App\Models\Deal;
use App\Models\Faq;
use App\Models\Navbar;
use App\Models\Popular;
use App\Models\Review;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CityController extends Controller
{
    public function index(Request $request, $extension)
    {
        $navbarUrl = substr($request->segments()[0], 0, -5);
        $nestedNavbars = Navbar::getNestedNavbars();
        $pageData = Navbar::where('slug', $navbarUrl)->firstOrFail();
        $data = Cities::where([$_ENV['SITE_NAME'] => '1', 'status' => 'Yes'])->orderBy('name', 'asc')->get();

        return view('city.citymain', [
            'result' => $nestedNavbars,
            'data' => $data,
            'pageDetail' => $pageData,
            'pageId' => $pageData->id,
        ]);
    }

    public function cityDetail(Request $request, $url)
    {
        $slug = substr($url, 0, -5);
        $nestedNavbars = Navbar::getNestedNavbars();

        $cityData = Cities::where('slug', $slug)->firstOrFail();

        $pageDetail = Cities::getCityDetails($cityData['id'], $_ENV['DOMAIN_ID'])->firstOrFail();
        $pageId = City_navbar::where(['domain_id' => $nestedNavbars[0]['domainid'], 'city_id' => $cityData['id']])
            ->pluck('page_id')->firstOrFail();

        $popularRoutes = Popular::getPopularRoutes($pageId, $cityData['id']);
        $popularAgents = Popular::getPopularAgents($pageId, $cityData['id']);
        $popularCompanies = Popular::getPopularCompanies($pageId, $cityData['id']);
        $attractions = Attraction::where(['domain_id' => $_ENV['DOMAIN_ID'], 'city_id' => $cityData['id']])->get();
        $faqData = Faq::where(['page_id' => $pageId, 'slug' => $cityData['slug'], 'status' => 'Yes'])->get();
        $reviewData = Review::where(['page_id' => $pageId, 'slug' => $cityData['slug'], 'status' => 'Yes'])->get();
        $dealsData = Deal::where(['domain_id' => $_ENV['DOMAIN_ID'], 'page_id' => $pageId, 'slug' => $slug, 'status' => 'Yes',])
                    ->where('expiry', '>=', Carbon::now())
                    ->orderBy('id', 'desc')->get();

        return view('city.detail', [
            'result' => $nestedNavbars,
            'pageData' => $cityData,
            'pageDetail' => $pageDetail,
            'routeData' => $popularRoutes,
            'agentData' => $popularAgents,
            'providerData' => $popularCompanies,
            'faqData' => $faqData,
            'attrData' => $attractions,
            'reviews' => $reviewData,
            'dealsData' => $dealsData,
            'slug' => $slug,
            'pageId' => $pageId,
        ]);
    }

}
