<ul class="nav flex-column">
    <li class="nav-item"><a href="{{  url('admin/dashboard') }}" class="nav-link active" ><i class="fa fa-adjust"></i>Dashboard</a></li>
    <!-- end user interface submenu -->
    <!-- end with charts -->
    <li class="nav-item"><a href="{{ url('admin/product/index') }}" class="nav-link"><i class="fa fa-inbox"></i>Produk</a></li>

    <li class="nav-item"><a href="#menu3" class="nav-link collapsed" data-toggle="collapse"><i class="fa fa-dollar"></i>Transaksi<span class="sub-ico"><i class="fa fa-angle-down"></i></span></a></li>
    <!-- start charts submenue -->
    <li class="sub collapse" id="menu3">
        <a href="{{ url('admin/transaksi/sukses') }}" class="nav-link" data-parent="#menu3">Sukses</a>
        <a href="{{ url('admin/transaksi/batal') }}" class="nav-link" data-parent="#menu3">Batal</a>
    </li>
    {{-- <li class="nav-item"><a href="contacts.html" class="nav-link"><i class="fa fa-user"></i>contact</a></li>
    <li class="nav-item"><a href="forms.html" class="nav-link"><i class="fa fa-edit"></i>forms</a></li>
    <li class="nav-item"><a href="tabels.html" class="nav-link"><i class="fa fa-table"></i>tables</a></li>
    <li class="nav-item"><a href="profile.html" class="nav-link"><i class="fa fa-users"></i>profile</a></li>
    <li class="nav-item"><a href="invoice.html" class="nav-link"><i class="fa fa-money-bill-alt"></i>invoice</a></li>
    <li class="nav-item"><a href="price.html" class="nav-link"><i class="fa fa-dollar-sign"></i>price</a></li>
    <li class="nav-item"><a href="support.html" class="nav-link"><i class="fa fa-life-ring"></i>support</a></li> --}}
  </ul>
