<?php

namespace App\Http\Controllers\Front;

use App\Models\Brand;
use App\Models\Plan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;


class GuideController extends Controller
{

    public function __construct()
    {
    }

    public function policy()
    {
        return view('front.guide.policy');
    }

    public function company()
    {
        return view('front.guide.company');
    }

    public function notation()
    {
        return view('front.guide.notation');
    }
}
