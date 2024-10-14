<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class AuthController extends Controller
{
    public function getLogin()
    {
        return view('login');
    }
    public function getClient()
    {
        return view('client.index');
    }


    public function postLogin(Request $request)
    {
        $user = $request->only(['email', 'password']);

        if (Auth::attempt($user)) {

            // $request->session()->regenerate();

            return redirect()->route('client.index');
        } else {
            return redirect()->back()->with('message', 'Email hoang Password khong ton tai');
        }
    }
    public function getRegister()
    {
        return view('register');
    }
    public function postRegister(Request $request)
    {
        $data = $request->validate([
            'fullname' => ['required', 'min:3'],
            'username' => ['required', Rule::unique('users'), 'min:3'],
            'email' => ['required', Rule::unique('users'), 'email'],
            'password' => ['required', 'min:5'],
            'confirm_password' => ['required', 'same:password'],
        ]);

        User::query()->create($data);

        return redirect()->route('login')->with('msg', 'dang ki thanh cong');
    }
    public function editUser(User $user)
    {

        return view('editUser', compact('user'));
    }
    public function updateUser(Request $request, User $user)
    {

        $data = $request->except('avatar');

        if ($request->hasFile('avatar')) {
            $data['avatar'] = Storage::put('images', $request->file('avatar'));
        }


        
        // dd($data['avatar']);
        $currentPoster = $user->avatar;

        $user->update($data);

        if (
            $request->hasFile('avatar')
            && !empty($currentPoster)
            && Storage::exists($currentPoster)
        ) {
            Storage::delete($currentPoster);
        }


        return redirect()->back()->with('message', 'cap nhat thanh cong');
    }

    public function editPassword()
    {

        return view('editPassword');
    }


    public function updatePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|confirmed|min:8',
        ]);

        $user = auth()->user();

        if (!Hash::check($request->current_password, $user->password)){
            return back()->with('error_pass', 'Mật khẩu hiện tại không đúng.');
        }

        $user->password = Hash::make($request->new_password);
        $user->save();

        return back()->with('message', 'Đổi mật khẩu thành công.');
       
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('login');
    }
}
