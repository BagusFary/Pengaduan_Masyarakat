<?php

namespace App\Http\Controllers;

use App\Models\Tanggapan;
use Illuminate\Http\Request;

class TanggapanController extends Controller
{
    public function index(){
        $tanggapan = Tanggapan::get();
        return view('list-tanggapan', ['tanggapan' => $tanggapan]);
    }
    

}
