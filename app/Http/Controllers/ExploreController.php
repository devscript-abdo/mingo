<?php

namespace App\Http\Controllers;

use App\Models\Explore;
use Illuminate\Http\Request;

class ExploreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $topAds = $this->Ads()->locationIn('top_products_page', 10);

        $brands = $this->Brand()->activeItems();

        $products = $this->Product()->explore();

        return view('theme.explore.index', compact('products', 'topAds', 'brands'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Explore  $explore
     * @return \Illuminate\Http\Response
     */
    public function show(Explore $explore)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Explore  $explore
     * @return \Illuminate\Http\Response
     */
    public function edit(Explore $explore)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Explore  $explore
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Explore $explore)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Explore  $explore
     * @return \Illuminate\Http\Response
     */
    public function destroy(Explore $explore)
    {
        //
    }
}
