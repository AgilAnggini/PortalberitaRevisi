@extends('template/app')
@section('title','Portal Berita | Banner')
@section('banner', 'active')
@section('main', 'show')
@section('main-active', 'active')

@section('content')
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Banner - {{ $banner -> judul }}</h1>
    <a href="{{route  ('banner.index') }}" class="btn btn-secondary btn-sm mb-4" ><i class="fas fa-undo"></i> &nbsp Kembali</a>

    <form action="/banner/{{$banner->id}}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PATCH')
        <div class="row">
            <div class="col-md-2">
                 <img src="/upload/banner/{{$banner->sampul}}" width="150px" height="150px" alt="">
            </div>
            <div class="col-md-10">
                <div class="form-group">
                    <label for="judul">Judul</label>
                    <input type="text" class="form-control" id="judul" name="judul" value="{{old('judul') ? old('judul') : $banner->judul}}">
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
            </div>
        </div>
        <div class="form-group">
            <label for="editor">Konten</label>
            <textarea class="form-control summernote" id="summernote" name="konten">{{ old('konten') ? old('konten') : $banner->konten}}</textarea>
            @error('konten')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary btn-sm btn-block">Edit</button>
    </form>
@endsection

@section('ck-editor')
     @include('ckeditor/setting')
@endsection