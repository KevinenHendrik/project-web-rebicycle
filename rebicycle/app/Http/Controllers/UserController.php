<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Bike;
use App\Favorite;
use App\Order;
use Validator;
use Auth;
use Redirect;

class UserController extends Controller
{
    public function openEditUser(){

        return view('pages/editUser');
    }

    public function editUser(Request $request){
    	
    	$validator = Validator::make($request->all(), [
            'firstName' => 'required|string|max:255',
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,'.Auth::id(),
            'adres' => 'required|string',
            'idCardNumber' => 'required|string',
            'bankaccount' => 'required|string',
        ]);

    	if ($validator->passes()){
    		Auth::user()->firstName = $request->firstName;
    		Auth::user()->name = $request->name;
    		Auth::user()->adres = $request->adres;
    		Auth::user()->email = $request->email;
    		Auth::user()->idCardNumber = $request->idCardNumber;
    		Auth::user()->bankaccount = $request->bankaccount;
    		Auth::user()->save();

    		return Redirect::back(); 
    	} else{
    		return Redirect::back()->withErrors($validator);
    	}
    }
	
	public function editPasswordUser(Request $request){
		$validator = Validator::make($request->all(), [
            'password' => 'required|string|min:6|confirmed',
        ]);

        if ($validator->passes()){
    		Auth::user()->password = bcrypt($data['password']);
    		Auth::user()->save();

    		return Redirect::back();
    	} else{
    		return Redirect::back()->withErrors($validator);
    	}
	}

}