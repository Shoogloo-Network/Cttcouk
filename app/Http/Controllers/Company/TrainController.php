<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use App\Models\Deal;
use App\Models\Faq;
use App\Models\Navbar;
use App\Models\Popular;
use App\Models\Provider;
use App\Models\ProviderDetail;
use App\Models\ProviderNavbar;
use Illuminate\Http\Request;

class TrainController extends Controller
{
    /**
     *
     */
    public function index(Request $request, $extension)
    {
        $navbarUrl = substr($request->segments()[0], 0, -5);
        $nestedNavbars = Navbar::getNestedNavbars();
        $pageData = Navbar::where('slug', $navbarUrl)->firstOrFail();

        $data = Provider::join('providerdetails', function ($join) {
            $join->on('providers.id', '=', 'providerdetails.provider_id');
        })->where(['providers.status' => 'Yes',
            'providers.type' => 'rail',
            'providers.' . $_ENV['SITE_NAME'] => 1,
            'providerdetails.domain_id' => $_ENV['DOMAIN_ID'],
        ])->select('providers.*', 'providerdetails.logo AS logo', 'providerdetails.merchant_details AS shortdesc')
        ->orderBy('providers.popularorder', 'ASC')
        ->get();

        return view('company.rail.main', [
            'result' => $nestedNavbars,
            'data' => $data,
            'pageDetail' => $pageData,
            'pageId' => $pageData->id,
        ]);
    }

    /**
     *
     */
    public function railDetail(Request $request, $url)
    {
        $ota = substr($url, 0, -5);
        $nestedNavbars = Navbar::getNestedNavbars();
        $pageId = ProviderNavbar::where(['domain_id' => $nestedNavbars[0]['domainid']])->get()->pluck('page_id')->firstOrFail();
        $railData = Provider::where(['slug' => $ota, 'status'=>'Yes'])->firstOrFail();
        $popularData = Popular::getPopularRoutes($pageId, $railData['id']);
        $pageDetail = ProviderDetail::where(['provider_id' => $railData['id'], 'domain_id' => $_ENV['DOMAIN_ID']])->firstOrFail();
        $dealsData = Deal::where(['domain_id' => $_ENV['DOMAIN_ID'], 'page_id' => $pageId, 'slug' => $ota, 'status' => 'Yes'])->orderBy('id', 'desc')->get();
        $faqData = Faq::where(['page_id' => $pageId, 'slug' => $railData['slug'], 'status' => 'Yes'])->get();

        return view('company.rail.detail', [
            'result' => $nestedNavbars,
            'railData' => $railData,
            'pageDetail' => $pageDetail,
            'popData' => $popularData,
            'dealsData' => $dealsData,
            'pageId' => $pageId,
            'slug' => $ota,            
            'faqData' => $faqData,
        ]);
    }

}
