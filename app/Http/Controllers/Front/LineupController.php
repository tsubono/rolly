<?php

namespace App\Http\Controllers\Front;

use App\Models\Brand;
use App\Models\Plan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;


class LineupController extends Controller
{
    private $product;
    private $brand;
    private $plan;

    public function __construct(Product $product, Brand $brand, Plan $plan)
    {
        $this->product = $product;
        $this->brand = $brand;
        $this->plan = $plan;
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
        $brands = $this->brand->all();
        $plans = $this->plan->all();

        return view('front.lineup.index', compact('products', 'brands', 'plans'));
    }

    public function show($id, Request $request) {

        $brands = $this->brand->all();
        $plans = $this->plan->all();
        $product = $this->product->findOrFail($id);

        return view('front.lineup.show', compact('product', 'brands', 'plans'));

    }
}
