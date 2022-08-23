<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class ImagenController extends Controller
{
    public function store(Request $request)
    {
        $image = $request->file('file');
        $imageName = Str::uuid() . '.' . $image->extension();
        $imageServer = Image::make($image);
        
        return response()->json(['image'=>$imageName]);
    }
}
