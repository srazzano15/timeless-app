<!DOCTYPE html>
<html>
<title>{{ config('app.name', 'Laravel') }}</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<!-- CSRF Token -->
<meta name="csrf-token" content="{{ csrf_token() }}">


<!--Styles-->
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<!--W3 CSS-->
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous">
<!--Font Awesome 5-->
<link rel="stylesheet" href="{{ asset('css/app.css') }}">
<!--Internal Styles-->
<link rel="shortcut icon" href="{{ asset('images/timeless_drip_logo.png') }}" type="image/x-icon">


<!-- Vuetify Styles -->
<link rel="stylesheet" href="//cdn.datatables.net/1.10.7/css/jquery.dataTables.min.css">
<!--Laravel DataTables-->




<body class="w3-light-grey" id="admin_page">

<!-- Top container -->
<div class="w3-bar w3-top w3-black w3-large" style="z-index:4">
  <button class="w3-bar-item w3-button w3-hide-large w3-hover-none w3-hover-text-light-grey" onclick="w3_open();"><i class="fa fa-bars"></i>  Menu</button>
  <span class="w3-bar-item w3-right"><a href="/admin"><img src="{{ asset('images/timeless_drip_logo.png') }}" height="25px"></a></span>

</div>

<!-- Sidebar/menu -->
<nav class="w3-sidebar w3-collapse w3-animate-left" style="z-index:3;width:300px;" id="mySidebar"><br>
  <div class="w3-container w3-row">
    <div class="w3-col s4">
    <img src="{{ asset('images/timeless_drip_logo.png') }}" class="w3-circle w3-margin-right" style="width:46px">
    </div>
    <div class="w3-col s8 w3-bar">

    <span>Welcome, {{ $user->name }}</span><br>

      {{-- <a href="#" class="w3-bar-item w3-button"><i class="fa fa-envelope"></i></a>
      <a href="#" class="w3-bar-item w3-button"><i class="fa fa-user"></i></a>
      <a href="#" class="w3-bar-item w3-button"><i class="fa fa-cog"></i></a> --}}
    </div>
  </div>
  <hr>
  <div class="w3-container">

    <h5>Where would you like to go?</h5>
  </div>
  <div class="w3-bar-block">
    <a href="#" class="w3-bar-item w3-button w3-padding-16 w3-hide-large w3-dark-grey w3-hover-black" onclick="w3_close()" title="close menu"><i class="fa fa-remove fa-fw"></i>  Close Menu</a>
    <a href="{{ url('admin') }}" class="w3-bar-item w3-button w3-padding"><i class="fa fa-tachometer-alt fa-fw"></i>  Dashboard</a>
    <button onclick="myFunction('submission_mgmt')" class="w3-button w3-block w3-left-align"><i class="fas fa-barcode fa-fw"></i> Submissions</button>
    <div id="submission_mgmt" class="w3-hide">
        <a href="{{ url('submit') }}" class="w3-bar-item w3-button w3-padding"><i class="fa fa-angle-double-right"></i>  Submit Bag Weights</a>
    </div>
    <button onclick="myFunction('user_mgmt')" class="w3-button w3-block w3-left-align"><i class="fa fa-users fa-fw"></i> User Management</button>
    <div id="user_mgmt" class="w3-hide">
        <a href="{{ url('admin/users') }}" class="w3-bar-item w3-button w3-padding"><i class="fa fa-angle-double-right"></i> Users</a>
        <a href="{{ url('admin/users/create') }}" class="w3-bar-item w3-button w3-padding"><i class="fa fa-angle-double-right"></i> Add User</a>
        {{-- <a href="{{  }}" class="w3-bar-item w3-button w3-padding"><i class="fa fa-angle-double-right"></i> Edit Users</a> --}}
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
</nav>


<!-- Overlay effect when opening sidebar on small screens -->
<div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

<!-- !PAGE CONTENT! -->
<div class="w3-main" style="margin-left:300px;margin-top:43px;" id="admin_index">




  @yield('content')





  @include('inc.footer')
  <!-- End page content -->
</div>

<script>
// Get the Sidebar
var mySidebar = document.getElementById("mySidebar");

// Get the DIV with overlay effect
var overlayBg = document.getElementById("myOverlay");

// Toggle between showing and hiding the sidebar, and add overlay effect
function w3_open() {
    if (mySidebar.style.display === 'block') {
        mySidebar.style.display = 'none';
        overlayBg.style.display = "none";
    } else {
        mySidebar.style.display = 'block';
        overlayBg.style.display = "block";
    }
}

// Close the sidebar with the close button
function w3_close() {
    mySidebar.style.display = "none";
    overlayBg.style.display = "none";
}


function myFunction(id) {
    var x = document.getElementById(id);
    if (x.className.indexOf("w3-show") == -1) {
        x.className += " w3-show";
    } else {
        x.className = x.className.replace(" w3-show", "");
    }
}
</script>



<script src="{{ asset('js/app.js') }}"></script>

<!--Custom Scripts-->
@stack('scripts')


</body>
</html>
