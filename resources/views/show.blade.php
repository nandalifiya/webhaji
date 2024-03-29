<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Travel Haji dan Umroh</title>

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Merriweather+Sans:400,700" rel="stylesheet">
  <link href='https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic'
    rel='stylesheet' type='text/css'>

  <!-- Theme CSS - Includes Bootstrap -->
  <link href="/css/creative.css" rel="stylesheet">

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
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse"
        data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false"
        aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto my-2 my-lg-0">
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="{{ url('/') }}">Home</a>
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
  <header class="masthead2">
    <div class="container h-100">
      <div class="row h-100 align-items-center justify-content-center text-center">
        <div class="col-lg-10 align-self-end">
          <h1 class="text-uppercase text-white font-weight">Paket Terbaik untuk anda</h1>
          <hr class="divider my-4">
        </div>
        <div class="col-lg-8 align-self-baseline">
        </div>
      </div>
    </div>
  </header>

  <!-- Page Content -->
  <section class="page-section">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-8 text-center">
        </div>
      </div>
      <!-- Title -->
      <h1 class="mt-4">{{$model->title}}</h1>

      @foreach($model->user()->get() as $writer)
      <p></p>
      @endforeach
      <!-- Date/Time -->
      <p>{{$writer->name}} , {{date('d-m-Y', strtotime($model->created_at))}}</p>

      <!-- Preview Image -->
      <section>
        <div class="row justify-content-center">
          <div class="col-md-8">
            <img class="img-fluid rounded w-100" src="{{ url('storage').'/'.$model->filename}}"
              alt="{{$model->filename}}">
          </div>
        </div>
        <p></p>
      </section>

      @isset ($model->price)
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-body">
              <h4><strong>Harga Paket : &nbsp;&nbsp;&nbsp;</strong>
              <span class="packet-price font-weight-light mb-5">
                <strong>Rp {{number_format($model->price,0, '.', '.')}}</strong>
              </span></h4>
            </div>
          </div>
        </div>
      </div>
      @endisset


      <!-- Post Content -->
      <div class="row mt-3  ">
        <div class="col-12">
          <div class="card">
            <div class="card-body">
              <div>{!!$model->description!!}</div>
            </div>
          </div>
        </div>
      </div>

      <!-- Booking Form -->
      @isset ($model->price)
      <div class="row mt-5 mb-5 justify-content-center">
        <div class="col-md-6">
          <div id="booking">
            <div class="booking-form text-center">
              <h3 class="">Daftar Sekarang!</h3>
              <form class="mt-3" method="post" action="{{ route('mail.store') }}">
                @csrf
                @method('POST')
                <input type="hidden" name="post_id" id="post_id" value="{{$model->id}}">
                <div class="form-group">
                  <span class="form-label">Nama</span><span style="color:red">*</span>
                  <input class="form-control" type="name" placeholder="masukkan nama" name="name" id="name">
                </div>
                <div class="form-group">
                  <span class="form-label">Email</span><span style="color:red">*</span>
                  <input class="form-control" type="email" placeholder="masukkan email" name="email" id="email">
                </div>
                <div class="form-group">
                  <span class="form-label">Nomor Telepon</span><span style="color:red">*</span>
                  <input class="form-control" type="tel" placeholder="masukkan nomor telepon" name="call_numb"
                    id="call_numb">
                </div>
                <button type="submit" class="btn btn-primary">Daftar</button>
            </div>
            </form>
          </div>
        </div>
        @endisset

      </div>
    </div>



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
      <div class="small text-center text-muted">Copyright &copy; 2019 - WebHaji</div>
    </div>
  </footer>

  <!-- Custom scripts for this template
  <script src="/js/creative.min.js"></script> -->

</body>

</html>
