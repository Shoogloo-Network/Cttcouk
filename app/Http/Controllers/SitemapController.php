<?php

namespace App\Http\Controllers;

use App\Models\Navbar;
use App\Models\Sitemap;
use Illuminate\Http\Response;

class SitemapController extends Controller
{
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function index(): Response
    {
        $nestedNavbars = Navbar::getNestedNavbars();
        $sitemaps = Sitemap::where('status', 'Yes')->get();
        return response()->view('sitemap', [
            'sitemaps' => $sitemaps,
            'result' => $nestedNavbars,
        ])->header('Content-Type', 'text/xml');
    }
}
