<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $hot_deals = Product::orderBy('created_at', 'DESC')->take(3)->get();
        $new = Product::orderBy('created_at', 'DESC')->skip(3)->take(4)->get();
        $feature = Product::orderBy('created_at', 'DESC')->skip(7)->take(4)->get();

        $wine = Product::where('category', 'wine')->orderBy('created_at', 'DESC')->take(4)->get();
        $tequila = Product::where('category', 'tequila')->orderBy('created_at', 'DESC')->take(4)->get();
        $cognac = Product::where('category', 'cognac')->orderBy('created_at', 'DESC')->take(4)->get();
        $whisky = Product::where('category', 'whisky')->orderBy('created_at', 'DESC')->take(4)->get();
        $gin = Product::where('category', 'gin')->take(4)->orderBy('created_at', 'DESC')->get();
        $champagne = Product::where('category', 'champagne')->orderBy('created_at', 'DESC')->take(4)->get();

        return view('home', [
            'hotDeals' => $hot_deals,
            'new' => $new,
            'featured' => $feature,
            'wine' => $wine,
            'tequila' => $tequila,
            'cognac' => $cognac,
            'whisky' => $whisky,
            'gin' => $gin,
            'champagne' => $champagne,
        ]);
    }
}
