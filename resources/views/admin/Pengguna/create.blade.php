@extends('template/app')
@section('title','Portal Berita | pengguna')
@section('pengguna', 'active')
@section('main', 'show')
@section('main-active', 'active')

@section('content')

 <!-- Page Heading -->
 <h1 class="h3 mb-4 text-gray-800">TAMBAH DATA Pengguna</h1>
 <a href="{{route  ('pengguna.index') }}" class="btn btn-secondary btn-sm mb-4" ><i class="fas fa-undo"></i> &nbsp Kembali</a>

 <form action="/pengguna" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Nama pengguna</label>
            <input type="text" class="form-control" id="name" name="name">
            @error('nama')
                <P class="text-danger mt-2">{{ $message }}</P>
            @enderror
        </div>
        <div class="form-group">
            <label for="name">Username</label>
            <input type="text" class="form-control" id="email" name="email">
            @error('email')
                <P class="text-danger mt-2">{{ $message }}</P>
            @enderror
        </div>
        <div class="form-group">
            <label for="password">Kata Sandi</label>
            <input type="text" class="form-control" id="password" name="password">
            @error('password')
                <P class="text-danger mt-2">{{ $message }}</P>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary btn-sm btn-block">Tambah pengguna </button>
    </form>

@endsection