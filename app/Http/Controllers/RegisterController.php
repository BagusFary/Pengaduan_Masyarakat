<?php

namespace App\Http\Controllers;

use App\Models\Masyarakat;
use Illuminate\Http\Request;
use App\Http\Requests\RegisterRequest;
use Illuminate\Support\Facades\Session;

class RegisterController extends Controller
{
    public function index(){
        return view('register');
    }

    public function register(RegisterRequest $request){


        $dataRegister = Masyarakat::create([
            'nik' => $request->nik,
            'nama' => $request->nama,
            'username' => $request->username,
            'password' => $request->password,
            'telp' => $request->telp
        ]);

        if($dataRegister){
            Session::flash('Register-Success', 'Registrasi Berhasil!');
            return redirect('/login');
        } else {
            Session::flash('Register-Failed', 'Registrasi Gagal');
            return redirect('/register');
        }
            
    }
}
