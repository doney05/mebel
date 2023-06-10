<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1">
    <title>Mebelku Landing Website</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('client/assets/font-awesome-4.7.0/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('client/assets/css/styles.css') }}">
    <link rel="stylesheet" href="{{ asset('client/assets/webfontkit-gilroy/stylesheet.css') }}">
    <link rel="stylesheet" href="{{ asset('client/assets/css/glider.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('client/assets/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('client/assets/css/owl.theme.default.min.css') }}">
    <script src="{{ asset('client/assets/js/javascript.js') }}" defer></script>

    <style>
            .navbar-links .men{
                text-decoration: none;
                color: white;
            }
            .navbar-links .men:hover{
                text-decoration: none;
                color: rgb(212, 209, 209);
            }
            .btn-login{
                background-color: #c2c2c2;
                color: #082D28;
                font-weight: bold;
            }
            .btn-login:hover{
                background-color: #ffffff;
                color: #035045;
            }
            .btn-blue {
                background-color: #0F52BA;
                color: white;
                font-weight: 600;
                font-size: 16px;
                border-radius: 12px;
                margin-top: 48px;
            }
    </style>
</head>

<body>
    <!-----Header Nav Bar Starts-->
    <nav class="navbar">
        <div class="brand-title">Mebelku</div>
        <a href="#" class="toggle-button">
            <span class="bar"></span>
            <span class="bar"></span>
            <span class="bar"></span>
        </a>
        <div class="navbar-links">
            <ul>
                <li><a href="#home" class="men">Home</a></li>
                <li><a href="#product" class="men">Produk</a></li>
                <li><a href="#glider-best" class="men">Produk Terbaik</a></li>
                <li><a href="#experience" class="men">Tentang Kami</a></li>
                @guest
                <li><a href="{{ url('login') }}" class="btn btn-login">Login</a> </li>
                @endguest
                @auth
                <li class="nav-item">
                    <form action="{{ url('logout') }}" method="POST">
                        @csrf
                        <button class="btn btn-login" type="submit">
                            Logout
                        </button>
                    </form>
                    {{-- <a href="{{ url('logout') }}" class="btn btn-login">LOGOUT</a> --}}
                </li>
                @endauth
            </ul>
        </div>
    </nav>
    <!-----Header Nav Bar Ends Here-->

    <!-----Home Section Starts-->
    <home class="home" id="home">
        <section class="title" id="title">
           Buat Ruangan Anda Makin Minimalis dan Modern
        </section>
        <section class="subtitle" id="subtitle">
            Ubah ruangan Anda menjadi lebih minimalis dan modern <br> dengan mudah
        </section>
    </home>
    <!-----Home Section Ends Here-->

    <!---BODY CONTENT STARTS HERE-->
    <section class="content" id="content" name="content">

        <!--Product Slider Section Starts-->
        <div class="product-slider" id="product" style="margin-top: -50px;">
            <div class="product-slider-title" id="product-slider-title" style="justify-content: space-evenly;
            align-items: baseline;">
                <span>
                    Eksplor Produk Kami
                </span>
            </div>
            <div class="batten text-end">
                @auth
                    <a href="{{ url('dashboard/'. Auth::user()->id ) }}" class="btn btn-blue px-5 py-3 mt-0">Lebih Lanjut</a>
                @endauth
                @guest
                    <a href="{{ url('login') }}" class="btn btn-blue px-4 py-2 mt-0">Lebih Lanjut</a>

                @endguest
            </div>
            <div class="glider-contain">
                <div class="glider" id="glider">
                    @foreach ($products as $item)
                    <div class="product-card" id="product-card">
                        <div class="product-img" id="product-img">
                            <img src="{{ Storage::url($item->images) }}" alt="armchair">
                        </div>

                        <div class="product-card-bottom" id="product-card-bottom" style="text-align: center">
                            <div class="product-title" id="product-title">
                                {{ $item->name }}
                            </div>
                            <div class="star-rating" id="star-rating">
                                <span class="price-text">Stok: {{ $item->stok }}</span>
                            </div>
                            <div class="product-price" id="product-price">
                                <span class="price-text">Rp. {{ number_format($item->price) }}</span>
                            </div>

                        </div>
                    </div>
                    @endforeach
                </div>

                <button aria-label="Previous" class="glider-prev">
                    <div class="circle-chevron" id="circle-chevron">
                        <i class="fa fa-chevron-left"></i>
                    </div>
                </button>
                <button aria-label="Next" class="glider-next">
                    <div class="circle-chevron" id="circle-chevron">
                        <i class="fa fa-chevron-right"></i>
                    </div>
                </button>
                <div role="tablist" class="dots"></div>
            </div>
        </div>

        <!---Product Slider Section Ends-->

        <!--Best Product Slider Section Starts-->
        <div class="product-slider" id="product-slider best" style="margin-top: -20px;">
            <div class="product-slider-title" id="product-slider-title">
                Produk Terbaik
            </div>
            <div class="glider-contain">
                <div class="glider-best" id="glider-best">
                    @foreach ($terjual as $jual)
                    <div class="product-card" id="product-card">
                        <div class="product-img" id="product-img">
                            <img src="{{ Storage::url($jual->product->images) }}" alt="armchair">
                        </div>

                        <div class="product-card-bottom" id="product-card-bottom">
                            <div class="product-title" id="product-title">
                                {{ $jual->product->name }}
                            </div>
                            <div class="star-rating" id="star-rating">
                                <span class="price-text">Terjual: {{ $terjuals }}</span>
                            </div>
                            <div class="product-price" id="product-price">
                                <span class="price-text">Rp. {{ number_format($jual->product->price) }}</span>
                            </div>

                        </div>
                    </div>

                    @endforeach

                </div>

                <button aria-label="Previous" class="glider-prev-best">
                    <div class="circle-chevron" id="circle-chevron">
                        <i class="fa fa-chevron-left"></i>
                    </div>
                </button>
                <button aria-label="Next" class="glider-next-best">
                    <div class="circle-chevron" id="circle-chevron">
                        <i class="fa fa-chevron-right"></i>
                    </div>
                </button>
                <div role="tablist" class="dots-best"></div>
            </div>
        </div>

        <!---Best Product Slider Section Ends-->

        <!----Experience Section Starts--->
        <div class="experience" id="experience">
            <div class="exp-img" id="exp-img">

                <div class="exp-img-left" id="exp-img-left">
                    <img src="{{ asset('client/assets/images/exp-img.jpg') }}" alt="exp img">
                    <div class="back-grey1" id="back-grey1">

                    </div>
                    <div class="back-grey2" id="backgrey2">

                    </div>
                    <div class="back-grey3" id="backgrey3">

                    </div>
                </div>
            </div>
            <div class="exp-text" id="exp-text">
                <p class="experiences">Experiences</p>
                <p class="why-title">We provide you <br>the best experience</p>
                <p class="column-sub2">You don’t have to worry about the result because all of these interiors are made
                    by people who are professionals in their fields with an elegant and lucurious style and with premium
                    quality materials</p>
            </div>
        </div>
        <!----Experience Section Ends-->
    </section>
    <!-----BODY CONTENT ENDS HERE-->

    <!---js-script for Product Slider codes starts------->
    <script src="{{ asset('client/assets/js/glider.js') }}"></script>

    <script>
        new Glider(document.querySelector('.glider'), {
            slidesToScroll: 1,
            slidesToShow: 4,
            responsive: [
            {
                    // If Screen Size More than 768px
                    breakpoint: 0,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1,
                        duration: 0.5,
                        arrows: {
                            prev: ".glider-prev",
                            next: ".glider-next"
                        }
                    }
                },
            {
                    // If Screen Size More than 768px
                    breakpoint: 768,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 1,
                        duration: 0.5,
                        arrows: {
                            prev: ".glider-prev",
                            next: ".glider-next"
                        }
                    }
                },
                {
                    // If Screen Size More than 1024px
                    breakpoint: 1024,
                    settings: {
                        slidesToShow: 4,
                        slidesToScroll: 1,
                        duration: 0.5,
                        arrows: {
                            prev: ".glider-prev",
                            next: ".glider-next"
                        }
                    }
                }
            ],
            draggable: true,
            dots: '.dots',
            arrows: {
                prev: '.glider-prev',
                next: '.glider-next'
            }
        });
    </script>
    <script>
        new Glider(document.querySelector('.glider-best'), {
            slidesToScroll: 1,
            slidesToShow: 4,
            responsive: [
            {
                    // If Screen Size More than 768px
                    breakpoint: 0,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1,
                        duration: 0.5,
                        arrows: {
                            prev: ".glider-prev-best",
                            next: ".glider-next-best"
                        }
                    }
                },
            {
                    // If Screen Size More than 768px
                    breakpoint: 768,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 1,
                        duration: 0.5,
                        arrows: {
                            prev: ".glider-prev-best",
                            next: ".glider-next-best"
                        }
                    }
                },
                {
                    // If Screen Size More than 1024px
                    breakpoint: 1024,
                    settings: {
                        slidesToShow: 4,
                        slidesToScroll: 1,
                        duration: 0.5,
                        arrows: {
                            prev: ".glider-prev-best",
                            next: ".glider-next-best"
                        }
                    }
                }
            ],
            draggable: true,
            dots: '.dots-best',
            arrows: {
                prev: '.glider-prev-best',
                next: '.glider-next-best'
            }
        });
    </script>
    <!-----js-script for Product Slider code ends------>

    <!---Testimonial JavaScript Code starts-->
    <script src="{{ asset('client/assets/js/jquery.js') }}"></script>
    <script src="{{ asset('client/assets/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('client/assets/js/owl-script.js') }}"></script>


    <!----Testimonial JavaScript Code Ends-->

    <!-----Footer Section stars here-->
    <footer>
        <section>
            <div class="footer-bar" id="footer-bar">
                <div class="col1" id="logo-text">
                    <h1>Mebelku</h1>
                    <p>The advantage of hiring a workspace with <br> us is that givees you comfortable service <br> and
                        all-around
                        facilities.
                    </p>
                </div>
                <div class="col2" id="services">
                    <h3 class="footer-orange">Partner</h3>
                    <p class="footer-text-list">Raja Ongkir</p>
                    <p class="footer-text-list">Midtrans</p>
                    <p class="footer-text-list">Mailtrap</p>

                </div>
                <div class="col2" id="follow-us">
                    <h3 class="footer-orange">Ikuti Kami</h3>
                    <p class="footer-text-list">
                        <span><i class="fa fa-facebook">&nbsp;&nbsp;</i></span>
                        <span>Facebook</span>
                    </p>
                    <p class="footer-text-list">
                        <span><i class="fa fa-twitter"></i>&nbsp;</span>
                        <span>Twitter</span>
                    </p>
                    <p class="footer-text-list">
                        <span><i class="fa fa-instagram"></i>&nbsp;&nbsp;</span>
                        <span>Instagram</span>
                    </p>
                </div>
            </div>
            <!-- <div class="copyright" id="copyright">
                <div class="copy-text">
                    Komron-Mirzo | &copy; Copyright 2022
                </div>
                <div class="terms-text">
                    Terms & Conditions &emsp; &emsp; &emsp; Policy Privacy
                </div>
            </div> -->
        </section>
    </footer>
    <!-----Footer Section Ends Here-->
</body>

</html>
