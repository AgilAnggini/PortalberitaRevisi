@extends('template/app')
@section('title','Portal Berita | Logo')
@section('logo', 'active')
@section('pengaturan', 'show')
@section('pengaturan-active', 'active')

@section('content')
{!! session('sukses') !!}
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Logo</h1>

    <a href="/logo/{{$logo->id}}/edit" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i> Edit Logo</a>

    <div class="card mt-4">
    <img src="/upload/logo/{{$logo->gambar}}"  height="200px" width="200px" class="card-img-top" alt="...">
    </div>
@endsection