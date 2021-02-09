<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.79.0">
    <title>@yield('title')</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/pricing/">

    <!-- Bootstrap core CSS -->
<link href="{{asset('frontend/css/bootstrap.min.css')}}" rel="stylesheet">
<link href="{{asset('frontend/css/star.css')}}" rel="stylesheet">

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" crossorigin="anonymous"></script>


    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>
    <style>
      .checked {
        color: orange;
      }
    </style><!--star -->

    
    <!-- Custom styles for this template -->
  </head>
  <body>
    
<header class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-dark border-bottom shadow-sm">
  <h3 class="text-light my-0 me-md-auto fw-normal"><strong>DWISATA</strong></h3>

  <nav class="my-2 my-md-0 me-md-3 navbar ">
    <a class="p-2 text-light" href="{{url('/')}}">Beranda</a>
    <div class="p-2 dropdown">
      <a class="text-light dropdown-toggle" href="#" id="dropdownMenuLink" data-toggle="dropdown" >
        Kategori
      </a>
      <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
        <a class="dropdown-item " href="#">Rekomendasi</a>
        @foreach ($kategori as $ktg)
          <a class="dropdown-item" href="{{route('pilihkategori', $ktg->id)}}">{{$ktg->kategori}}</a>
        @endforeach
      </div>
    </div> 
    <a class="p-2 text-light" href="#">Tentang</a>

    @guest
      <a class="p-2 text-light" href="{{ route('login') }}">{{ __('Login') }}</a>
    @if (Route::has('register'))
                                    <a class="p-2 text-light" href="{{ route('register') }}">{{ __('Register') }}</a>
    @endif
    @else
      <a class="p-2 text-light" href="{{route('tambah')}}">Tambah Tempat</a>
      <div class="p-2 dropdown ">
        <a class="text-light dropdown-toggle" href="#" id="dropdownMenuLink" data-toggle="dropdown" >
         <i class="fas fa-user-alt"></i>
        </a>
        <div class="dropdown-menu pull-right" aria-labelledby="dropdownMenuLink">
          <span class="dropdown-item" href="#">{{ Auth::user()->name }}</span>
          <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>
          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
          @csrf
          </form>
        </div>
      </div>
    @endguest

  </nav>
</header>

<main class="container">
  @yield('content')


  <footer class="pt-4 my-md-5 pt-md-5 border-top">
    <div class="row">
      <div class="col-12 col-md">
        <small class="d-block mb-3 text-muted">&copy; DYNATIC 2021</small>
      </div>
      <div class="col-6 col-md">
        <h5>Features</h5>
        <ul class="list-unstyled text-small">
          <li><a class="link-secondary" href="#">Cool stuff</a></li>
          <li><a class="link-secondary" href="#">Random feature</a></li>
          <li><a class="link-secondary" href="#">Team feature</a></li>
          <li><a class="link-secondary" href="#">Stuff for developers</a></li>
          <li><a class="link-secondary" href="#">Another one</a></li>
          <li><a class="link-secondary" href="#">Last time</a></li>
        </ul>
      </div>
      <div class="col-6 col-md">
        <h5>Resources</h5>
        <ul class="list-unstyled text-small">
          <li><a class="link-secondary" href="#">Resource</a></li>
          <li><a class="link-secondary" href="#">Resource name</a></li>
          <li><a class="link-secondary" href="#">Another resource</a></li>
          <li><a class="link-secondary" href="#">Final resource</a></li>
        </ul>
      </div>
      <div class="col-6 col-md">
        <h5>About</h5>
        <ul class="list-unstyled text-small">
          <li><a class="link-secondary" href="#">Team</a></li>
          <li><a class="link-secondary" href="#">Locations</a></li>
          <li><a class="link-secondary" href="#">Privacy</a></li>
          <li><a class="link-secondary" href="#">Terms</a></li>
        </ul>
      </div>
    </div>
  </footer>
</main>

</body>




  <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script>


  <script>
/* When the user clicks on the button, 
toggle between hiding and showing the dropdown content */
function myFunction() {
  document.getElementById("myDropdown").classList.toggle("show");
}

// Close the dropdown if the user clicks outside of it
window.onclick = function(event) {
  if (!event.target.matches('.dropbtn')) {
    var dropdowns = document.getElementsByClassName("dropdown-content");
    var i;
    for (i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];
      if (openDropdown.classList.contains('show')) {
        openDropdown.classList.remove('show');
      }
    }
  }
}
</script>
</html>
