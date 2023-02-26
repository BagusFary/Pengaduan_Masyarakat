@extends('layouts.template')

@section('title', 'Ubah Masyarakat')

@section('container')

      

    <div class="container col-md-4">
        <h2>Ubah Data Masyarakat</h2>
        <form action="/update-pengaduan/{{ $masyarakat->id_pengaduan }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('put')
            <div class="mb-3">
                <label for="nik" class="form-label">NIK</label>
                <input type="number" name="nik" class="form-control" id="nik" value="{{ $masyarakat->nik }}">
            </div>
            <div class="mb-3">
                <label for="nama" class="form-label">Nama</label>
                <input type="text" name="nama" class="form-control" id="nama" value="{{ $masyarakat->nama }}" >
            </div>
              <div class="mb-3">
                <label for="telp" class="form-label">Telepon</label>
                <input type="text" name="telp" class="form-control" id="telp" value="{{ $masyarakat->telp }}" >
              </div>
              <div class="mb-4">
                <label for="level" class="form-label">Level</label>
                <select class="form-select" name="level" aria-label="Default select example" >
                    <option value="{{ $masyarakat->level }}" selected>{{ $masyarakat->level }}</option>
                    <option value="0" >0</option>
                    <option value="Proses">Proses</option>
                    <option value="Selesai">Selesai</option>
                  </select>
            </div>
            <div class="mb-5">
                <button type="submit" name="submit" class="btn btn-warning">Simpan Masyarakat</button>
                <a href="/list-masyarakat" class="btn btn-danger">Kembali</a>
            </div>
        </form>
    </div>

@endsection