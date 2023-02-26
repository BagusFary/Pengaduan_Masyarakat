@extends('layouts.template')

@section('title', 'List Pengaduan')

@section('container')

    <h1 class="mt-4">List Pengaduan</h1>
    <div class="d-flex justify-content-end my-2">
        <a href="/tambah-pengaduan" class="btn btn-success">Tambah Pengaduan</a>
    </div>

     {{-- Popup Message --}}
     @if(Session::has('message'))
        <div class="alert alert-success alert-dismissible fade show mt-2" role="alert">
            {{ Session::get('message') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>    
    @endif  
        <table class="table table-success table-striped">
            <tr>
                <th>ID Pengaduan</th>
                <th>Tanggal Pengaduan</th>
                <th>NIK</th>
                <th>Isi Laporan</th>
                <th>Foto</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
            @foreach ($listdata as $item)
            <tr>
                <td>{{ $item->id_pengaduan }}</td>
                <td>{{ $item->tgl_pengaduan }}</td>
                <td>{{ $item->nik }}</td>
                <td>{{ $item->isi_laporan }}</td>
                <td><img src="{{ asset('storage/foto/' .$item->foto) }}" alt="" width="200px"></td>            
                <td>{{ $item->status }}</td>
                <td>
                    <div class="my-3">
                        <a href="/lihat-pengaduan/{{ $item->id_pengaduan }}" class="btn btn-primary">Lihat Tanggapan</a>
                    </div>
                    <div class="my-3">
                        <a href="/edit-pengaduan/{{ $item->id_pengaduan }}" class="btn btn-warning">Ubah Pengaduan</a>
                    </div>
                    
                    <form action="/destroy-pengaduan/{{ $item->id_pengaduan }}" method="post">
                        @csrf
                        @method('delete')
                           <button type="submit" onclick="return confirm('Apakah Anda yakin?')" class="btn btn-danger">Hapus Pengaduan</button>
                    </form>
                    
                </td>
            </tr>
            @endforeach
        </table>


@endsection