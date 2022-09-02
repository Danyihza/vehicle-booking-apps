<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function index()
    {
        return view('signin');
    }

    public function signin(Request $request) : RedirectResponse
    {
        $username = $request->username;
        $password = $request->password;
        $user = User::where('username', $username)->first();
        if($user){
            if(Hash::check($password, $user->password)) {
                session([
                    'id' => $user->id,
                    'role' => $user->role
                ]);
                if($user->role == 1){
                    return to_route('admin.dashboard');
                } else if($user->role == 2) {
                    return to_route('user.booking');
                } else {
                    return back()->withInput()->with('error', 'Unknown User');
                }
            } else {
                return back()->withInput()->with('error', 'Wrong Password');
            }
        }

        return back()->with('error', 'User not found');
    }

    public static function signout()
    {
        session()->flush();
        return to_route('auth.signin');
    }
}
