<?php

namespace App\Http\Controllers;

use App\Http\Middleware\User;
use Illuminate\Http\Request;
use Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth:web');
        $this->middleware('user');
    }

    public function index()
    {

        $user=Auth::user();
        return view('user.edit',compact('user'));
    }


    public function edit($id)
    {
        $user= User::findOrFail($id);
        return view('user.edit', compact('user'));
    }

    public function logout(Request $request)
    {
        Auth::guard('user')->logout();

        $request->session()->invalidate();

        return redirect()->route('welcome');
    }


    public function deactivate(Request $request)
    {
        $user=Auth::user();
        $user->status=false;

        $user->update();

        Auth::guard('user')->logout();

        $request->session()->invalidate();


        return view('message')->with('message','Your account deactivated successfully');

    }
}
