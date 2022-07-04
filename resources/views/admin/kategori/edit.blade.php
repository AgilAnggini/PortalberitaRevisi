@extends('template/app')
@section('title','Portal Berita | Kategori')
@section('kategori', 'active')
@section('main', 'show')
@section('main-active', 'active')

@section('content')

 <!-- Page Heading -->
 <h1 class="h3 mb-4 text-gray-800">EDIT DATA KATEGORI - {{ $kategori -> nama }}</h1>
 <a href="{{route  ('kategori.index') }}" class="btn btn-secondary btn-sm mb-4" ><i class="fas fa-undo"></i> &nbsp Kembali</a>

 <form action="/kategori/{{$kategori->id}}" method="POST">
        @csrf
        @method('PATCH')
        <div class="form-group">
            <label for="nama">Kategori</label>
            <input type="text" class="form-control" id="nama" name="nama" value="{{$kategori->nama}}">
            @error('nama')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary btn-sm btn-block">Edit Data Kategori </button>
    </form>

@endsection