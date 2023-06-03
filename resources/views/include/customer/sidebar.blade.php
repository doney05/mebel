<ul class="nav flex-column">
    <li class="nav-item"><a href="{{{ url('dashboard/'. Auth::user()->id)}}}" class="nav-link active" ><i class="fa fa-adjust"></i>Dashboard</a></li>
    <!-- end user interface submenu -->
    <!-- end with charts -->
    <li class="nav-item"><a href="{{  url('produk/'. Auth::user()->id) }}" class="nav-link"><i class="fa fa-inbox"></i>Produk</a></li>
    <li class="nav-item"><a href="{{  url('keranjang/'. Auth::user()->id) }}" class="nav-link"><i class="fa-sharp fa-solid fa-cart-plus"></i> Keranjang</a></li>
    <li class="nav-item"><a href="{{  url('history/'. Auth::user()->id) }}" class="nav-link"><i class="fa-regular fa-envelope"></i> Riwayat Pesanan</a></li>
    {{-- <li class="nav-item"><a href="contacts.html" class="nav-link"><i class="fa fa-user"></i>contact</a></li>
    <li class="nav-item"><a href="forms.html" class="nav-link"><i class="fa fa-edit"></i>forms</a></li>
    <li class="nav-item"><a href="tabels.html" class="nav-link"><i class="fa fa-table"></i>tables</a></li>
    <li class="nav-item"><a href="profile.html" class="nav-link"><i class="fa fa-users"></i>profile</a></li>
    <li class="nav-item"><a href="invoice.html" class="nav-link"><i class="fa fa-money-bill-alt"></i>invoice</a></li>
    <li class="nav-item"><a href="price.html" class="nav-link"><i class="fa fa-dollar-sign"></i>price</a></li>
    <li class="nav-item"><a href="support.html" class="nav-link"><i class="fa fa-life-ring"></i>support</a></li> --}}
  </ul>
