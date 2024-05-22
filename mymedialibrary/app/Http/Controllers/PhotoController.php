<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class PhotoController extends Controller
{
    public function store(Request $request)
    {
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                if ($image->getError() == UPLOAD_ERR_INI_SIZE) {
                    return back()->withErrors(['images.*' => 'Bestand mag niet groter zijn dan 2048kb']);
                }
            }
        }

        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'images.*' => 'required|file|mimes:jpeg,png,jpg,gif|max:2048', 
        ], [
            'images.*.mimes' => 'Upload geldige afbeeldingsbestanden (jpeg, png, jpg, gif).',
            'images.*.max' => 'Bestand mag niet groter zijn dan 2048kb',
        ]);
    
        foreach ($request->file('images') as $image) {
            $imageName = time().'_'.$image->getClientOriginalName();
            $image->move(public_path('images'), $imageName);
            $product = new Product();
            $product->name = $request->name;
            $product->description = $request->description;
            $product->image = 'images/'.$imageName; 
            $product->save();
        }
    
        return redirect()->route('dashboard-upload')->with('success', 'Foto succesvol geupload!');
    }
    

    public function showLibrary()
    {
        $products = Product::all(); 
        return view('library.dashboard-library', compact('products'));
    }
}