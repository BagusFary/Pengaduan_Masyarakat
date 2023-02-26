<?php

namespace App\Http\Controllers;

use App\Models\Masyarakat;
use Illuminate\Http\Request;

class MasyarakatController extends Controller
{
    public function index(){
        $masyarakat = Masyarakat::get();
        return view('list-masyarakat', ['masyarakat' => $masyarakat]);
    }

    public function create(){
        return view('tambah-masyarakat');
    }

    public function edit($id){
        $masyarakat = Masyarakat::findOrFail($id);
        return view('edit-masyarakat', ['masyarakat' => $masyarakat]);
    }
}
