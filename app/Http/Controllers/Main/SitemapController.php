<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
//use App\Models\Sitemap;
use Illuminate\Http\Request;

class SitemapController extends Controller
{
    public function show($site_map_slug, Request $request)
    {
        //$page = Sitemap::where('slug', $site_map_slug)->first();

        //$subcategory_id = $page->subcategory_id ?? 10006;

        //$experts = ($page->experts != null ? $page->experts : "5,6,14");
        //$expertsAry = explode(',', $experts);

        //$page_title = $page->title ?? 'Online Horoscope Prediction';

        //$sitemap_results = $this->sitemap->getProducts($subcategory_id, $page->admin_id);

        //$subcat_image = $sitemap_results[0]['subcat_image'];
        //$subcat_id = $sitemap_results[0]['subcat_id'];
        //$subcat_slug = $sitemap_results[0]['slug'];

        //$profile = Admin::where('status', 1)->with('admin_profiles')->inRandomOrder()->limit(12)->get();
        //$profile = Admin::whereIn('id', $expertsAry)->where('status', 1)->with('admin_profiles')->limit(3)->get();

        //return view('seo.'.$site_map_slug, compact('page_title', 'site_map_slug', 'sitemap_results', 'subcat_image', 'subcat_id', 'subcat_slug', 'profile', 'careerResult', 'financeResult', 'healthResult' ));

        return view('sitemap.extraction', compact('page', 'page_title', 'site_map_slug', 'sitemap_results', 'subcat_image', 'subcat_id', 'subcat_slug', 'profile', 'careerResult', 'financeResult', 'healthResult'));
    }
}
