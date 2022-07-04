@extends('template/app')
@section('title','Portal Berita | Edit Data Admin')
@section('pengguna', 'active')
@section('main', 'show')
@section('main-active', 'active')

@section('content')

 <!-- Page Heading -->
 <h1 class="h3 mb-4 text-gray-800">EDIT DATA Admin - {{ $pengguna -> name }}</h1>
 <a href="{{route  ('pengguna.index') }}" class="btn btn-secondary btn-sm mb-4" ><i class="fas fa-undo"></i> &nbsp Kembali</a>

 <form action="/pengguna/{{$pengguna->id}}" method="POST">
        @csrf
        @method('PATCH')
        <div class="form-group col-md-8">
            <label for="name">Nama</label>
            <input type="text" class="form-control" id="name" name="name" value="{{$pengguna->name}}">
            @error('nama')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group col-md-8">
            <label for="name">username</label>
            <input type="text" class="form-control" id="email" name="email" value="{{$pengguna->email}}">
            @error('nama')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary btn-sm btn-block col-md-8" style="padding:8px; border-radius:20px;"> Simpan Data Admin</button>
    </form>

@endsection