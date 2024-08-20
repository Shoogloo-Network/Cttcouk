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
use Carbon\Carbon;
use Illuminate\Http\Request;

class BusController extends Controller
{
    /**
     *
     */
    public function index(Request $request, $extension)
    {
        $navbarUrl = substr($request->segments()[0], 0, -5);
        $nestedNavbars = Navbar::getNestedNavbars();
        $pageData = Navbar::where('slug', $navbarUrl)->firstOrFail();
        $viewpage = '404';
        $data = Provider::join('providerdetails', function ($join) {
            $join->on('providers.id', '=', 'providerdetails.provider_id');
        })
            ->where(['providers.status' => 'Yes', 'providers.type' => 'bus', 'providers.' . $_ENV['SITE_NAME'] => 1, 'providerdetails.domain_id' => $_ENV['DOMAIN_ID']])
            ->select('providers.*', 'providerdetails.logo AS logo', 'providerdetails.merchant_details AS shortdesc')
            ->get();
        $viewpage = 'company.bus.main';

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
    public function busDetail(Request $request, $url)
    {
        $ota = substr($url, 0, -5);      
        $nestedNavbars = Navbar::getNestedNavbars();
        $busData = Provider::where(['slug' => $ota, 'type'=>'bus', $_ENV['SITE_NAME']=>1])->firstOrFail();
        $pageDetail = ProviderDetail::where(['provider_id' => $busData['id'], 'domain_id' => $_ENV['DOMAIN_ID']])->firstOrFail();
        $pageId = ProviderNavbar::where(['domain_id' => $nestedNavbars[0]['domainid'], 'provider_id'=>$busData['id']])->get()->pluck('page_id')->firstOrFail();
        $offersData = Deal::where(['domain_id' => $_ENV['DOMAIN_ID'], 'page_id' => $pageId, 'slug' => $ota, 'status' => 'Yes'])
                    ->where('expiry', '>=', Carbon::now())                    
                    ->orderBy('id', 'desc')->get();
        $faqData = Faq::where(['page_id' => $pageId, 'slug' => $busData['slug'], 'status' => 'Yes'])->get();

        return view('company.bus.detail', [
            'result' => $nestedNavbars,
            'busData' => $busData,
            'pageDetail' => $pageDetail,
            //'popData' => $popularData,
            'dealsData' => $offersData,
            'pageId' => $pageId,
            'slug' => $ota,
            'faqData' => $faqData,
        ]);
    }

}
