<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['show', 'index']);
    }
    public function index(User $user)
    {
        $posts = Post::where('user_id', $user->id)->paginate(20);
        return view('dashboard', [
            'user'=>$user,
            'posts'=>$posts,
        ]);
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title'=>'required|max:255',
            'description'=>'required',
            'image'=>'required'
        ]);

        //forma 1 de guardar un registro
        // Post::create([
        //     'title' => $request->title,
        //     'description' => $request->description,
        //     'image' => $request->image,
        //     'user_id' => auth()->user()->id
        // ]);

        //forma 2 de guardar un registro
        // $post = new Post();
        // $post->title = $request->title;
        // $post->description = $request->description;
        // $post->image = $request->image;
        // $post->user_id = auth()->user()->id;
        // $post->save();

        //forma 3 de guardar un registro
        //Esta se hace si se ha creado una relacion en los modelos post y user
        $request->user()->posts()->create([
            'title' => $request->title,
            'description' => $request->description,
            'image' => $request->image,
            'user_id' => auth()->user()->id
        ]);

        return redirect()->route('posts.index', auth()->user()->username);
    }

    public function show(User $user, Post $post)
    {
        return view('posts.show', ['post'=>$post, 'user'=>$user]);
    }

    public function destroy(Request $request, Post $post)
    {
        //esta policy verifica si tienes permiso de eliminar el post
        $this->authorize('delete', $post);
        $post->delete();
        $imagePath = public_path('uploads') . "/" . $post->image;
        if(File::exists($imagePath)){
            unlink($imagePath); //elimina la imagen
        }
        return redirect()->route('posts.index', auth()->user()->username);
    }
}
