{{-- <div id="navbar" class="container">
  <nav class="navbar navbar-default">
  <a class="navbar-brand" href="/">
    <img src="{{asset('/images/timeless_drip_logo.png')}}" width="30px" height="30px" alt="">
    {{config('app.name', 'Timeless Batch Master')}}
  </a>
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link btn" href="/">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link btn" href="/extraction">Submit A Batch</a>
        </li>
        <li class="nav-item">
          <a class="nav-link btn" href="/search">Compare Batches</a>
        </li>
      </ul>
  </nav>
</div> --}}


<nav class="navbar navbar-expand-md navbar-laravel">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">
                <img src="{{asset('/images/timeless_drip_logo.png')}}" width="30px" height="30px" alt="">
                {{config('app.name', 'Timeless Batch Master')}}
              </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav mr-auto">

                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ml-auto">
                    <!-- Authentication Links -->
                    @guest
                        {{-- <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        <li class="nav-item">
                            @if (Route::has('register'))
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            @endif
                        </li> --}}
                    @else
                        <li class="nav-item">
                            <a class="nav-link btn" href="/home">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link btn" href="/extraction">Submit A Batch</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link btn" href="/search">Compare Batches</a>
                        </li>

                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle btn" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ url('/admin') }}">{{ __('Admin') }} </a>
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
                    @endguest
                </ul>
            </div>
        </div>
    </nav>





