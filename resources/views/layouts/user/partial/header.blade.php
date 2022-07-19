<section class="navbar-color">
    <nav class="navbar navbar-expand-lg navbar-light container">
        <a class="navbar-brand text-light" href="#">
            <img height="40px" src="{{ asset('user') }}/public/icon/truck.gif" alt="">
            Weight Scale</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
              <a class="nav-link text-light" href="index.html">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-light" href="{{ url('/') }}#service">Service</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-light" href="@route('about')">About</a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-light" href="@route('blogs')">Blogs</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-light" href="contact.html">Contact</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link text-light dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Profile
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                  @if(Auth::check())
                  <a class="dropdown-item" href="@route("home")">Dashboard</a>
                  <a class="dropdown-item" href="@route('login')">Logout</a>
                  @else                  
                  <a class="dropdown-item" href="@route('login')">Login</a>
                  <a class="dropdown-item" href="@route('register')">Register</a>
                  @endif
                </div>
              </li>
          </ul>
        </div>
    </nav>
</section>