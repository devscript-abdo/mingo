<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SiteController extends Controller
{

    public function index()
    {

        $sliders  = $this->Slider()->activeItems();

        $topAds = $this->Ads()->locationIn('top_slider');

        $categories = $this->Category()->randomsHome();

        return view('theme.home.index', compact('sliders', 'topAds', 'categories'));
    }
}
