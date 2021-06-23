<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Traits\InterfaceHandler;

class SiteController extends Controller
{

    use InterfaceHandler;

    public function index()
    {

        $sliders  = $this->Slider()->activeItems();

        $topAds = $this->Ads()->locationIn('top_slider');

        //$categories = $this->Category()->getWithChildrens();

        return view('theme.home.index', compact('sliders', 'topAds'));
    }
}
