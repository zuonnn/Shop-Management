<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function index() {
        return view('login', [
            'title' => 'Login Page'
        ]);
    }
    public function store(Request $request) {
        $this -> validate($request, [
            'username' => 'required|string',
            'password' => 'required|string'
        ]);

        if (Auth::attempt([
            'username' => $request->input('username'),
            'password' => $request->input('password')
        ], $request->input('remember'))) {
            return redirect()->route('admin');
        }

        Session::flash('error', 'Account or password incorrect!');

        return redirect()->back();
    }
}
