<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

use App\Models\User;

class LoginController extends Controller
{
    public function register(Request $request){
    	$validated = $request->validate([
    		'name'=>'required|max:50|min:8|unique:users',
    		'email'=>'required|unique:users|email:dns',
    		'password'=>'required|min:8',
    		'noreg'=>'required|numeric'
    	]);
    	$status = '';
    	$validated['password'] = Hash::make($validated['password']);
    	if($validated['noreg']!='20200346'){
    		$status = 'murid';
    	}else{
    		$status = 'Guru';
    	}
    	unset($validated['noreg']);
    	$validated['status']=$status;

    	User::create($validated);
    	return redirect('/login');
    }
    public function authenticate(Request $request){
    	$validated = $request->validate([
    		'email'=>'required|email:dns',
    		'password'=>'required'
    	]);
    	if(Auth::attempt($validated)){
    		$request->session()->regenerate();
    		return redirect()->intended('/');
    	}
    	return back();
    }
    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return back();
    }
}
