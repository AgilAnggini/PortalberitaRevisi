@extends('template/app')
@section('title','Portal Berita | Artikel Berita')
@section('post', 'active')
@section('main', 'show')
@section('main-active', 'active')

@section('content')
{!! session('sukses') !!}

 <!-- Page Heading -->
 <h1 class="h3 mb-4 text-gray-800">POST BERITA</h1>
 <a href="{{route  ('post.create') }}" class="btn btn-success btn-sm" ><i class="fas fa-plus"></i> &nbsp Tambah Post</a>

 @if ($post[0])
            <table class="table mt-4 table-hover table-white table-bordered text-center">
            <thead>
                <tr>
                <th scope="col">No</th>
                <th scope="col">Sampul</th>
                <th scope="col">Judul</th>
                <th scope="col">Kategori</th>
                <th scope="col">Tag</th>
                <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($post as $row)
                    <tr>
                    <th scope="row">{{$loop->iteration}}</th>
                    <td><img src="/upload/post/{{$row->sampul}}" alt="" width="80px" height="80px"></td>
                    <td>{{$row->judul}}</td>
                    <td>{{$row->kategori->nama}}</td>
                    <td>
                       @forelse ($row->tag as $tag)
                           <span class="badge badge-success">{{$tag->nama}}</span>
                       @empty
                       <span class="badge badge-info"> Artikel ini tidak memiliki tag</span>
                           @endforelse
                    </td>
                    <td width="20%">
                        <div class="btn-group" role="group" aria-label="Basic example">
                        <a href="/post/{{$row->id}}/edit" class="btn btn-primary btn-sm mr-1"><i class="fas fa-edit"></i> Edit</a>
                        <form action="/post/{{$row->id}}" method="post">
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
        {{$post->links()}}
        @else
        <div class="alert alert-info mt-4 text-center" role="alert">
                Anda belum mempunyai data
        </div>
        @endif

@endsection

