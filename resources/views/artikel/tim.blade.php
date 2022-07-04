@extends('artikel.template.app')
@section('title','Portal Berita | Tentang Kami')
@section('tentang', 'active')
<head>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
     <link href="https://fonts.googleapis.com/css2?family=Righteous&display=swap" rel="stylesheet">
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
            <style> 
                body
                {
                    animation: animasi 2s ease-in;
                    font-family: 'Righteous', cursive;
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
                    .team-section{
                        background-color:#1CC88A;
                        min-height: 100vh;
                        padding:70px 15px 30px;
                        font-family: 'Righteous', cursive;
                        letter-spacing: 2px;
                    }

                    .container{
                        max-width: 1170px;
                        margin:auto;
                        margin-top: 20px;
                    }

                    .row{
                        display: flex;
                        flex-wrap: wrap;
                    }

                    .team-section .section-title{
                        flex-basis: 100%;
                        max-width: 100%;
                        margin-bottom: 70px;
                    }

                    .team-section .section-title h1{
                        font-size: 40px;
                        text-align: center;
                        margin:0;
                        color: #ffffff;
                        font-weight: 700;
                    }

                    .team-section .section-title p{
                        font-size:16px;
                        text-align: center;
                        margin:15px 0 0;
                        color:#ffffff;
                    }
                    .team-section .team-items{
                        
                        flex-basis: 100%;
                        max-width: 100%;
                        display: flex;
                        flex-wrap: wrap;
                        justify-content: space-around;
                    }
                    .team-section .team-items .item{
                        flex-basis: calc(25% - 30px);
                        max-width: calc(25% - 30px);
                        transition: all .5s ease;
                        margin-bottom: 40px;
                    }
                    .team-section .team-items .item img{
                        display: block;
                        width: 100%;
                        border-radius: 8px;
                    }

                    .team-section .team-items .item .inner{
                        position: relative;
                        z-index: 11;
                        padding:0 15px;
                    }
                    .team-section .team-items .item .inner .info{
                        background-color:#28a745;
                        text-align: center;
                        padding: 20px 15px;
                        border-radius:8px;
                        transition: all .5s ease;
                        margin-top: -40px;
                    }
                    .team-section .team-items .item:hover  .info{
                        transform: translateY(-20px);
                    }
                    .team-section .team-items .item:hover{
                        transform: translateY(-10px);	
                    }
                    .team-section .team-items .item .inner .info h5{
                        margin:0;
                        font-size: 18px;
                        font-weight: 600;
                        color:#ffffff;
                    }
                    .team-section .team-items .item .inner .info p{
                        font-size: 16px;
                        font-weight: 400;
                        color:#c5c5c5;
                        margin:10px 0 0;
                    }

                    .team-section .team-items .item .inner .info .social-links{
                        padding-top: 15px;
                    }

                    .team-section .team-items .item .inner .info .social-links a{
                        display: inline-block;
                        height: 32px;
                        width: 32px;
                        color:#009688;
                        border-radius: 50%;
                        margin:auto;
                        text-align: center;
                        line-height: 32px;
                        font-size:48px;
                        transition: all .5s ease;
                    }


                    /*responsive*/
                    @media(max-width: 991px){
                        .team-section .team-items .item{
                        flex-basis: calc(50% - 30px);
                        max-width: calc(50% - 30px);

                    }
                    }

                    @media(max-width: 767px){
                        .team-section .team-items .item{
                        flex-basis: calc(100%);
                        max-width: calc(100%);

                    }
                    }

                </style>
            </head>

@section ('content')

<section class="team-section">
     <div class="container">
         <div class="row">
             <div class="section-title">
                 <h1>Our Team</h1>
                 <p>Kami dari Mahasiswa/i Kampus Merdeka Studi Independen Mitra Sekolah Ekspor </p>
             </div>
         </div>
         <div class="row">
             <div class="team-items">
                  <div class="item">
                      <img src="\upload\tim\team1.jpeg" alt="team" />
                      <div class="inner">
                          <div class="info">
                               <h5>Yohana Fransisca</h5>
                               <p>Product Owner | FE</p>
                               <p>Universitas Sumatera Utara</p>
                               <div class="social-links">
                                   <a href="https://www.instagram.com/fransiscayohana6/"><img src="\upload\logo\ig.png" alt="product-owner"></a>
                               </div>
                          </div>
                      </div>
                  </div>
                  <div class="item">
                      <img src="\upload\tim\team2.jpeg" alt="team" />
                      <div class="inner">
                          <div class="info">
                               <h5>Agil Anggini</h5>
                               <p>Web Development | BE</p>
                               <p>Universitas Mulawarman Samarinda </p>
                               <div class="social-links">
                                   <a href="https://www.instagram.com/agilanggini.19/"><img src="\upload\logo\ig.png" alt="back-end"></a>
                               </div>
                          </div>
                      </div>
                  </div>
                  <div class="item">
                      <img src="\upload\tim\team3.jpeg" alt="team" />
                      <div class="inner">
                          <div class="info">
                               <h5>Josse Pinem</h5>
                               <p>Web Development | FE</p>
                               <p>Universitas Prima Indonesia</p>
                               <div class="social-links">
                                   <a href="https://www.instagram.com/pinemjosse/"><img src="\upload\logo\ig.png" alt="front-end"></a>   
                               </div>
                          </div>
                      </div>
                  </div>
                  <div class="item">
                      <img src="\upload\tim\team4.jpeg" alt="team" />
                      <div class="inner">
                          <div class="info">
                               <h5>Narius Wenda</h5>
                               <p>Web Development | FE</p>
                               <p>Politeknik Negeri Manado</p>
                               <div class="social-links">
                                   <a href="https://www.instagram.com/awen_gorry/"><img src="\upload\logo\ig.png" alt="front-end"></a>
                               </div>
                          </div>
                      </div>
                  </div>
             </div>
         </div>
     </div>
  </section>
        </div>
@endsection

