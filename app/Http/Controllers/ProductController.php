<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        // $products = Product::all()->toArray();
        // return array_reverse($products);
        return Product::get();
    }

    public function show(Product $product)
    {
        return $product;
    }
    
    public function add(Request $request){
        $pname = $request->input('pname');
        $slug = $request->input('slug');
        $pcategory = $request->input('pcategory');
        $price = $request->input('price');
        $description = $request->input('description');
        $quantity = $request->input('quantity');
        $pimage = $request->file('pimage')->store('public');

        $products = new Product([
            'pname'=> $pname,
            'slug'=> $slug,
            'pcategory'=> $pcategory,
            'price'=>$price,
            'quantity'=>$quantity,
            'pimage'=> $pimage,
            'description'=>$description,
        ]);

        $products->save();

        return response()->json('product add successfully');
    }

}
