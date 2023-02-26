<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Masyarakat;
use Illuminate\Http\Request;
use App\Http\Requests\AuthRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{

    
    public function login(){
        return view('login');
    }

    public function auth(Request $request){
        

        $login= $request->validate([
            'username' => ['required'],
            'password' => ['required'],
        ]);

        if(Auth::attempt($login)) {

            $request->session()->regenerate();
            return redirect()->intended('list-pengaduan');

        } else {
            Session::flash('login-failed', 'Username / Password Incorrect');

            return redirect('/login');
        }

        
        
            
    }

}
