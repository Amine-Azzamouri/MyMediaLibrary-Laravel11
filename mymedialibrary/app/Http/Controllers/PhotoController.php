<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class PhotoController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        $imageName = time().'.'.$request->image->extension();
        $request->image->move(public_path('images'), $imageName);
        $product = new Product();
        $product->name = $request->name;
        $product->description = $request->description;
        $product->image = 'images/'.$imageName;
        $product->save();
        return redirect()->route('dashboard')->with('success', 'Product created successfully.');
    }   

    public function showLibrary()
    {
        $products = Product::all(); // Fetch all products
        dd($products); // Dump and die to check the contents of $products
        return view('library.dashboard-library', compact('products'));
    }
    
}
