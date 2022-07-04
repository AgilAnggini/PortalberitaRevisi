@extends('template/app')
@section('title','Portal Berita | Dashboard')
@section('dashboard', 'active')

@section('content')

    <h1 class="h3 mb-4 text-gray-800">Dashboard</h1>

    <div class="row">

    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
            <div class="col mr-2">
                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Jumlah Post</div>
                <div class="h5 mb-0 font-weight-bold text-gray-800">{{$jumlah_post}}</div>
            </div>
            <div class="col-auto">
                <i class="fas fa-file fa-2x text-gray-300"></i>
            </div>
            </div>
        </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
            <div class="col mr-2">
                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Jumlah Kategori</div>
                <div class="h5 mb-0 font-weight-bold text-gray-800">{{$jumlah_kategori}}</div>
            </div>
            <div class="col-auto">
                <i class="fas fa-tag fa-2x text-gray-300"></i>
            </div>
            </div>
        </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-info shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
            <div class="col mr-2">
                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Jumlah Tag</div>
                <div class="row no-gutters align-items-center">
                <div class="col-auto">
                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{$jumlah_tag}}</div>
                </div>
                </div>
            </div>
            <div class="col-auto">
                <i class="fas fa-tags fa-2x text-gray-300"></i>
            </div>
            </div>
        </div>
        </div>
    </div>


    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-warning shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
            <div class="col mr-2">
                <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Jumlah User</div>
                <div class="h5 mb-0 font-weight-bold text-gray-800">{{$jumlah_user}}</div>
            </div>
            <div class="col-auto">
                <i class="fas fa-user fa-2x text-gray-300"></i>
            </div>
            </div>
        </div>
        </div>
    </div>

    </div>

    <div class = "row gx-1">
        <div class="col ">
        <div class="card-header">
        <h6 class="m-0 font-weight-bold text-primary text-center">Artikel Hari Ini</h6>
        </div>
        <div class="card-body shadow-sm border-bottom-primary">
           @if ($post->count() >= 1)
                <table class="table table-hover table-bordered">
                    <thead class="text-center">
                        <tr>
                        <th scope="col">No</th>
                        <th scope="col">Sampul</th>
                        <th scope="col">Judul</th>
                        <th scope="col">Kategori</th>
                        <th scope="col">Tag</th>
                        <th scope="col">Pengguna</th>
                        </tr>
                    </thead>
                    <tbody class="text-center">
                        @foreach ($post as $row)
                            <tr>
                            <th scope="row">{{$loop->iteration}}</th>
                            <td><img src="/upload/post/{{$row->sampul}}" alt="" width="80px" height="80px"></td>
                            <td>{{$row->judul}}</td>
                            <td>{{$row->kategori->nama}}</td>
                            <td>
                            @foreach ($row->tag as $post_tag)
                                <span class="badge badge-info">{{$post_tag->nama}}</span>
                            @endforeach
                            </td>
                            <td>{{$row->user->name}}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
           @else
                <div class="alert alert-info text-center" role="alert">
               Anda tidak memiliki post terbaru hari ini
                </div>
           @endif
        </div>
        </div>

        <div class="col ">
        <div class="card-header">
        <h6 class="m-0 font-weight-bold text-danger text-center">Banner Hari Ini</h6>
        </div>
        <div class="card-body shadow-sm border-bottom-danger">
           @if ($banner->count() >= 1)
                <table class="table table-hover table-bordered">
                    <thead class="text-center">
                        <tr>
                        <th scope="col">No</th>
                        <th scope="col">Sampul</th>
                        <th scope="col">Banner</th>
                        <th scope="col">Slug</th>
                        </tr>
                    </thead>
                    <tbody class="text-center">
                        @foreach ($banner as $row)
                            <tr>
                            <th scope="row">{{$loop->iteration}}</th>
                            <td><img src="/upload/banner/{{$row->sampul}}" width="80px" height="80px" alt=""></td>
                            <td>{{$row->judul}}</td>
                            <td>{{$row->slug}}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
           @else
                <div class="alert alert-danger" role="alert">
               Anda tidak memiliki banner terbaru hari ini
                </div>
           @endif
        </div>
        </div>
    </div>

@endsection
