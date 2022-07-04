<head>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Righteous&display=swap" rel="stylesheet">
    <style>
        body{
            animation: animasi 5s ease-in;
        }
        body h3{
            font-family: 'Righteous', cursive;
            letter-spacing: 1px;
        }
    </style>
</head>
<body>
    
@extends('artikel.template.app')
@section('title','Portal Berita | Artikel')

@section ('content')

    <div class="container mt-4 shadow p-3 mb-5 bg-white">
        <h3 class="card-title text-center mt-2">{{$artikel->judul}}</h3>
        
            
            <div class="card-body">
                     <div class="detail-badge my-2 text-center">
                        <span class="text-muted"><a href="/artikel-kategori/{{$artikel->kategori->slug}}">{{$artikel->kategori->nama}}</a></span>
                        |
                        <span class="text-muted"></span>
                        @foreach ($artikel->tag as $row)
                            @if ($loop->last)
                                <span class="text-muted"><a href="/artikel-tag/{{$row->slug}}" >{{$row->nama}}</a></span>
                            @else
                                <span class="text-muted"><a href="/artikel-tag/{{$row->slug}}">{{$row->nama}},</a></span>
                            @endif
                        @endforeach
                        |
                         <span class="text-muted text-center">
                            <label>{{$artikel->user->name}}</label>
                        </span>
                        |
                        <span class="text-muted">{{$artikel->created_at->diffForHumans()}}</span>
                    </div>
                    <img src="/upload/post/{{$artikel->sampul}}" height="400xp" width="400xp" class="mx-auto d-block img-fluid">
                    <hr>
                    <p class="card-text">{!!$artikel->konten!!}</p>               
            <hr>
                <!-- komentar  -->
                    <div id="disqus_thread" class="mx-4 my-4"></div>
                    <script>
                        /**
                        *  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
                        *  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables    */
                        /*
                        var disqus_config = function () {
                        this.page.url = PAGE_URL;  // Replace PAGE_URL with your page's canonical URL variable
                        this.page.identifier = PAGE_IDENTIFIER; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
                        };
                        */
                        (function() { // DON'T EDIT BELOW THIS LINE
                        var d = document, s = d.createElement('script');
                        s.src = 'https://portal-racbcxrvr5.disqus.com/embed.js';
                        s.setAttribute('data-timestamp', +new Date());
                        (d.head || d.body).appendChild(s);
                        })();
                    </script>
                    <noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
                </div>
        </div>
@endsection

</body>