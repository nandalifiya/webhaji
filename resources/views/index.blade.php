<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Travel Haji dan Umroh</title>

  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="https://unpkg.com/font-awesome@4.7.0/css/font-awesome.min.css" type="text/css">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Merriweather+Sans:400,700" rel="stylesheet">
  <link href='https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic' rel='stylesheet' type='text/css'>

  <!-- Plugin CSS -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.min.css" rel="stylesheet" type="text/css">

  <!-- Theme CSS - Includes Bootstrap -->
  <link href="/css/creative.css" rel="stylesheet">

    <link type="text/css" href="css/carousel.css" rel="stylesheet">
  

  <link rel="stylesheet" type="text/css" href="assets/slick/slick.css"/>

  <link rel="stylesheet" type="text/css" href="assets/slick/slick-theme.css"/>

  
</head>

<body id="page-top">

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-light fixed-top py-3" id="mainNav">
    <div class="container">
      <a class="navbar-brand js-scroll-trigger" href="#page-top">Web Haji</a>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto my-2 my-lg-0">
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="{{ url('/') }}"><font color="#fff">Home</font></a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="{{ url('/haji') }}">Haji</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="{{ url('/umrah') }}">Umrah</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="{{ url('/about') }}">About Us</a>
          </li>

            @if (Route::has('login'))
              @auth
              <li class="nav-item">
                <a class="nav-link js-scroll-trigger" href="{{ url('/home') }}">Admin Dashboard</a>
              </li>
              @else
              <li class="nav-item">
                <a class="nav-link js-scroll-trigger" href="{{ route('login') }}">Login</a>
              </li>
              @if (Route::has('register'))
              <li class="nav-item">
                <a class="nav-link js-scroll-trigger" href="{{ route('register') }}">Register</a>
              </li>
              @endif
            @endauth
          @endif

          </li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Masthead -->
  <header class="masthead">
    <div class="container h-100">
      <div class="row h-100 align-items-center justify-content-center text-center">
        <div class="col-lg-10 align-self-end">
          <h1 class="text-uppercase text-white font-weight-bold">Your Favorite Haji and Umrah Travel Agent</h1>
          <hr class="divider my-4">
        </div>
        <div class="col-lg-8 align-self-baseline">
          <p class="text-white-75 font-weight-light mb-5">Cek paketnya sekarang!</p>
          <a class="btn btn-primary btn-xl js-scroll-trigger" style="margin:20px;" href="{{ url('/haji') }}">Paket Haji</a>
          <a class="btn btn-primary btn-xl js-scroll-trigger" style="margin:20px;" href="{{ url('/umrah') }}">Paket Umrah</a>
        </div>
      </div>
    </div>
  </header>

  <!-- Services Section -->
  <section class="page-section">
    <h2 class="text-center mt-5">Recommended Paket</h2>
    <hr class="divider my-4">
    <div class="row justify-content-center">
      <div class="recommended-slider col-md-10">
        @foreach($recommendPosts as $post)
          <div class="card text-center">
            <img class="card-img-top" src="{{ url('storage').'/'.$post->filename}}" alt="{{$post->filename}}" style="max-height:200px">
            <div class="card-body pt-2 ">
              <h5 class="card-title mb-1"><strong>{{$post->title}}</strong></h5>
              <hr class="mt-1 mb-1">
              <p class="card-text">{{str_limit($post->description, 60)}}</p>
              <a href="{{ url('show', ['id' => $post['id']]) }}" class="btn btn-primary">Details</a>
            </div>
          </div>
          @endforeach
      </div>

      </div>
    </div>
  </section>

  <!-- Services Section -->
  <section class="page-section">
    <h2 class="text-center mt-5">Blog Posts</h2>
    <hr class="divider my-4">
    <div class="row justify-content-center">
      <div class="blog-slider col-md-8">
        @foreach($blogPosts as $post)
          <div class="card">
            <img class="card-img" src="{{ url('storage').'/'.$post->filename}}" alt="{{$post->filename}}" style="max-height:70vh;" > 
            
            <div class="card-img-overlay">
              <h4 class="card-title"><strong>{{$post->title}}</strong></h4>
              <p class="card-text">{{str_limit($post->description, 50 )}}</p>
              <a href="{{ url('show', ['id' => $post['id']]) }}" class="btn btn-primary">Baca Selanjutnya</a>
            </div>
          </div>
          @endforeach
      </div>
      <div class="blog-slider-nav col-md-8 mt-3">
        @foreach($blogPosts as $post)
          <div class="card">
            <img class="card-img" src="{{ url('storage').'/'.$post->filename}}" alt="{{$post->filename}}" style="max-height:120px;"> 
          </div>
          @endforeach
      </div>

      </div>
    </div>
  </section>


  <!-- Portfolio Section -->
  <!-- <section id="portfolio">
    <div class="container-fluid p-0">
      <div class="row no-gutters">
        <div class="col-lg-4 col-sm-6">
          <a class="portfolio-box" href="img/portfolio/fullsize/1.jpg">
            <img class="img-fluid" src="img/portfolio/thumbnails/1.jpg" alt="">
            <div class="portfolio-box-caption">
            </div>
          </a>
        </div>
        <div class="col-lg-4 col-sm-6">
          <a class="portfolio-box" href="img/portfolio/fullsize/2.jpg">
            <img class="img-fluid" src="img/portfolio/thumbnails/2.jpg" alt="">
            <div class="portfolio-box-caption">
            </div>
          </a>
        </div>
        <div class="col-lg-4 col-sm-6">
          <a class="portfolio-box" href="img/portfolio/fullsize/3.jpg">
            <img class="img-fluid" src="img/portfolio/thumbnails/3.jpg" alt="">
            <div class="portfolio-box-caption">
            </div>
          </a>
        </div>
        <div class="col-lg-4 col-sm-6">
          <a class="portfolio-box" href="img/portfolio/fullsize/4.jpg">
            <img class="img-fluid" src="img/portfolio/thumbnails/4.jpg" alt="">
            <div class="portfolio-box-caption">
            </div>
          </a>
        </div>
        <div class="col-lg-4 col-sm-6">
          <a class="portfolio-box" href="img/portfolio/fullsize/5.jpg">
            <img class="img-fluid" src="img/portfolio/thumbnails/5.jpg" alt="">
            <div class="portfolio-box-caption">
            </div>
          </a>
        </div>
        <div class="col-lg-4 col-sm-6">
          <a class="portfolio-box" href="img/portfolio/fullsize/6.jpg">
            <img class="img-fluid" src="img/portfolio/thumbnails/6.jpg" alt="">
            <div class="portfolio-box-caption p-3">
            </div>
          </a>
        </div>
      </div>
    </div>
  </section> -->


  <!-- Contact Section -->
  <section class="page-section">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-8 text-center">
          <h2 class="mt-0">Let's Get In Touch!</h2>
          <hr class="divider my-4">
          
        </div>
      </div>
      <div class="row">
        <div class="col-lg-4 ml-auto text-center">
          <i class="fas fa-phone fa-3x mb-3 text-muted"></i>
          <div> (0341) xxxxxxxx</div>
        </div>
        <div class="col-lg-4 mr-auto text-center">
          <i class="fas fa-envelope fa-3x mb-3 text-muted"></i>
          <!-- Make sure to change the email address in anchor text AND the link below! -->
          <a class="d-block" href="mailto:contact@yourwebsite.com">contact@yourwebsite.com</a>
        </div>
      </div>
    </div>
  </section>

  <!-- Footer -->
  <footer class="bg-light py-5">
    <div class="container">
      <div class="small text-center text-muted">Copyright &copy; 2019 - Start Bootstrap</div>
    </div>
  </footer>

  


  <!-- jQuery library -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

  <!-- Popper JS -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>

  <!-- Latest compiled JavaScript -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>

  <script type="text/javascript" src="assets/slick/slick.min.js"></script>

  <!-- custom scipt for carousel -->
  <script src="js/carousel.js"></script>


</body>

</html>