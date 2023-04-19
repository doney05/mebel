
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <!-- start linking  -->

    @include('include.customer.style')
    @stack('style')
  <!-- end linking -->
  <title>@yield('title')</title>
</head>
<style>
    .cart {
        float:right;
        padding-right: 30px;
    }

    .cart .dropdown-menu{
        padding:20px;
        top:30px !important;
        width:350px !important;
        left:-110px !important;
        box-shadow:0px 5px 30px black;
    }
    .total-section p{
        margin-bottom:20px;
    }
    .cart-detail{
    padding:15px 0px;
    }
    .cart-detail-img img{
        width:100%;
        height:100%;
        padding-left:15px;
    }
    .cart-detail-product p{
        margin:0px;
        color:#000;
        font-weight:500;
    }
    .cart-detail .price{
        font-size:12px;
        margin-right:10px;
        font-weight:500;
    }
    .cart-detail .count{
        color:#000;
    }
    .checkout{
    padding-top: 15px;
    }
    .checkout a{
        border-radius:50px;
        background: purple;
        color: white;
        font-weight: bold;
    }
    .checkout a:hover{
        border-radius:50px;
        background: rgb(232, 0, 232);
        color: white;
        font-weight: bold;
    }
    .dropdown-menu:before{
        content: " ";
        position:absolute;
        top:-20px;
        right:50px;
        border:10px solid transparent;
        border-bottom-color:#fff;
    }

</style>
<body>
<!-- start admin -->
<section id="admin">
  <!-- start sidebar -->
  <div class="sidebar">
    <!-- start with head -->
    <div class="head">
      <div class="logo">
        <img src="{{ asset('admin/assets/img/logo-admin.png') }}" alt="">
      </div>
      {{-- <a href="#" class="btn btn-danger">SUBMIT new MOVIE</a> --}}
    </div>
    <!-- end with head -->
    <!-- start the list -->
    <div id="list">
      @include('include.customer.sidebar')
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
        @include('include.customer.navbar')
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
@include('include.customer.script')
@stack('script')
<!-- end screpting -->
</body>
</html>
