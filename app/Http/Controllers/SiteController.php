<?php

namespace App\Http\Controllers;

use App\Models\Ads;
use App\Models\Archive;
use App\Models\Product;
use App\Models\Slider;
use App\Services\Payment\PaymentInterface;
use Illuminate\Http\Request;

class SiteController extends Controller
{

    public function index()
    {

        $sliders  = $this->Slider()->activeItems();

        $topAds = $this->Ads()->locationIn('top_slider', 2);
        $centerAds = $this->Ads()->locationIn('center_home', 3);
        $bottomAds = $this->Ads()->locationIn('bottom_home', 2);

        $categories = $this->Category()->randomsHome();

        $collections = $this->ProductCollection()->showInHome();

        $categoriesOfYear = $this->Category()->categoryOfYear();

        $productsSearched = $this->Product()->bestSearched();

        return view(
            'theme.home.index',
            compact(
                'sliders',
                'topAds',
                'centerAds',
                'bottomAds',
                'categories',
                'categoriesOfYear',
                'collections',
                'productsSearched'
            )
        );
    }

    public function test()
    {
        $payment = app(PaymentInterface::class)->getPayment();
        dd($payment);
       return view('payment.cmi');
    }


    public function about()
    {
        $about = $this->Page()->getPage('a-propos-de-nous');

        $teams = $this->Team()->activeItems();

        return view('theme.about.index', compact('about', 'teams'));
    }

    public function getPage($slug)
    {
        $page = $this->Page()->getPage($slug);

        return view('theme.page.index', compact('page'));
    }
}
