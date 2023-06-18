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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.css" integrity="sha512-wR4oNhLBHf7smjy0K4oqzdWumd+r5/+6QO/vDda76MW5iug4PT7v86FoEkySIJft3XA0Ae6axhIvHrqwm793Nw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    {{-- // Add the new slick-theme.css if you want the default styling --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.css" integrity="sha512-6lLUdeQ5uheMFbWm3CP271l14RsX1xtx+J5x2yeIDkkiBpeVTNhTqijME7GgRKKi6hCqovwCoBTlRBEC20M8Mg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
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
        <div class="brand-title" style="width: 20%; font-size: 20px">
            <img src="{{ asset('client/assets/images/logo.png') }}" alt="" style="width:20%;"> Murah Prima Furniture
        </div>
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
        <div class="product-slider" id="product" style="margin-top: -107px;">
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
        <div class="product-slider" id="product-slider best" style="    margin-top: -250px; height: 90vh">
            <div class="product-slider-title" id="product-slider-title">
                Review Ulasan
            </div>
            {{-- <div class="row"> --}}
                <div class="multiple-items">
                    <div class="card mx-3" style="border-radius: 10px">
                        <div class="card-body">
                            <div class="images d-flex justify-content-center">
                                <img src="{{ asset('client/assets/img/review/profile.png') }}" alt="" class="rounded-circle" style="width: 20%; border: 3px solid red;">
                            </div>
                            <div class="name text-center mt-3">
                                <h5>Customer Review</h5>
                                <p>"Lorem ipsum, dolor sit amet consectetur adipisicing elit. Assumenda reprehenderit unde at, temporibus asperiores quae necessitatibus doloremque. Nesciunt laudantium, facere cum dignissimos vero incidunt dolor, dolores sunt optio culpa accusamus?"</p>
                            </div>
                        </div>
                    </div>
                    <div class="card mx-3" style="border-radius: 10px">
                        <div class="card-body">
                            <div class="images d-flex justify-content-center">
                                <img src="{{ asset('client/assets/img/review/man (1).png') }}" alt="" class="rounded-circle" style="width: 20%; border: 3px solid red;">
                            </div>
                            <div class="name text-center mt-3">
                                <h5>Customer Review</h5>
                                <p>"Lorem ipsum, dolor sit amet consectetur adipisicing elit. Assumenda reprehenderit unde at, temporibus asperiores quae necessitatibus doloremque. Nesciunt laudantium, facere cum dignissimos vero incidunt dolor, dolores sunt optio culpa accusamus?"</p>
                            </div>
                        </div>
                    </div>
                    <div class="card mx-3" style="border-radius: 10px">
                        <div class="card-body">
                            <div class="images d-flex justify-content-center">
                                <img src="{{ asset('client/assets/img/review/man.png') }}" alt="" class="rounded-circle" style="width: 20%; border: 3px solid red;">
                            </div>
                            <div class="name text-center mt-3">
                                <h5>Customer Review</h5>
                                <p>"Lorem ipsum, dolor sit amet consectetur adipisicing elit. Assumenda reprehenderit unde at, temporibus asperiores quae necessitatibus doloremque. Nesciunt laudantium, facere cum dignissimos vero incidunt dolor, dolores sunt optio culpa accusamus?"</p>
                            </div>
                        </div>
                    </div>
                    <div class="card mx-3" style="border-radius: 10px">
                        <div class="card-body">
                            <div class="images d-flex justify-content-center">
                                <img src="{{ asset('client/assets/img/review/woman.png') }}" alt="" class="rounded-circle" style="width: 20%; border: 3px solid red;">
                            </div>
                            <div class="name text-center mt-3">
                                <h5>Customer Review</h5>
                                <p>"Lorem ipsum, dolor sit amet consectetur adipisicing elit. Assumenda reprehenderit unde at, temporibus asperiores quae necessitatibus doloremque. Nesciunt laudantium, facere cum dignissimos vero incidunt dolor, dolores sunt optio culpa accusamus?"</p>
                            </div>
                        </div>
                    </div>
                    <div class="card mx-3" style="border-radius: 10px">
                        <div class="card-body">
                            <div class="images d-flex justify-content-center">
                                <img src="{{ asset('client/assets/img/review/leprechaun.png') }}" alt="" class="rounded-circle" style="width: 20%; border: 3px solid red;">
                            </div>
                            <div class="name text-center mt-3">
                                <h5>Customer Review</h5>
                                <p>"Lorem ipsum, dolor sit amet consectetur adipisicing elit. Assumenda reprehenderit unde at, temporibus asperiores quae necessitatibus doloremque. Nesciunt laudantium, facere cum dignissimos vero incidunt dolor, dolores sunt optio culpa accusamus?"</p>
                            </div>
                        </div>
                    </div>
                </div>
            {{-- </div> --}}
            {{-- <div class="glider-contain">
                <div class="glider-best" id="glider-best">
                    <div class="product-card" id="product-card">
                        <div class="product-img" id="product-img">
                            <img src="{{ asset('client/assets/images/logo.png') }}" alt="armchair">
                        </div>

                        <div class="product-card-bottom" id="product-card-bottom">
                            <div class="product-title" id="product-title">
                                Customer Review
                            </div>

                            <div class="product-price" id="product-price">
                                <p class="price-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Non libero earum laudantium alias accusamus, vero cum nostrum accusantium quasi eaque tempore, corrupti voluptate eveniet quos quam expedita fugiat. Illo, enim!</p>
                            </div>

                        </div>
                    </div>
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
            </div> --}}
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

    <!---Testimonial JavaScript Code starts-->
    {{-- <script src="{{ asset('client/assets/js/jquery.js') }}"></script> --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.js" integrity="sha512-8Z5++K1rB3U+USaLKG6oO8uWWBhdYsM3hmdirnOEWp8h2B1aOikj5zBzlXs8QOrvY9OxEnD2QDkbSKKpfqcIWw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.slim.js" integrity="sha512-JC/KiiKXoc40I1lqZUnoRQr96y5/q4Wxrq5w+WKqbg/6Aq0ivpS2oZ24x/aEtTRwxahZ/KOApxy8BSZOeLXMiA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js" integrity="sha512-XtmMtDEcNz2j7ekrtHvOVR4iwwaD6o/FUJe6+Zq+HgcCsk3kj4uSQQR8weQ2QVj1o0Pk6PwYLohm206ZzNfubg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="{{ asset('client/assets/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('client/assets/js/owl-script.js') }}"></script>
    {{-- <script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
    <script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script> --}}


    <!----Testimonial JavaScript Code Ends-->

    <script>
         $(document).ready(function () {
            $('.multiple-items').slick({
                dots: true,
                infinite: false,
                speed: 300,
                slidesToShow: 4,
                slidesToScroll: 4,
                responsive: [
                    {
                    breakpoint: 1024,
                    settings: {
                        slidesToShow: 3,
                        slidesToScroll: 3,
                        infinite: true,
                        dots: true
                    }
                    },
                    {
                    breakpoint: 600,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 2
                    }
                    },
                    {
                    breakpoint: 480,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1
                    }
                    }
                    // You can unslick at a given breakpoint now by adding:
                    // settings: "unslick"
                    // instead of a settings object
                ]
                });
        })
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

    <script type="text/javascript">

        // new Glider(document.querySelector('.glider-best'), {
        //     slidesToScroll: 1,
        //     slidesToShow: 4,
        //     responsive: [
        //     {
        //             // If Screen Size More than 768px
        //             breakpoint: 0,
        //             settings: {
        //                 slidesToShow: 1,
        //                 slidesToScroll: 1,
        //                 duration: 0.5,
        //                 arrows: {
        //                     prev: ".glider-prev-best",
        //                     next: ".glider-next-best"
        //                 }
        //             }
        //         },
        //     {
        //             // If Screen Size More than 768px
        //             breakpoint: 768,
        //             settings: {
        //                 slidesToShow: 2,
        //                 slidesToScroll: 1,
        //                 duration: 0.5,
        //                 arrows: {
        //                     prev: ".glider-prev-best",
        //                     next: ".glider-next-best"
        //                 }
        //             }
        //         },
        //         {
        //             // If Screen Size More than 1024px
        //             breakpoint: 1024,
        //             settings: {
        //                 slidesToShow: 4,
        //                 slidesToScroll: 1,
        //                 duration: 0.5,
        //                 arrows: {
        //                     prev: ".glider-prev-best",
        //                     next: ".glider-next-best"
        //                 }
        //             }
        //         }
        //     ],
        //     draggable: true,
        //     dots: '.dots-best',
        //     arrows: {
        //         prev: '.glider-prev-best',
        //         next: '.glider-next-best'
        //     }
        // });
    </script>
    <!-----js-script for Product Slider code ends------>


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
