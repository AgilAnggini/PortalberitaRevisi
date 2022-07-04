@extends('artikel.template.app')
@section('title','Portal Berita | Tentang Kami')
@section('tentang', 'active')
<head>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Righteous&display=swap" rel="stylesheet">
            <style> 
            .about{
                background-size: 100%;
                background-color: #1CC88A;
                overflow: hidden;
                padding: 100px 0;
                font-family: 'Righteous', cursive;
                letter-spacing: 1px;
            }
            .inner-section{
                width: 100%;
                float: right;
                background-color: #fdfdfd;
                padding: 150px;
                box-shadow: 10px 10px 8px rgba(0,0,0,0.3);
            }
            .inner-section h1{
                margin-bottom: 30px;
                font-size: 30px;
                font-weight: 900;
                text-align: center;
            }
            .text{
                font-size: 13px;
                color: #545454;
                line-height: 30px;
                text-align: justify;
                margin-bottom: 40px;
            }
            .skills button{
                font-size: 22px;
                letter-spacing: 2px;
                border: none;
                border-radius: 20px;
                padding: 8px;
                width: 200px;
                background-color: #1CC88A;
                color: white;
                cursor: pointer;
            }
            .skills button:hover{
                transition: 1s;
                background-color: #ecf5f5;
                color: #28a745;
            }
            body{
                animation: animasi 2s ease-in;
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
            @media screen and (max-width:1200px){
                .inner-section{
                    padding: 80px;
                }
            }
            @media screen and (max-width:1000px){
                .about{
                    background-size: 100%;
                    padding: 100px 40px;
                }
                .inner-section{
                    width: 100%;
                }
            }

            @media screen and (max-width:600px){
                .about{
                    padding: 0;
                }
                .inner-section{
                    padding: 60px;
                }
                .skills button{
                    font-size: 19px;
                    padding: 5px;
                    width: 160px;
                }
            }
                </style>
            </head>
<body>
    

@section ('content')

    <div class="card mt-4 mb-4 shadow-sm ">    
        <div class="about">
        <div class="inner-section shadow-sm">
            <h1>About </h1>
            <p class="text">
                Sekolah Ekspor merupakan wadah untuk eksportir baru memulai usaha dan pengembangan produk Indonesia. 
                Melalu platform ini kami menyediakan berbagai informasi terkait Ekspor Indonesia. 
                Menyediakan sarana berbagi pengetahuan dan pengalaman di pasar lokal dan global yang berorientasi pada pengembangan ekspor</p>
            <p class="text">
                Bersama Mitra Digital Sekolah Ekspor, Mari menembus Pasar Internasional</p>
            </p>
            <div class="skills text-center">
                <button><a href="/artikel-tim" style="color:black ;">Our Team</a></button>
            </div>
        </div>
    </div>
        </div>
@endsection

</body>