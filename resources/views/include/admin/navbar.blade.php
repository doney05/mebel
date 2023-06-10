<div class="left">
    <button id="on" class="btn btn-info"><i class="fa fa-bars"></i></button>
    <button id="off" class="btn btn-info hide"><i class="fa fa-align-left"></i></button>
    <a href="{{ url('/') }}" class="btn btn-info hidden-xs-down"><i class="fa fa-home"></i>Back Home</a>
  </div>
  <div class="right">
    <div class="dropdown">
      <button class="btn btn-info dropdown-toggle" id="userDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{ Auth::user()->name}}</button>
      <div class="dropdown-menu" aria-labelledby="userDropdown">
        <form action="{{ url('logout') }}" method="POST">
            @csrf
            {{-- <a class="dropdown-item" href="#">log out</a> --}}
            <button class="btn btn-login dropdown-item" type="submit" style="padding: 15px 30px; color: #8da2b7;">
                log out
            </button>
        </form>
     </div>
    </div>
  </div>
