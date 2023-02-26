@extends('layouts.template')

@section('title', 'Tambah Pengaduan')

@section('container')

    <div class="container col-md-4">
        <h2>Tambah Data Pengaduan</h2>
        <form action="/store-pengaduan" method="post" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="tgl_pengaduan" class="form-label">Tanggal Pengaduan</label>
                <input type="date" name="tgl_pengaduan" class="form-control" id="tgl_pengaduan" required>
            </div>
            {{-- <div class="mb-3">
                <label for="nik" class="form-label">NIK</label>
                <select class="form-select" name="nik" required>
                    <option value="" selected ></option>
                    @foreach ($nik as $n)
                    <option value="{{ $n->nik }}">{{ $n->nik }} - {{ $n->nama }}</option>
                    @endforeach
                  </select>
            </div> --}}

            <div class="mb-3">
                <label for="nik" class="form-label">NIK</label>
                <input type="hidden" name="nik" value="{{ Auth::user()->id }}">
                <input type="text" name="nik" id="nik" class="form-control" value="{{ Auth::user()->id }}" disabled>
            </div>
              <div class="mb-3">
                <label for="isi_laporan" class="form-label">Isi Laporan</label>
                <textarea class="form-control" name="isi_laporan" id="isi_laporan" rows="3" required></textarea>
              </div>
              <div class="mb-3">
                <label for="foto" class="form-label">Foto</label>
                <input type="file" name="foto" class="form-control" id="foto" required>
            </div>
            <div class="mb-4">
                <label for="status" class="form-label">Status</label>
                <select class="form-select" name="status" aria-label="Default select example" required>
                    <option value="0" selected >0</option>
                    <option value="Proses">Proses</option>
                    <option value="Selesai">Selesai</option>
                  </select>
            </div>
            <div class="mb-5">
                <button type="submit" name="submit" class="btn btn-success">Tambah Pengaduan</button>
                <a href="/list-pengaduan" class="btn btn-danger">Kembali</a>
            </div>
        </form>
    </div>

@endsection