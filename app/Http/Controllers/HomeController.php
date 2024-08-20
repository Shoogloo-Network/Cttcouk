<?php

namespace App\Http\Controllers;

use App\Models\Cities;
use App\Models\Faq;
use App\Models\HomeNavbar;
use App\Models\Navbar;
use App\Models\Popular;
use App\Models\Review;
use App\Models\Route;

class HomeController extends Controller
{
    public function index()
    {
        $nestedNavbars = Navbar::getNestedNavbars();

        $pageId = HomeNavbar::where(['domain_id' => $nestedNavbars[0]['domainid']])->get()->pluck('page_id')->firstOrFail();

        $pageData = Navbar::where(['domain_id' => $nestedNavbars[0]['domainid'], 'slug' => '/'])->firstOrFail();

        $citieshome = Cities::getHomeCities($_ENV['DOMAIN_ID']);

        $routeshome = Route::getRoutes($_ENV['DOMAIN_ID']);

        $faqData = Faq::where(['page_id' => $pageId, 'slug' => '/', 'status' => 'Yes'])->get();
        $reviews = Review::where(['page_id' => $pageId, 'slug' => '/', 'status' => 'Yes'])->get();
        $providerSliderLogo = Popular::getProviderSliderLogo();
        $guideData = Faq::where(['page_id' => $pageId, 'slug' => '/', 'status' => 'No', 'extrafaqs' => 'Yes'])->get();

        return view('welcome', [
            'result' => $nestedNavbars,
            'citieshome' => $citieshome,
            'trainroutes' => $routeshome,
            'pageId' => $pageId,
            'reviews' => $reviews,
            'faqData' => $faqData,
            'guideData' => $guideData,
            'pageDetail' => $pageData,
            'sliderData' => $providerSliderLogo,
            'slug' => $nestedNavbars[0]['parent_slug'],
        ]);
    }

}
