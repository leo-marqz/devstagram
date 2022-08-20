<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function index()
    {
        return view('auth.register');
    }
    public function store(Request $request)
    {
        // dd($request->get('username'));
        //validation
        // 'username'=>'required|unique:users,column,except,id',
        $this->validate($request, [
            'name'=>'required|min:3|max:30',
            'username'=>'required|unique:users|min:3|max:30',
            'email'=>'required|email|unique:users|max:60',
            'password'=>'required|min:4',
            'password_confirmation'=>'required|min:4'
        ]);
    }

    public function destroy()
    {
        return 'destroy...';
    }
}
