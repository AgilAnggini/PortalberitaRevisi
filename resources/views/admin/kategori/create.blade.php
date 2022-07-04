@extends('template/app')
@section('title','Portal Berita | Kategori')
@section('kategori', 'active')
@section('main', 'show')
@section('main-active', 'active')

@section('content')

 <!-- Page Heading -->
 <h1 class="h3 mb-4 text-gray-800">TAMBAH DATA KATEGORI</h1>
 <a href="{{route  ('kategori.index') }}" class="btn btn-secondary btn-sm mb-4" ><i class="fas fa-undo"></i> &nbsp Kembali</a>

 <form action="/kategori" method="POST">
        @csrf
        <div class="form-group">
            <label for="nama">Nama Kategori</label>
            <input type="text" class="form-control" id="nama" name="nama">
            @error('nama')
                <P class="text-danger mt-2">{{ $message }}</P>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary btn-sm btn-block">Tambah Kategori </button>
    </form>

@endsection