<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
// use Image;

class ProductController extends Controller
{
    public function getAllProducts(Request $request){
        $products = Product::all();
        return response()->json([
            'products' => $products
        ], 200);
    }

    public function addProduct(Request $request){
        $product = new Product();
        $product->name = $request->name;
        $product->description = $request->description;
        $image = $request->photo;  // base64 encoded image
        $image = str_replace('data:image/jpeg;base64,', '', $image);
        $image = str_replace(' ', '+', $image);
        $imageName = Str::random(10).'.'.'jpg';
        \File::put(public_path('upload'). '/' . $imageName, base64_decode($image));
        $product->photo = $imageName;
        $product->type = $request->type;
        $product->quantity = $request->quantity;
        $product->price = $request->price;
        $product->save();
    }

    public function getProduct($id){
        $product = Product::find($id);
        return response()->json([
            'product' => $product
        ], 200);
    }

    public function updateProduct(Request $request, $id){
        $product = Product::find($id);
        $product->name = $request->name;
        $product->description = $request->description;
        $image = $request->photo;  // base64 encoded image
        $image = str_replace('data:image/jpeg;base64,', '', $image);
        $image = str_replace(' ', '+', $image);
        $imageName = Str::random(15).'.'.'jpg';
        \File::put(public_path('upload'). '/' . $imageName, base64_decode($image));
        $product->photo = $imageName;
        $product->type = $request->type;
        $product->quantity = $request->quantity;
        $product->price = $request->price;
        $product->save();
    }
}
