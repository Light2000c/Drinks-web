<?php

namespace App\Http\Controllers\product;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function index($keyword)
    {

        $results = Product::where("name", "LIKE", '%'.$keyword.'%')->orWhere("brand", "LIKE", '%'.$keyword.'%')->orderBy('created_at', 'DESC')->paginate(20);

        return view('product.search', [
            'keyword' => $keyword,
            'searchResults' => $results,
        ]);
    }

    public function search(Request $request){

        $this->validate($request, [
            "keyword" => 'required',
        ]);

        return redirect()->route('search', ["keyword" => $request->keyword]);
    }
}
