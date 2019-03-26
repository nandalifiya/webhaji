<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Travel Haji dan Umroh</title>

  <!-- Font Awesome Icons -->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Merriweather+Sans:400,700" rel="stylesheet">
  <link href='https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic' rel='stylesheet' type='text/css'>

  <!-- Plugin CSS -->
  <link href="vendor/magnific-popup/magnific-popup.css" rel="stylesheet">

  <!-- Theme CSS - Includes Bootstrap -->
  <link href="css/creative.css" rel="stylesheet">
  
  <!-- jQuery library -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

  <!-- Popper JS -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>

  <!-- Latest compiled JavaScript -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>

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
            <a class="nav-link js-scroll-trigger" href="{{ url('/') }}">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="{{ url('/haji') }}"><font color="#fff">Haji</font></a>
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
                <a class="nav-link js-scroll-trigger" href="{{ url('/about') }}">Admin Dashboard</a>
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

  <!-- Services Section -->
  <section class="page-section">
    <div class="container">
      <h2 class="text-center mt-0">Daftar paket haji</h2>
      <hr class="divider my-4">
      <div class="row">
        @foreach($hajiPosts as $post)
        <div class="col-md-4">
          <div class="card">
            <img class="card-img-top" src="{{ url('storage').'/'.$post->filename}}" alt="{{$post->filename}}" style="max-height:200px">
            <div class="card-body pt-2 ">
              <h5 class="card-title mb-1"><strong>{{$post->title}}</strong></h5>
              <hr class="mt-1 mb-1">
              <p class="card-text">{{str_limit($post->description, 60)}}</p>
              <a href="{{ url('show', ['id' => $post['id']]) }}" class="btn btn-primary">Details</a>
            </div>
          </div>
        </div>
        @endforeach
      </div>
      <br>
      <br>
      {{ $hajiPosts->onEachSide(1)->links() }}
    </div>
  </section>

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

  <!-- Custom scripts for this template -->
  <script src="js/creative.min.js"></script>

</body>

</html>
