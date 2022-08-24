<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

/**
 * @author LeoMarqz
 */
class ImagenController extends Controller
{
    public function store(Request $request)
    {
        $image = $request->file('file');
        $imageName = Str::uuid() . '.' . $image->extension();
        $instanceImage = Image::make($image);
        $instanceImage->fit(1000, 1000);
        $imagePath = public_path('uploads') . '/' . $imageName;
        $instanceImage->save($imagePath);

        return response()->json(['image'=>$imageName]);
    }
}
