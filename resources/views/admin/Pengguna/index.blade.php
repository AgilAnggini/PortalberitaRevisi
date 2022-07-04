@extends('template/app')
@section('title','Portal Berita | Data Admin')
@section('pengguna', 'active')
@section('pengaturan', 'show')
@section('pengaturan-active', 'active')

@section('content')
{!! session('sukses') !!}

 <!-- Page Heading -->


 <h1 class="h3 mb-4 text-gray-800"> DATA ADMIN</h1>
 <a href="{{route  ('pengguna.create') }}" class="btn btn-success btn-sm" ><i class="fas fa-plus"></i> &nbsp Tambah Admin</a>
 <div class="container mt-4 shadow p-3 mb-5 bg-white rounded">
 @if ($pengguna[0])
 <table class="table mt-4 table-hover table-white table-bordered text-center">
            <thead>
                <tr>
                <th scope="col">No</th>
                <th scope="col">Nama</th>
                <th scope="col">Username</th>
                <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pengguna as $row)
                    <tr> 
                    <th scope="row">{{$loop->iteration}}</th>
                    <td>{{$row->name}}</td>
                    <td>{{$row->email}}</td>
                    <td width="20%">
                        <div class="btn-group" role="group" aria-label="Basic example">
                        <a href="/pengguna/{{$row->id}}/edit" class="btn btn-primary btn-sm mr-1"><i class="fas fa-edit"></i> Edit</a>
                        <form action="/pengguna/{{$row->id}}" method="post">
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
        {{$pengguna->links()}}
</div>
        @else
        <div class="alert alert-info mt-4 text-center" role="alert">
                Anda belum mempunyai data
        </div>
        @endif
</div>
@endsection