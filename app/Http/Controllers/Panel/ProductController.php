<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Models\Product;

class ProductController extends Controller
{

    public function index(){
        $products = Product::all();

        return view('products.index')->with([
            'product' => $products,
        ]);

    }

    public function create(){

        return view('products.create');
    }

    public function store(ProductRequest $request){

        $product = Product::create($request->validated());

        return redirect()
            ->route('products.index')
            ->withSuccess("The new product with id {$product->id} was created");
    }

    public function show(Product $product){
        // $product = Product::findOrFail($product);

        return view('products.show')->with([
            'data' => $product,
        ]);
    }

    public function edit(Product $product){

        //$product = Product::findOrFail($product);

        return view('products.edit')->with([
            'product' => $product,
        ]);
    }

    public function update(ProductRequest $request, Product $product){

        //$product = Product::findOrFail($product);

        $product->update($request->validated());

        return redirect()
            ->route('products.index')
            ->withSuccess("The product with id {$product->id} was edited");
    }

    public function destroy(Product $product){

        //$product = Product::findOrFail($product);

        $product->delete();

        return redirect()
            ->route('products.index')
            ->withSuccess("The product with id {$product->id} was deleted");
    }

}
