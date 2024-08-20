<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Models\Navbar;
use Illuminate\Http\Request;

class FooterController extends Controller
{
    public function staticPage(Request $request)
    {
        $nestedNavbars = Navbar::getNestedNavbars();
        $viewpage = 'static.about-us';
        return view($viewpage, [
            'result' => $nestedNavbars,
        ]);
    }


    public function privacyPolicy(Request $request)
    {
        $nestedNavbars = Navbar::getNestedNavbars();
        $viewpage = 'static.privacy-policy';
        return view($viewpage, [
            'result' => $nestedNavbars,
        ]);
    }



}
