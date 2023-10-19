<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Services\Payment\PaymentInterface;
use Spatie\Menu\Laravel\Facades\Menu;
use Spatie\Menu\Laravel\Link;

class SiteController extends Controller
{
    public function index()
    {

        $menu = Menu::new([
            Link::to('/', 'Home'),
            Link::to('/about', 'About'),
        ]);

        //dd($menu->__toString());

        $sliders = $this->Slider()->activeItems();

        $brands = $this->Brand()->activeItems();

        $categories = $this->Category()->getCategoryWith(['products.attributesVariant'])->groupByType();

        $collections = $this->ProductCollection()->showInHome();

        $productsSearched = $this->Product()->bestSearched();

        return view(
            'theme.home.index',
            compact(
                'sliders',
                'categories',
                'collections',
                'productsSearched', 'brands'
            )
        );
    }

    public function test()
    {
        /*$products = $this->Product()->model()->pluck('slug');
        $resultat = $products->map(function ($item, $key) {
            return url(route('products.single', $item));
        });
        dd($resultat, '---');
        $payment = app(PaymentInterface::class)->getPayment();
        dd($payment);
        return view('payment.cmi');*/

        return response()->success($this->Slider()->activeItems());
    }

    public function testProd()
    {
        $oo = $this->Order()->model()->get()->groupByStatus();
        dd($oo);
    }

    public function directive()
    {
        return view('archive');
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

    public function subDomain()
    {
        return 'Hello';
    }
}
