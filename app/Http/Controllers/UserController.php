<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){
        $users = User::all();

        return view('users.index', compact('users'));
    }

    public function activate($id)
    {
        $user = User::find($id);
        $user->active = true;
        $user->save();

        return redirect()->route('users.index')->with('status', 'Tài khoản đã được kích hoạt.');
    }

    // Phương thức ngừng kích hoạt tài khoản
    public function deactivate($id)
    {
        $user = User::find($id);
        $user->active = false;
        $user->save();

        return redirect()->route('users.index')->with('status', 'Tài khoản đã bị ngừng hoạt động.');
    }
}
