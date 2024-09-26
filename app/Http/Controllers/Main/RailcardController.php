<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Models\Deal;
use App\Models\Faq;
use App\Models\Navbar;
use App\Models\Railcard;
use App\Models\RailcardDetail;
use App\Models\RailcardNavbar;
use Illuminate\Http\Request;

class RailcardController extends Controller
{
    public function index(Request $request, $extension)
    {
        $navbarUrl = substr($request->segments()[0], 0, -5);
        $nestedNavbars = Navbar::getNestedNavbars();
        $pageData = Navbar::where('slug', $navbarUrl)->where('domain_id', $_ENV['DOMAIN_ID'])->firstOrFail();
        $viewpage = '404';
        $data = Railcard::join('railcarddetails', function ($join) {
            $join->on('railcards.id', '=', 'railcarddetails.railcard_id');
        })
            ->where(['railcards.status' => 'Yes', 'railcards.' . $_ENV['SITE_NAME'] => 1, 'railcarddetails.domain_id' => $_ENV['DOMAIN_ID']])
            ->select('railcards.*', 'railcarddetails.logo AS logo', 'railcarddetails.shortdesc AS shortdesc')
            ->get();
        $viewpage = 'railcard.main';

        return view($viewpage, [
            'result' => $nestedNavbars,
            'data' => $data,
            'pageDetail' => $pageData,
            'pageId' => $pageData->id,
        ]);
    }

    public function railcardDetail(Request $request, $url)
    {
        $railcard = substr($url, 0, -5);

        $nestedNavbars = Navbar::getNestedNavbars();

        $pageId = RailcardNavbar::where(['domain_id' => $nestedNavbars[0]['domainid']])->get()->pluck('page_id')->firstOrFail();

        $railcardData = Railcard::where('slug', $railcard)->firstOrFail();

        $faqData = Faq::where(['page_id' => $pageId, 'slug' => $railcardData['slug'], 'status' => 'Yes'])->get();

        $dealsData = Deal::where(['domain_id'=>$_ENV['DOMAIN_ID'], 'page_id'=>$pageId, 'slug'=>$railcard, 'status' => 'Yes'])->orderBy('id', 'desc')->get();

        $pageDetail = RailcardDetail::where(['railcard_id' => $railcardData['id'], 'domain_id' => $_ENV['DOMAIN_ID']])->firstOrFail();

        return view('railcard.detail', [
            'result' => $nestedNavbars,
            'railcardData' => $railcardData,
            'pageDetail' => $pageDetail,
            'pageId' => $pageId,
            'faqData' => $faqData,
            'dealsData' => $dealsData,
            'slug' => $railcard,
        ]);
    }
}
