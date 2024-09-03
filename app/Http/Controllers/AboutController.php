<?php

namespace App\Http\Controllers;

use App\Models\User;

use Illuminate\Http\Request;

class AboutController extends Controller
{
    //
    public function show() {
        return view('welcome');
    }

    public function cred(Request $request){

        echo "<pre>";

        // $user = User::where('name', $request->user_name)->first();
        // print_r($user->toArray());

        $hashedPassword = bcrypt(request('password'));
        $user = new User;
        $user->email ='satyam@gmail.com';
        $user->name = request('user_name');
        $user->password = $hashedPassword;
        $user->save();
        die("done");

        $product = new Product;

    }


}
