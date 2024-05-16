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
            'images.*' => 'required|file|mimes:jpeg,png,jpg,gif|max:2048', 
        ]);
    
        foreach ($request->file('images') as $image) {
            // Check if file is an image
            if (!$image->isValid() || !in_array($image->getClientOriginalExtension(), ['jpeg', 'png', 'jpg', 'gif'])) {
                var_dump('Invalid file type');
                return redirect()->route('dashboard')->with('errorfilekind', 'Please upload valid image files (jpeg, png, jpg, gif).');

            }
    
            // Check if file size exceeds 2048 KB
            if ($image->getSize() > 2048 * 1024) {
                return redirect()->route('dashboard')->with('errorfilesize', 'foto te groot');
            }
    
            $imageName = time().'_'.$image->getClientOriginalName();
            $image->move(public_path('images'), $imageName);
            $product = new Product();
            $product->name = $request->name;
            $product->description = $request->description;
            $product->image = 'images/'.$imageName; 
            $product->save();
        }
    
        return redirect()->route('dashboard')->with('success', 'foto succesfol geupload!');
    }
    

    public function showLibrary()
    {
        $products = Product::all(); // Fetch all products
        return view('library.dashboard-library', compact('products'));
    }
}



