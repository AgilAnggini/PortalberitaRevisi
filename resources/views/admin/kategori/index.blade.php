@extends('template/app')
@section('title','Portal Berita | Kategori')
@section('kategori', 'active')
@section('main', 'show')
@section('main-active', 'active')

@section('content')
{!! session('sukses') !!}

 <!-- Page Heading -->
 <h1 class="h3 mb-4 text-gray-800">KATEGORI</h1>
 <a href="{{route  ('kategori.create') }}" class="btn btn-success btn-sm" ><i class="fas fa-plus"></i> &nbsp Tambah Kategori</a>

 @if ($kategori[0])
 <table class="table mt-4 table-hover table-white table-bordered text-center">
            <thead>
                <tr>
                <th scope="col">No</th>
                <th scope="col">Nama</th>
                <th scope="col">Slug</th>
                <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($kategori as $row)
                    <tr>
                    <th scope="row">{{$loop->iteration}}</th>
                    <td>{{$row->nama}}</td>
                    <td>{{$row->slug}}</td>
                    <td width="20%">
                        <div class="btn-group" role="group" aria-label="Basic example">
                        <a href="/kategori/{{$row->id}}/edit" class="btn btn-primary btn-sm mr-1"><i class="fas fa-edit"></i> Edit</a>
                        <form action="/kategori/{{$row->id}}" method="post">
                            @method('DELETE')
                            @csrf
                            <button type="submit" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i> Hapus</button>
                        </form>
                        </div>
                    </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="pagination justify-content-center">
        {{$kategori->links()}}
</div>
        @else
        <div class="alert alert-info mt-4 text-center" role="alert">
                Anda belum mempunyai data
        </div>
        @endif
@endsection