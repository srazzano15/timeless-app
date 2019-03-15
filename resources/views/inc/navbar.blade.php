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


<nav>
    <div class="nav-wrapper header--main">
            <a class="brand-logo" href="{{ url('/') }}">
                <img src="{{asset('/images/timeless_drip_logo.png')}}" {{-- width="45px" height="45px" --}} alt="">
                <span class="hide-on-med-and-down">{{config('app.name', 'Timeless Batch Master')}}</span>
              </a>


            <div class="dropdown-content" id="navbarSupportedContent">
                <!-- Right Side Of Navbar -->
                <ul class="right hide-on-medium-down">
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
                            <a class="nav-link btn" href="/admin">Home</a>
                        </li>
                        {{-- <li class="nav-item">
                            <a class="nav-link btn" href="{{ route('batch.create') }}">Submit A Batch</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link btn" href="{{ route('batch.index') }}">Batches</a>
                        </li> --}}

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





