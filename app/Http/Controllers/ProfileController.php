<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class ProfileController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        return view('profile.index');
    }

    public function store(Request $request)
    {
        //modificar el request
        $request->request->add(['username'=>Str::slug($request->username)]);
        //validamos el campo username
        $this->validate($request, [
            'username'=>[
                    'required',
                    'unique:users,username,'.auth()->user()->id,
                    'min:3',
                    'max:20',
                    'not_in:twitter,facebook,editar-perfil,loquita,sape'
                ]
            //not_in:twitter,facebook,pepito => nombre no validos
            //in:CLIENTE,PROVEEDOR => se puede usar para roles
        ]);

        if($request->image)
        {
            $image = $request->file('image');
            $imageName = Str::uuid() . '.' . $image->extension();
            $instanceImage = Image::make($image);
            $instanceImage->fit(1000, 1000);
            $imagePath = public_path('profiles') . '/' . $imageName;
            $instanceImage->save($imagePath);
        }

        $user = User::find(auth()->user()->id);
        $user->username = $request->username;
        $user->image = $imageName ?? $user->image ?? "";
        $user->save();
        return redirect()->route('posts.index', $user->username);

    }
}
