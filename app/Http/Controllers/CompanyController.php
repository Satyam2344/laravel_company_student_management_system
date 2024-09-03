<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;

class CompanyController extends Controller
{
    //this is company controller
    public function register(Request $request){
        echo "<pre>";
        // print_r($request->toArray());die;
        $request->validate([
            'company_name' => 'required',
            'email' => 'required',
            'address' => 'required',
            'department' => 'required',
        ]);

        $company = new Company;
        $company->email = request('email');
        $company->name = request('company_name');
        $company->address = request('address');
        $company->department = request('department');
        $company->save();
        echo "<h1> Successfully registered </h1>";
        die;


    }

    public function getData(Request $request){
        // print_r($request->id);die;
        $email = $request->email;

        $company = Company::where(['email'=>$email])->get();
        // print_r($Company->toArray());die;
        return view('updatecompany', compact('company'));
    }

    public function show() {
        $companies = Company::all();
        // $Company = $Company->toArray();
        // print_r($companies);die;
        return view('companies', compact('companies'));
    }
    public function update(Request $request){
        // print_r(request('company_name'));die;

        $company = new Company;

        if(!empty(request('email'))){
            $company->email = request('email');
        }

        if(!empty(request('company_name'))){
            $company->name = request('company_name');
        }
        if(!empty(request('address'))){
            $company->address = request('address');
        }

        if(!empty(request('department'))){
            $company->department = request('department');
        }
        $Company = $company->toArray();

        $update = Company::where('id', $request->id) ->update($Company);

        echo "<h1> Successfully updated </h1>";
        die;
    }

    public function delete(Request $request){
        // print_r($request->id);die;
        $update = Company::where('id', $request->id) ->delete();
        echo "<h1> Deleted Successfully</h1>";
        die;


    }
}
