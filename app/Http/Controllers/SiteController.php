<?php

namespace App\Http\Controllers;

use App\Repositories\Page\PageInterface;
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

        $productsSearched = $this->Product()->model()->topSearched();

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


    public function about()
    {
        $about = $this->Page()->getPage('a-propos-de-nous');

        $teams = $this->Team()->activeItems();

        return view('theme.about.index', compact('about', 'teams'));
    }

    public function getPage($slug)
    {
        $page = app(PageInterface::class)->getPage($slug);

        return view('theme.page.index', compact('page'));
    }
}
