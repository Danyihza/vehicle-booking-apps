<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

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
                    Log::info("User sign in with username : {$user->username} and role : {$user->role}");
                    return to_route('admin.dashboard');
                } else if($user->role == 2) {
                    Log::info("User sign in with username : {$user->username} and role : {$user->role}");
                    return to_route('user.booking');
                } else {
                    Log::info("Unknown User");
                    return back()->withInput()->with('error', 'Unknown User');
                }
            } else {
                Log::info("User with username {$user->username} failed to sign in: Wrong Password");
                return back()->withInput()->with('error', 'Wrong Password');
            }
        }
        
        Log::info("User Not Found");
        return back()->with('error', 'User not found');
    }

    public static function signout()
    {
        session()->flush();
        Log::info("User Signout at " . now());
        return to_route('auth.signin');
    }
}
