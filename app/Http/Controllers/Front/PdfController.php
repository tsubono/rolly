<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;


class PdfController extends Controller
{

    public function __construct()
    {
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function belt(Request $request)
    {
        return response()->file(public_path(). '/pdf/rolly_beltsizechecker.pdf');
    }
}
