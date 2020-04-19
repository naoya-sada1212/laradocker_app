<nav class="navbar navbar-expand-lg navbar-light shadow-sm p-3 mb-5 bg-white rounded">
  <div class="container">

  
  <a class="navbar-brand" href="#">{{ config('app.name', 'OTOSIMONO') }}</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">

    </ul>
    @guest
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
          <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
      </li>
      @if (Route::has('register'))
          <li class="nav-item">
              <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
          </li>
      @endif
    </ul>
    @else
    <ul class="navbar-nav ml-auto">
      <li class="nav-item mr-3">
        <a class="nav-link" href="{{ url('items') }}">一覧</a>
      </li>
      <li class="nav-item mr-3">
        <a class="nav-link" href="{{ url('items/create') }}">投稿する</a>
      </li>
      <li class="nav-item mr-3">
        <a class="nav-link" href="{{ url('users/'.auth()->user()->id) }}">プロフィール</a>
      </li>
      <li class="nav-item dropdown">
          <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
              {{ Auth::user()->name }} <span class="caret"></span>
          </a>
  
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
              <a href="{{ url('users/'.auth()->user()->id) }}" class="dropdown-item">プロフィール</a>
              <a class="dropdown-item" href="{{ route('logout') }}"
                 onclick="event.preventDefault();
                               document.getElementById('logout-form').submit();">
                  {{ __('Logout') }}
              </a>
  
              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                  @csrf
              </form>
              
          </div>
      </li>
    </ul>
  @endguest
</div>
</div>
</nav>

 {{-- <li class="nav-item">
        <a class="nav-link" href="#">一覧</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">投稿する</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">プロフィール</a>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">検索
      </button>
    </form>
  </div>--}}
  </div>
</nav>