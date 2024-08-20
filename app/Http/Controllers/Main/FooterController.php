<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Models\Navbar;
use Illuminate\Http\Request;

class FooterController extends Controller
{
    protected $nestedNavbars;
    public function __construct()
    {
        $this->nestedNavbars = Navbar::getNestedNavbars();
    }

    public function aboutUs(Request $request)
    {
        return view('static.about-us', ['result' => $this->nestedNavbars, 'pageDetail' => '', 'pageId' => 0 ]);
    }

    public function contactUs(Request $request)
    {
        return view('static.contact-us', ['result' => $this->nestedNavbars, 'pageDetail' => '', 'pageId' => 0 ]);
    }

    public function privacyPolicy(Request $request)
    {
        return view('static.privacy-policy', ['result' => $this->nestedNavbars, 'pageDetail' => '', 'pageId' => 0 ]);
    }

    public function cookiePolicy(Request $request)
    {
        return view('static.cookies-policy', ['result' => $this->nestedNavbars, 'pageDetail' => '', 'pageId' => 0 ]);
    }

    public function termsOfUse(Request $request)
    {
        return view('static.terms-of-use', ['result' => $this->nestedNavbars, 'pageDetail' => '', 'pageId' => 0 ]);
    }

    public function cancellationAndRefundPolicy(Request $request)
    {
        return view('static.refund', ['result' => $this->nestedNavbars, 'pageDetail' => '', 'pageId' => 0 ]);
    }

}
