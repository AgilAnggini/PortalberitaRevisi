@extends('template/app')
@section('title','Portal Berita | Banner')
@section('banner', 'active')
@section('main', 'show')
@section('main-active', 'active')

@section('content')
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Banner</h1>
    <a href="{{route  ('banner.index') }}" class="btn btn-secondary btn-sm mb-4" ><i class="fas fa-undo"></i> &nbsp Kembali</a>

    <form action="/banner" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="judul">Judul</label>
            <input type="text" class="form-control" id="judul" name="judul" value="{{old('judul')}}">
            @error('judul')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group">
            <label for="sampul">Sampul</label>
            <input type="file" class="form-control" id="sampul" name="sampul">
            <i class="text-danger">Rekomendasi : (max-height(850px), max-width(350px))</i>
            @error('sampul')
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

@section('ck-editor')
     @include('ckeditor/setting')
@endsection