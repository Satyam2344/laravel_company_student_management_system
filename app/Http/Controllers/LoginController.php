<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    //this is login check
    public function authenticate(Request $request)
    {
        $credentials = $request->only('email', 'password');
        // print_r($credentials);die;

        if (Auth::attempt($credentials)) {
            // Authentication passed...
            // die(Auth::user()->name);
            $user['email'] =  $credentials['email'];
            $user['password'] =  $credentials['password'];
            $request->session()->put('user',$user);
            // $request->session()->put('password', $credentials['password']);
            // print_r(session('user'));die;
            return redirect()->intended('dashboard')->with('success', Auth::user()->name);
            ;
        }
        else{
            // echo "<h3>Connot authorized!!</h3>";
            return redirect()->intended('/');

        }
    }

    public function logout(Request $request): RedirectResponse{
        Auth::logout();
        $request->session()->invalidate();
        // $request->session()->regenerateToken();
        $request->session()->flush();
        return redirect('/');
}
}
