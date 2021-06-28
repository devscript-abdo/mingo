<?php

namespace App\Http\Controllers;

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

        $collections = $this->ProductCollection()->model()->inHome();

        $categoriesOfYear = $this->Category()->model()->categoryOfYear();

        return view(
            'theme.home.index',
            compact('sliders', 'topAds', 'centerAds', 'bottomAds', 'categories', 'categoriesOfYear', 'collections')
        );
    }
}
