
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <!-- start linking  -->

    @include('include.admin.style')
    @stack('style')
  <!-- end linking -->
  <title>@yield('title')</title>
</head>
<body>
<!-- start admin -->
<section id="admin">
  <!-- start sidebar -->
  <div class="sidebar">
    <!-- start with head -->
    <div class="head">
      <div class="logo">
        <img src="{{ asset('client/assets/images/logo.png') }}" alt="">
      </div>
      {{-- <a href="#" class="btn btn-danger">SUBMIT new MOVIE</a> --}}
    </div>
    <!-- end with head -->
    <!-- start the list -->
    <div id="list">
      @include('include.admin.sidebar')
    </div>
    <!-- end the list -->
  </div>
  <!-- end sidebar -->
  <!-- start content -->
  <div class="content">
    <!-- start content head -->
    <div class="head">
      <!-- head top -->
      <div class="top">
        @include('include.admin.navbar')
      </div>
      <!-- end head top -->
      <!-- start head bottom -->
      <!-- end head bottom -->
    </div>
    <!-- end content head -->
    <!-- start with the real content -->
    <div id="real">
      @yield('content')
    </div>
    <!-- end the real content -->
  </div>
  <!-- end content -->
</section>
<!-- end admin -->
<!-- start screpting -->
@include('include.admin.script')
@stack('script')
<!-- end screpting -->
</body>
</html>
