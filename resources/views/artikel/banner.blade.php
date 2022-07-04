<head>
    <style>
        
        <style>
        
        body{
            animation: animasi 5s ease-in;
        }
        body h3{
            font-family: 'Righteous', cursive;
            letter-spacing: 1px;
        }
        
        body small{
            font-family: 'MsoNormal';
            font-size: 18px;
        }
        @keyFrames animasi{
            0%{
                opacity: 0;
            }
            50%{
                opacity: .5;
            }
            100%{
                opacity: 1;
            }
        }
    </style>
</head>
<body>
    
@extends('artikel.template.app')
@section('title','Portal Berita | Artikel Banner')


@section('content')
   <div class="container mt-4 shadow p-3 mb-5 bg-white">
       <h3 class="card-title text-center">{{$banner->judul}}</h3>
                <p class="card-text text-center ">
                    <small class="text-muted">{{$banner->created_at->diffForHumans()}}</small>
                </p>
        <img src="/upload/banner/{{$banner->sampul}}" height="400xp" width="400xp" class="mx-auto d-block img-fluid" alt="...">
        <div class="card-body">
            
            <hr>

            <p class="card-text">{!!$banner->konten!!}</p>
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
                        <noscript>Please enable JavaScript to view the 
                            <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a>
                        </noscript>           
                </div>
            </div>
@endsection
</body>