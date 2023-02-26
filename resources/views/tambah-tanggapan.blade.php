@extends('layouts.template')

@section('title', 'Tambah Tanggapan')

@section('container')

    <div class="container col-md-4">
        <h2>Tambah Data Tanggapan</h2>
        <form action="/store-tanggapan" method="post" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="id_pengaduan" class="form-label">ID Pengaduan</label>
                <input type="number" name="id_pengaduan" class="form-control" id="id_pengaduan" required>
            </div>
            <div class="mb-3">
                <label for="tgl_tanggapan" class="form-label">Tanggal Tanggapan</label>
                <input type="text" name="tgl_tanggapan" class="form-control" id="tgl_tanggapan" required>
            </div>
              <div class="mb-3">
                <label for="tanggapan" class="form-label">Isi Laporan</label>
                <textarea class="form-control" name="tanggapan" id="tanggapan" rows="3" required></textarea>
              </div>
            <div class="mb-5">
                <button type="submit" name="submit" class="btn btn-success">Tambah Pengaduan</button>
                <a href="/list-pengaduan" class="btn btn-danger">Kembali</a>
            </div>
        </form>
    </div>

@endsection