<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Post;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{

    public function index()
    {
        $inputs = User::all();
        return view('user.index')
            ->with('userinfo', $inputs);
    }

    public function show()
    {
        $user = User::find(Auth::user()->id);
        return view('user.show')
            ->with('users', $user);
    }
    public function edit()
    {
        $edit = User::find(Auth::user()->id);
        return view('user.edit')
            ->with('edit',$edit);
    }

}
