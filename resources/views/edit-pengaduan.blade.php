@extends('layouts.template')

@section('title', 'Ubah Pengaduan')

@section('container')

      

    <div class="container col-md-4">
        <h2>Ubah Data Pengaduan</h2>
        <form action="/update-pengaduan/{{ $data->id_pengaduan }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('put')
            <div class="mb-3">
                <label for="tgl_pengaduan" class="form-label">Tanggal Pengaduan</label>
                <input type="date" name="tgl_pengaduan" class="form-control" id="tgl_pengaduan" value="{{ $data->tgl_pengaduan }}">
            </div>
            <div class="mb-3">
                <label for="nik" class="form-label">NIK</label>
                <input type="number" name="nik" class="form-control" id="nik" value="{{ $data->nik }}" >
            </div>
              <div class="mb-3">
                <label for="isi_laporan" class="form-label">Isi Laporan</label>
                <textarea class="form-control" name="isi_laporan" id="isi_laporan" rows="3" >{{ $data->isi_laporan }}</textarea>
              </div>
              <div class="mb-3">
                <label for="foto" class="form-label">Foto</label>
                <div class="container">
                    <img src="{{ asset('storage/foto/' .$data->foto) }}" alt="" width="200px">
                </div>
                <input type="file" name="foto" class="form-control" id="foto" value="{{ asset('storage/foto/' .$data->foto) }}">
            </div>
            <div class="mb-4">
                <label for="status" class="form-label">Status</label>
                <select class="form-select" name="status" aria-label="Default select example" >
                    <option value="{{ $data->status }}" selected>{{ $data->status }}</option>
                    <option value="0" >0</option>
                    <option value="Proses">Proses</option>
                    <option value="Selesai">Selesai</option>
                  </select>
            </div>
            <div class="mb-5">
                <button type="submit" name="submit" class="btn btn-warning">Simpan Pengaduan</button>
                <a href="/list-pengaduan" class="btn btn-danger">Kembali</a>
            </div>
        </form>
    </div>

@endsection