<div class="left">
    <button id="on" class="btn btn-info"><i class="fa fa-bars"></i></button>
    <button id="off" class="btn btn-info hide"><i class="fa fa-align-left"></i></button>
    <button class="btn btn-info hidden-xs-down"><i class="fa fa-expand-arrows-alt"></i></button>
    <button class="btn btn-info hidden-xs-down"><i class="fa fa-home"></i>Back Home</button>
  </div>
  <div class="right">
    <button class="btn btn-info hidden-xs-down"><i class="fa fa-bell"></i></button>
    <button class="btn btn-info hidden-xs-down"><i class="fa fa-envelope"></i></button>
    <div class="dropdown">
      <button class="btn btn-info dropdown-toggle" id="userDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{ Auth::user()->name}}</button>
      <div class="dropdown-menu" aria-labelledby="userDropdown">
       <a class="dropdown-item" href="#">profile</a>
       <a class="dropdown-item" href="#">sitting</a>
       <a class="dropdown-item" href="#">log out</a>
     </div>
    </div>
  </div>
