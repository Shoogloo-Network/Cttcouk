<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Models\Deal;
use App\Models\Faq;
use App\Models\Ferries;
use App\Models\FerryDetail;
use App\Models\FerryNavbar;
use App\Models\Navbar;
use Illuminate\Http\Request;

class FerryController extends Controller
{
    public function index(Request $request, $extension)
    {
        $navbarUrl = substr($request->segments()[0], 0, -5);
        $nestedNavbars = Navbar::getNestedNavbars();
        $pageData = Navbar::where('slug', $navbarUrl)->where('domain_id', $_ENV['DOMAIN_ID'])->firstOrFail();
        $viewpage = '404';
        $data = Ferries::join('ferrydetails', function ($join) {
            $join->on('ferries.id', '=', 'ferrydetails.ferry_id');
        })
            ->where(['ferries.status' => 'Yes', 'ferries.' . $_ENV['SITE_NAME'] => 1, 'ferrydetails.domain_id' => $_ENV['DOMAIN_ID']])
            ->select('ferries.*', 'ferrydetails.logo AS logo', 'ferrydetails.shortdesc AS shortdesc')
            ->get();
        $viewpage = 'ferry.main';

        return view($viewpage, [
            'result' => $nestedNavbars,
            'data' => $data,
            'pageDetail' => $pageData,
            'pageId' => $pageData->id,
        ]);
    }

    public function ferryDetail(Request $request, $url)
    {
        $ferry = substr($url, 0, -5);

        $nestedNavbars = Navbar::getNestedNavbars();

        $pageId = FerryNavbar::where(['domain_id' => $nestedNavbars[0]['domainid']])->get()->pluck('page_id')->firstOrFail();

        $ferryData = Ferries::where('slug', $ferry)->firstOrFail();

        $faqData = Faq::where(['page_id' => $pageId, 'slug' => $ferryData['slug'], 'status' => 'Yes'])->get();

        $dealsData = Deal::where(['domain_id'=>$_ENV['DOMAIN_ID'], 'page_id'=>$pageId, 'slug'=>$ferry, 'status' => 'Yes'])->orderBy('id', 'desc')->get();

        $pageDetail = FerryDetail::where(['ferry_id' => $ferryData['id'], 'domain_id' => $_ENV['DOMAIN_ID']])->firstOrFail();

        return view('ferry.detail', [
            'result' => $nestedNavbars,
            'ferryData' => $ferryData,
            'pageDetail' => $pageDetail,
            'pageId' => $pageId,
            'faqData' => $faqData,
            'dealsData' => $dealsData,
            'slug' => $ferry,
        ]);
    }
}
