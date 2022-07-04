<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Righteous&display=swap" rel="stylesheet">
  <style>
      nav
      {
        background-color: #04AA6D;
        box-shadow: 0px 5px 5px;
      }
      nav 
      {
        font-family: 'Righteous', cursive;
      }
      nav li{
        color: white;
        list-style: none;
        font-size: 22px;
      }
      nav ul li{
        list-style: none;
        color: white;
        font-size: 22px;
      }
      nav  button{
        font-size: 22px;
      }
      nav  ul li a{
        color: white;
        letter-spacing: 1px;
        font-size: 22px;
      }
      nav  ul li a:hover{
        color: #0D3C55;
        cursor: pointer;
      } 
      
     ul.pagination {
        padding: 0;
        margin: 0;
      }
      .side{
        position: fixed;
        top: 0px;
        bottom: 0px;
        left: 0px;
        background-color: #042331;
        width: 230px;
        z-index: 9999;
        color: white;
        transform: translateX(-110%);
        transition: 1s ease-in;
        overflow-y: auto;
      }
      .side .head{
        font-size: 32px;
        color: white;
        padding: 35px 15px;
        font-family: 'Righteous', cursive;
        text-align: center;
      }
      .side ul li {
        list-style: none;
      }
      .side li{
        list-style: none;
      }
      .side ul li a {
        color: white;
        padding: 10px -10px;
        font-family: 'Righteous', cursive;
        letter-spacing: 1px;
        font-size: 20px;
        text-align: left;
        margin-left: -18px;
      }
      .side .geser{
        font-size: 27px;
        cursor: pointer;
      }
      .hide{
        transform: translateX(0%);
      }
      @media(max-width: 359px){
        nav .container img{
          display: none;
        }
      }
  </style>
</head>
<body>

    <nav class="navbar top-fixed navbar-expand-lg mb-5 ">
<a class="navbar-brand" href="/"><img src="/upload/logo/logo.png" width="50px" height="50px" alt="" class="mx-auto d-block"></a><li>Portal Berita</li>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="bi bi-menu-button-wide text-white"></span>
  </button> 
 <div class="container ml-3">
  <div class="collapse navbar-collapse align-center" id="navbarSupportedContent">
  <ul class="navbar-nav">
          <li class="nav-item mr-5">
            <a class="nav-link @yield('beranda')" href="/"><i class="bi bi-house-door"></i> Beranda</a>
          </li>  
           <li class="nav-item mr-5">
            <a class="nav-link @yield('tentang')" href="/artikel-tentang"><i class="bi bi-people-fill"></i> Tentang Kami</a>
          </li>
           <li class="nav-item Category mr-5">
            <a class="nav-link"><i class="bi bi-menu-button"></i> Kategori</a>
          </li>
        <li class ="nav-item mr-5">
            <a class ="nav-link" href="https://dagangekspor.com/" target="blank"><i class="bi bi-cart4"></i> Go to Market Place &raquo;</a>    
        </li>
    </ul>
      </div> 
</nav>

  <div class="side">
    <div class="head">
      <i class="bi bi-menu-button"></i> Kategori 
    </div>
    

    <ul>
    @foreach ($kategori as $row)
      <li>
        <a class="dropdown-item" href="/artikel-kategori/{{$row->slug}}">{{$row->nama}}</a>
      </li>
    @endforeach
    </ul>

    <li class="geser text-center">
      <i class="bi bi-arrow-left"></i>
    </li>
    </div>
  </div>
<script>
  let side = document.querySelector('.side');
  let toggle = document.querySelector('nav ul li.Category');
  let close = document.querySelector('.side .geser');
  toggle.addEventListener('click', function(){
    side.classList.add('hide');
  })
  close.addEventListener('click',function(){
    side.classList.remove('hide');
  })
</script>

</body>