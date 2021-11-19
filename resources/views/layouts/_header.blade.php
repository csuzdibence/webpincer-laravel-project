<header class="p-1 bg-danger text-white fixed-top">
    <div class="container">
      <div class="d-md-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
        <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
          <li><a href="{{route('home')}}" class="nav-link px-2 text-white">WebPincér</a></li>
        </ul>

        <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3">
          <input type="search" class="form-control form-control-dark" placeholder="Search..." aria-label="Search">
        </form>

        <div class="text-end">
          @auth
          <span>{{Auth::user()->name}}</span>
          <form action="{{route('auth.logout')}}" method="POST">
            @csrf
            <button class="btn btn-sm btn-danger" type="submit">
                {{__('Sign out')}}
            </button>
          </form>
          @else
          <a class="btn btn-light me-2 btn-outline-dark" href="{{route('auth.login')}}">Login</a>
          <a href="{{route('auth.register')}}" class="btn btn-light btn-outline-dark"> Register</a>
          @endauth
        </div>
      </div>      
    </div>
  </header>
  