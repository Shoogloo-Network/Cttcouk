<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Models\Deal;
use App\Models\Faq;
use App\Models\Navbar;
use App\Models\Popular;
use App\Models\Route;
use App\Models\RouteDetail;
use App\Models\RouteNavbar;
use Carbon\Carbon;
use Illuminate\Http\Request;

class JourneyController extends Controller
{
    public function index(Request $request, $extension)
    {
        $navbarUrl = substr($request->segments()[0], 0, -5);
        $nestedNavbars = Navbar::getNestedNavbars();
        $pageData = Navbar::where('slug', $navbarUrl)->firstOrFail();
        $data = Route::where(['status' => 'Yes', $_ENV['SITE_NAME'] => 1])->orderBy('name', 'asc')->get();
        $viewpage = 'cityroute.routemain';
        return view($viewpage, [
            'result' => $nestedNavbars,
            'data' => $data,
            'pageDetail' => $pageData,
            'pageId' => $pageData->id,
        ]);
    }

    /**
     *
     */
    public function routeDetail(Request $request, string $to, string $from, $unused)
    {
        $route = trim($from . '-to-' . $to);
        $nestedNavbars = Navbar::getNestedNavbars();
        $pageId = RouteNavbar::where(['domain_id' => $nestedNavbars[0]['domainid']])->get()->pluck('page_id')->firstOrFail();
        $routeData = Route::where(['slug' => $route, $_ENV['SITE_NAME'] => '1', 'status' => 'Yes'])->firstOrFail();
        $pageDetail = RouteDetail::where(['route_id' => $routeData['id'], 'domain_id' => $_ENV['DOMAIN_ID']])->firstOrFail();
        $popularCompanies = Popular::getPopularCompanies($pageId, $routeData['id']);
        $faqData = Faq::where(['page_id' => $pageId, 'slug' => $routeData['slug'], 'status' => 'Yes'])->get();
	$dealsData = Deal::where(['domain_id' => $_ENV['DOMAIN_ID'], 'page_id' => $pageId, 'slug' => $routeData['slug'], 'status' => 'Yes'])
                ->where('expiry', '>=', Carbon::now())                    
                ->orderBy('id', 'desc')->get();
        return view('cityroute.route-detail', [
            'result' => $nestedNavbars,
            'routeData' => $routeData,
            'pageDetail' => $pageDetail,
            'providerData' => $popularCompanies,
            'faqData' => $faqData,
	    'dealsData' => $dealsData,
            'pageId' => $pageId,
            'slug' => $route,
        ]);
    }
}
