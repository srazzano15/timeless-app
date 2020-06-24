<!DOCTYPE html>
<html>
<head>
<title>{{ config('app.name', 'Laravel') }}</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<!-- CSRF Token -->
<meta name="csrf-token" content="{{ csrf_token() }}">

<!-- Fonts -->
<link rel="dns-prefetch" href="//fonts.gstatic.com">
<!--Internal Styles-->
<link rel="stylesheet" href="{{ asset('css/admin.css') }}">

<link rel="shortcut icon" href="{{ asset('images/timeless_drip_logo.png') }}" type="image/x-icon">

{{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css"> --}}
<!-- MaterializeCSS Styles -->


<style>
  [v-cloak] {
    display: none;
  }
</style>

</head>



<body>
<div id="admin_index">
  <v-app v-cloak>
    {{-- 
    <home-nav :drawer="drawer">
      <template v-slot:user>
        {{ Auth::user()->name }}
      </template>
      <template v-slot:logout-form>
        <form id="logout-form" action=" {{ route('logout') }} " method="POST" style="display: none;">
          @csrf
      </form>
      </template>
    </home-nav> --}}

    {{-- TODO: NOT have this be on the root instance and get good --}}
    
        
    
    <v-toolbar
      class="background--grey"
      app
    >
    @auth
        <v-toolbar-side-icon class="yel--text" @click.stop="drawer = !drawer"></v-toolbar-side-icon>
    @endauth
      
      <v-toolbar-title class="white--text headline">Timeless Batch Master</v-toolbar-title>
      <v-spacer></v-spacer>
    </v-toolbar>

    @auth
    <v-navigation-drawer
      v-model="drawer"
      absolute
      dark
      temporary
      app
    >
      <v-list class="pa-1">


        <v-list-tile avatar tag="div">
          <v-list-tile-avatar>
            <img src="/images/timeless_drip_logo.png">
          </v-list-tile-avatar>

          <v-list-tile-content>
            <v-list-tile-title>{{ Auth::user()->name }}</v-list-tile-title>
          </v-list-tile-content>


        </v-list-tile>
      </v-list>

      <v-list class="pt-0" dense>
        <v-divider light></v-divider>

        <v-list-tile
          v-for="item in singleItems"
          :key="item.title"
          :href="item.href"
        >
          <v-list-tile-action>
            <v-icon>@{{item.icon}}</v-icon>
          </v-list-tile-action>

          <v-list-tile-content>@{{ item.title }}</v-list-tile-content>
        </v-list-tile>

        <v-list-group
          v-for="item in dropDownItems"
          :key="item.title"
          :prepend-icon="item.icon"
          v-model="item.active"
          no-action
        >
          <template v-slot:activator>
            <v-list-tile>
              <v-list-tile-content>
                <v-list-tile-title>@{{ item.title }}</v-list-tile-title>
              </v-list-tile-content>
            </v-list-tile>
          </template>

          <v-list-tile
            v-for="subItem in item.items"
            :key="subItem.title"
            :href="subItem.href"
          >
            <v-list-tile-content>
              <v-list-tile-title>@{{ subItem.title }}</v-list-tile-title>
            </v-list-tile-content>

          </v-list-tile>
        </v-list-group>

        <v-list-tile
          @click.prevent="submitForm"
          href="/logout"
        >
          <v-list-tile-action>
            <v-icon>work_off</v-icon>
          </v-list-tile-action>

          <v-list-tile-content>Logout</v-list-tile-content>
        </v-list-tile>

      </v-list>
      <form id="logout-form" action=" {{ route('logout') }} " method="POST" style="display: none;">
          @csrf
      </form>
    </v-navigation-drawer>
    @endauth
    <v-content>
      @yield('content')
    </v-content>
     
    <vue-footer></vue-footer>
  </v-app>
<!-- Top container -->
{{-- <header class="header">
  <div class="navbar-fixed">
    <nav>
      <div class="header--main navbar-wrapper">
        <a href="/admin">
          <img src="{{ asset('images/timeless_drip_logo.png') }}" class="right">
        </a>
      </div>
    </nav>
  </div>
</header> --}}

<!-- Overlay effect when opening sidebar on small screens -->


<!-- !PAGE CONTENT! -->
{{-- <main class="admin-main"> --}}
    <!-- Sidebar/menu -->
{{--     <admin-nav
      logo-img="{{ asset('images/timeless_drip_logo.png') }}"
      admin-url="{{ url('admin') }}"
      submit-url="{{ url('submit') }}"
      admin-users="{{ url('admin/users') }}"
      admin-create="{{ url('admin/users/create') }}"
      import-csv="{{ url('/import_csv') }}"
      export-report="{{ url('admin/edit') }}"
      logout-route="{{ route('logout') }}"
      logout="{{ route('logout') }}"
      bags-sub="{{  route('report_bags_submitted') }}"
    >
    <template v-slot:welcome-name >
      {{ Auth::user()->name }}
    </template>
      <form id="logout-form" action=" {{ route('logout') }} " method="POST" style="display: none;">
          @csrf
      </form>
    </admin-nav> --}}
  {{-- <div class="sidenav sidenav-fixed main-nav yel-text" >
    <div class="row">
      <div>
        <div class="col s2">
          <img class="" src="{{ asset('images/timeless_drip_logo.png') }}" class="center-align">
        </div>
        <div class="col s10">
          <span class="centered">Welcome, {{ $user->name }}</span><br>
        </div>
      </div>
    </div>
    <hr>
    <span style="padding: 0 10px; font-size: 1em;">Where would you like to go?</span>
    <div class="main-nav__items">
      <div class="main-nav__item">
        <a href="{{ url('admin') }}">
        <i class="fa fa-tachometer-alt fa-fw"></i> Dashboard</a>
      </div>
      
      <button onclick="myFunction('submission_mgmt')" class="main-nav__dropdown"><i class="fas fa-barcode fa-fw"></i> Submissions   </button>
      <div id="submission_mgmt" class="w3-hide">
          <div class="main-nav__item">
            <a href="{{ url('submit') }}">
            <i class="fa fa-angle-double-right"></i>  Submit Bag Weights</a>
            
          </div>
      </div>
      <button onclick="myFunction('user_mgmt')" class="w3-button w3-block w3-left-align"><i class="fa fa-users fa-fw"></i> User Management</button>
      <div id="user_mgmt" class="w3-hide">
          <a href="{{ url('admin/users') }}" class="w3-bar-item w3-button w3-padding"><i class="fa fa-angle-double-right"></i> Users</a>
          <a href="{{ url('admin/users/create') }}" class="w3-bar-item w3-button w3-padding"><i class="fa fa-angle-double-right"></i> Add User</a>
      </div>

      <button onclick="myFunction('order_mgmt')" class="w3-button w3-block w3-left-align"><i class="fas fa-barcode fa-fw"></i> Orders</button>
      <div id="order_mgmt" class="w3-hide">
          <a href="{{ url('admin/import') }}" class="w3-bar-item w3-button w3-padding"><i class="fa fa-angle-double-right"></i>  Import CSV</a>
          <a href="{{ url('admin/edit') }}" class="w3-bar-item w3-button w3-padding"><i class="fa fa-angle-double-right"></i>  Export Report</a>
      </div>
      <a class="w3-bar-item w3-button w3-padding" href="{{ route('logout') }}"
          onclick="event.preventDefault();
                          document.getElementById('logout-form').submit();">
          <i class="fa fa-cog fa-fw"></i>
          {{ __('Logout') }}
      </a>

      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
          @csrf
      </form>
    </div>
  </div> --}}
  
  {{-- <div class="col m9">
    <div class="container">
      @yield('content')
    </div>
  </div>
</main>


  @include('inc.footer') --}}

  
  <!-- End page content -->
</div>

<!--Custom Scripts-->
@stack('scripts')
<!-- Compiled and minified JavaScript -->
<script src="{{ asset('js/app.js') }}"></script>

</body>
</html>
