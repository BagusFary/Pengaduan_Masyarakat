 @extends('layouts.template')

@section('title', 'List Masyarakat')

@section('container')

    <h1 class="mt-4">List Masyarakat</h1>
    <div class="d-flex justify-content-end my-2">
        <a href="/tambah-masyarakat" class="btn btn-outline-success">Tambah Masyarakat</a>
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
                <th>NIK</th>
                <th>Nama</th>
                <th>Username</th>
                <th>Telepon</th>
                <th>Level</th>
                <th>Aksi</th>
            </tr>
            @foreach ($masyarakat as $item)
            <tr>
                <td>{{ $item->nik }}</td>
                <td>{{ $item->nama }}</td>
                <td>{{ $item->username }}</td>
                <td>{{ $item->telp }}</td>
                <td>{{ $item->level }}</td>
                <td>
                    <div class="my-3">
                        <a href="/edit-masyarakat/{{ $item->nik }}" class="btn btn-warning">Edit</a>
                    </div>
                    
                    <form action="/destroy-masyarakat/{{ $item->nik }}" method="post">
                        @csrf
                        @method('delete')
                           <button type="submit" onclick="return confirm('Apakah Anda yakin?')" class="btn btn-danger">Delete</button>
                    </form>
                    
                </td>
            </tr>
            @endforeach
        </table>


@endsection