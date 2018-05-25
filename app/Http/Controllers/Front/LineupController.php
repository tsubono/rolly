<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;


class LineupController extends Controller
{
    private $product;

    public function __construct(Product $product)
    {
        $this->product = $product;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if (!empty($request->get('p', ''))) {
            $products = $this->product->where('plan_id', $request->get('p'))->get();
        } else if (!empty($request->get('b', ''))) {
            $products = $this->product->where('brand_id', $request->get('b'))->get();
        } else {
            $products = $this->product->all();
        }

        return view('front.lineup.index', compact('products'));
    }

    public function show($id, Request $request) {

        $product = $this->product->findOrFail($id);

        return view('front.lineup.show', compact('product'));

    }
}
