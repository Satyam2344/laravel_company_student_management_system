<?php

namespace App\Http\Controllers;
use App\Models\Students;

use Illuminate\Http\Request;

class RegistrationController extends Controller
{
    //this is student registraton controller
    public function register(Request $request){
        echo "<pre>";
        $request->validate([
            'user_name' => 'required',
            'email' => 'required',
            'address' => 'required',
            'gender' => 'required',
            'password' => 'required'
        ]);

        $hashedPassword = bcrypt(request('password'));
        $user = new Students;
        $user->email = request('email');
        $user->name = request('user_name');
        $user->address = request('address');
        $user->gender = request('gender');
        $user->password = $hashedPassword;
        $user->save();
        echo "<h1> Successfully registered </h1>";
        die;

    }

    public function getData(Request $request){
        // print_r($request->id);die;
        $email = $request->email;

        $student = Students::where(['email'=>$email])->get();
        // print_r($student->toArray());die;
        return view('updatestudents', compact('student'));
    }

    public function show() {
        $students = Students::all();
        // $students = $students->toArray();
        return view('students', compact('students'));
    }
    public function update(Request $request){
        // print_r(request('user_name'));die;

        $user = new Students;

        if(!empty(request('email'))){
            $user->email = request('email');
        }

        if(!empty(request('user_name'))){
            $user->name = request('user_name');
        }
        if(!empty(request('address'))){
            $user->address = request('address');
        }
        if(!empty(request('password'))){
            $hashedPassword = bcrypt(request('password'));
            $user->password = $hashedPassword;
        }
        if(!empty(request('gender'))){
            $user->gender = request('gender');
        }
        $student = $user->toArray();

        $update = Students::where('id', $request->id) ->update($student);

        echo "<h1> Successfully updated </h1>";
        die;
    }

    public function delete(Request $request){
        // print_r($request->id);die;
        $update = Students::where('id', $request->id) ->delete();
        echo "<h1> Deleted Successfully</h1>";
        die;


    }
}

