<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function login(){
        return view("login");
    }
    public function signup(){
        return view("signup");
    }
    //signup
    public function signupCheck(Request $request){
        $incomingFields = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'confirm_password' => 'required'
        ]);
        $incomingFields["password"] = bcrypt($incomingFields["password"]);
        $user = User::create($incomingFields);
        Auth::login($user);
        return redirect('/');
    }
    
    public function loginCheck(Request $request){
        $incomingFields = $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        if(Auth::attempt(['email' => $incomingFields['email'], 'password' => $incomingFields['password']])){
            $request->session()->regenerate();
            return redirect('/');
        }

        return redirect('/login');
    }

    public function logout(){
        Auth::logout();
        return redirect('/');
    }

}
