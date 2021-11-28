<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index(){
        $product = Product::available()->get();

        //$product = Product::all();

        return view('welcome')->with([
            'products' => $product
        ]);
    }
}
