<?php

namespace App\Http\Controllers;

use App\Models\Pengaduan;
use App\Models\Masyarakat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class PengaduanController extends Controller
{
    public function index(){
        $data = Pengaduan::get();
        return view('list-pengaduan', ['listdata' => $data]);
    }

    public function lihatPengaduan($id){

        $data = Pengaduan::with('tanggapan')->findOrFail($id);
        return view('lihat-pengaduan', ['data' => $data]);
    }

    public function create(){
        $nik = Masyarakat::select('nik', 'nama')->get();
        return view('tambah-pengaduan', ['nik' => $nik]);
    }

    public function store(Request $request){

        $extension = $request->file('foto')->getClientOriginalExtension();
        $namaFoto = $request->nik.'-'.now()->timestamp.'.'.$extension;
        $request->file('foto')->storeAs('foto', $namaFoto);
        
        
    
        $pengaduan = Pengaduan::create([
            'tgl_pengaduan' => $request->tgl_pengaduan,
            'nik' => $request->nik,
            'isi_laporan' => $request->isi_laporan,
            'foto' => $namaFoto,
            'status' => $request->status
        ]);

        if($pengaduan) {
            Session::flash('message', 'Pengaduan Berhasil!');
        } else {
            Session::flash('message', 'Tambah Pengaduan Gagal');
        }

        return redirect('/list-pengaduan');

    }

    public function edit($id){

        $pengaduan = Pengaduan::findOrFail($id);
        return view('edit-pengaduan', ['data' => $pengaduan]);

    }


    public function update(Request $request, $id){
        
    
        if($request->file('foto')){

            $extension = $request->file('foto')->getClientOriginalExtension();
            $namaFoto = $request->nik.'-'.now()->timestamp.'.'.$extension;
            $request->file('foto')->storeAs('foto', $namaFoto);
        
            $updatePengaduan = Pengaduan::findOrFail($id);
            Storage::delete('foto/' .$updatePengaduan->foto);
            $updatePengaduan->update([
                'tgl_pengaduan' => $request->tgl_pengaduan,
                'isi_laporan' => $request->isi_laporan,
                'foto' => $namaFoto,
                'status' => $request->status
            ]);
        }
        
        $updatePengaduan = Pengaduan::findOrFail($id);
        $updatePengaduan->update([
            'tgl_pengaduan' => $request->tgl_pengaduan,
            'isi_laporan' => $request->isi_laporan,
            'status' => $request->status
        ]);

        if($updatePengaduan){
            Session::flash('message', 'Ubah Pengaduan Disimpan');
        } else {
            Session::flash('message', 'Ubah Pengaduan Gagal');
        }
        
        return redirect('/list-pengaduan');
    }


    public function destroy($id){
        $pengaduan = Pengaduan::findOrFail($id);
        Storage::delete('foto/' .$pengaduan->foto);
        $pengaduan->delete();
            
        if($pengaduan){
            Session::flash('message', 'Hapus Pengaduan Sukses');
        } else {
            Session::flash('message', 'Hapus Pengaduan Gagal');
        }

        return redirect('/list-pengaduan');
    }
}
