<div class="left">
    <button id="on" class="btn btn-info"><i class="fa fa-bars"></i></button>
    <button id="off" class="btn btn-info hide"><i class="fa fa-align-left"></i></button>
    <a href="{{ url('/') }}" class="btn btn-info hidden-xs-down"><i class="fa fa-home"></i>Beranda</a>
  </div>
  <div class="right">
        <div class="dropdown cart">
            <button type="button" class="btn btn-primary" data-toggle="dropdown">
                <i class="fa fa-shopping-cart" aria-hidden="true"></i> Keranjang <span class="badge badge-pill badge-danger">{{ $carts->count() }}</span>
            </button>
            <div class="dropdown-menu" style="margin-top: 30px">
                <div class="row total-header-section">
                    @php $total = 0 @endphp
                    @foreach($carts as $detail)
                        @php $total += $detail->price @endphp
                    @endforeach
                    <div class="col-lg-12 col-sm-12 col-12 total-section text-right">
                        <p style="    margin-top: 15px;
                        margin-right: 15px;">Total: <span class="text-info">Rp. {{ number_format($total)}}</span></p>
                        <hr>
                    </div>
                </div>
                @if($carts)
                @foreach($carts as $details)
                        <div class="row cart-detail">
                            <div class="col-lg-4 col-sm-4 col-4 cart-detail-img">
                                <img src="{{ Storage::url($details->product->images) }}" />
                            </div>
                            <div class="col-lg-8 col-sm-8 col-8 cart-detail-product">
                                <p>{{ $details->product->name }}</p>
                                <span class="price text-info">Rp. {{ number_format($details->price) }}</span> <span class="count"> Quantity:{{ $details->qty }}</span>
                            </div>
                        </div>
                    @endforeach
                @endif

                <div class="row" style="margin-bottom: 10px">
                    <div class="col-lg-12 col-sm-12 col-12 text-center checkout">
                        <a href="{{  url('keranjang/'. Auth::user()->id) }}" class="btn btn-block">Lihat Semua</a>
                    </div>
                </div>
            </div>
        </div>
    <div class="dropdown">
      <button class="btn btn-info dropdown-toggle" id="userDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{ Auth::user()->name}}</button>
      <div class="dropdown-menu" aria-labelledby="userDropdown">
          <a class="btn btn-login dropdown-item" href="{{ url('profile/'. Auth::user()->id) }}">Profil</a>
          <form action="{{ url('logout') }}" method="POST" style="border-top: 1px solid #e5e5e5;">
            @csrf
            {{-- <a class="dropdown-item" href="#">log out</a> --}}
            <button class="btn btn-login dropdown-item" type="submit" style="padding: 15px 30px; color: #8da2b7;">
                Keluar
            </button>
        </form>
     </div>
    </div>
  </div>
