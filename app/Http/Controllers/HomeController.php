<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    public function __invoke()
    {
        //obtener a quienes seguimos
        //datos de las personas que sigo en devstagram: id
        // dd(auth()->user()->following->pluck('id')->toArray());
        $usersId = auth()->user()->following->pluck('id')->toArray();
        // dd($usersId);
        $posts = Post::whereIn('user_id', $usersId)->latest()->paginate(20);
        // dd($posts);
        return view('home', ['posts'=>$posts]);
    }

}
