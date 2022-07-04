<head>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Righteous&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
    <style>
        body{
            animation: animasi 2s ease-in;
            font-family: 'Righteous', cursive;
        }
        body h2, .carik{
            font-family: 'Righteous', cursive;
        }

        .bann:hover{
            opacity: .9;
        }
        .bann {
            background: linear-gradient(to bottom, rgba(0, 0, 0, .1),rgba(0, 0, 0, .3),rgba(0, 0, 0, .5),rgba(0, 0, 0, .8),rgba(0, 0, 0, 1));
            position: absolute;
            top: 0%;
            bottom: 0px;
            left: 0px;
            right: 0px;
            padding: 20px;
        }
        .bann .jdl {
            position: absolute;
            top: 55%;
            bottom: 0px;
            left: 0px;
            right: 0px;
            padding: 20px;
        }
        .bann .jdl h2:hover{
            text-decoration: underline;
        }

        .kotak:hover{
            opacity: .5;
            transition: 1s ease;
        }
        .kotak h5,p{
            font-family: 'Righteous', cursive;
            color: black;
            letter-spacing: 1px;
        }
        .tanya{
            position: fixed;
            top: 70%;
            right: 5%;
            z-index: 999;
        }
        .tanya img:hover{
            transition: 1s ease;
            transform: translateY(-35%);
        }
        @keyFrames animasi{
            0%{
                opacity: 0;
            }
            100%{
                opacity: 1;
            }
        }
        
        
        @media(max-width: 700px){
            .bann .jdl h2{
                font-size: 0.7rem;
                text-align: center;
              
            }
            
            .bann .jdl{
                padding: 15px;
            }
         
        }
    </style>

</head>
<body>

@extends('artikel.template.app')

@isset($tag_dipilih)
     @section('title')
        Tag : {{$tag_dipilih->nama}}
    @endsection
    @section('tag', 'active')
@endisset

@isset($kategori_dipilih)
    @section('title')
        Kategori : {{$kategori_dipilih->nama}}
    @endsection
    @section('{{$kategori_dipilih->nama}', 'active')
@endisset  

@isset($home)
    @section('title', 'ADE | Portal Berita')
    @section('home', 'active')
@endisset


@section ('content')
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">

            @foreach ($banner as $row)
            <li data-target="#carouselExampleIndicators" data-slide-to="{{$loop->index}}" class="{{($loop->first) ? 'active' : ''}}"></li>
            @endforeach

        </ol>
    
    <div class="carousel-inner bann">
        @forelse ($banner as $row)
            <div class="carousel-item {{($loop->first) ? 'active' : ''}}">
                <a href ="/artikel-banner/{{$row->slug}}">
                    <img src="/upload/banner/{{$row->sampul}}" height="400xp" width="400xp" class="mx-auto d-block img-fluid"   alt="...">
                    <div class="carousel-caption jdl">
                        <h2>{{$row->judul}}</h2>
                    </div>
            </div>
            @empty
            <div class="alert alert-info mt-4 text-center" role="alert">
                Anda belum membuat berita banner
            </div>
        @endforelse
    </div>


        <a class="carousel-control-prev" type="button" data-target="#carouselExampleIndicators" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" type="button" data-target="#carouselExampleIndicators" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>

        <h2 class="my-4 text-center text-black">@yield('title')</h2>
        <div class="row justify-content-center mb-3">
        <div class="col-md-6">
            <form  method="GET" action="{{url()->full()}}">
                <div class="input-group">  
                <input type="search" class="form-control carik" placeholder="Masukkan inputan..." name="search" value="{{$search}}">
                <button class="btn btn-success bi bi-search" type="submit"></button>
                </div>
            </form>
        </div>
        </div>
        @if (session('search'))
        <div class="row mt-4 justify-content-center text-center">
            <div class="col-md-8">
                <div class="alert alert-info" role="alert">
                {{session('search')}}
                </div>
            </div>
        </div>
    @else
    <div class="row mt-4">
            @foreach ($artikel as $row)
                    <div class="col-md-4 mt-3 kotak">
                        <div class="card shadow-sm">
                            <a href="/{{$row->slug}}"><img src="/upload/post/{{$row->sampul}}" class="card-img-top float-center" alt="..." width="200px" height="200px">
                            <div class="card-body">
                                <h5 class="card-title">{{$row->judul}}</h5>
                                <p class="card-text"><small class="text-muted">{{$row->created_at->diffForHumans()}}</small></p>
                            </div>
                            </a>
                        </div>
                    </div>
            @endforeach
        </div>
        <div class="d-flex justify-content-center mt-4">
            {{$artikel->links()}}
        </div>
        @endif
</div>
<div class="tanya">
    <a href="https://s.id/Tanya_Yuk" target="blank">
        <img src="/upload/logo/wa.png" alt="" width="50px" height="50px">
    </a>
</div>
</div>
@endsection

</body>