@extends('template/app')
@section('title','Portal Berita | Artikel Berita')
@section('post', 'active')
@section('main', 'show')
@section('main-active', 'active')

@section('content')

 <!-- Page Heading -->
 <h1 class="h3 mb-4 text-gray-800">TAMBAH DATA POST</h1>
 <a href="{{route  ('post.index') }}" class="btn btn-secondary btn-sm mb-4" ><i class="fas fa-undo"></i> &nbsp Kembali</a>

 <form action="/post" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="judul">Post</label>
            <input type="text" class="form-control" id="judul" name="judul" value="{{old('judul')}}">
            @error('judul')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="form-group">
            <label for="sampul">Sampul</label>
            <input type="file" class="form-control" id="sampul" name="sampul">
            @error('sampul')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="form-group">
            <label for="kategori">Kategori</label>
            <select class="form-control" id="kategori" name="kategori">
                <option selected disabled>Pilih Kategori</option>
                @foreach ($kategori as $row)
                    <option value="{{$row->id}}">{{$row->nama}}</option>
                @endforeach
            </select>
            @error('kategori')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="form-group">
            <label for="tag">Tag</label>
            <select multiple class="form-control" id="tag" name="tag[]">
                @foreach ($tag as $row)
                    <option value="{{$row->id}}">{{$row->nama}}</option>
                @endforeach
            </select>
            @error('tag')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="form-group">
            <label for="editor">Konten</label>
            <textarea class="form-control summernote" id="summernote" name="konten">{{old('konten')}}</textarea>
            @error('konten')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary btn-sm btn-block">Tambah</button>
    </form>
@endsection