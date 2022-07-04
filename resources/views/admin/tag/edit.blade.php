@extends('template/app')
@section('title','Portal Berita | Tag')
@section('tag', 'active')
@section('main', 'show')
@section('main-active', 'active')

@section('content')

 <!-- Page Heading -->
 <h1 class="h3 mb-4 text-gray-800">EDIT DATA TAG - {{ $tag -> nama }}</h1>
 <a href="{{route  ('tag.index') }}" class="btn btn-secondary btn-sm mb-4" ><i class="fas fa-undo"></i> &nbsp Kembali</a>

 <form action="/tag/{{$tag->id}}" method="POST">
        @csrf
        @method('PATCH')
        <div class="form-group">
            <label for="nama">tag</label>
            <input type="text" class="form-control" id="nama" name="nama" value="{{$tag->nama}}">
            @error('nama')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary btn-sm btn-block"> Simpan Data Tag </button>
    </form>

@endsection