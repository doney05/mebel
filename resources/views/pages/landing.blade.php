<!DOCTYPE html>
  <html lang="en">
    <head>
      <meta charset="UTF-8" />
      <meta name="viewport" content="width=device-width, initial-scale=1.0" />
      <title>Furniture </title>
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    </head>
    <body>
       <!-- START: HEADER -->
    <section class="header-workly">
        <style scoped>
            @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap");

            * {
                font-family: 'Poppins', 'Inter', sans-serif !important;
            }

            body nav .navbar-brand h5 {
                font-weight: 700 !important;
                size: 24px !important;
                line-height: 150%;
            }

            body nav .navbar-nav .nav-link {
                font-size: 16px;
                font-weight: 400;
                color: white !important;
            }

            body .header {
                background: radial-gradient(100% 100% at 0% 0%, #114E4E 0%, #052D2D 59.9%, #041111 89.53%, #000909 100%);
                min-height: 100vh;
            }

            body .tag-line .headline {
                font-size: 48px !important;
                line-height: 125%;
                font-weight: 600;
                margin-bottom: 20px;
            }

            @media only screen and (min-width: 768px) {
                body .tag-line {
                    padding-top: 100px;
                }

                body .tag-line .headline {
                    font-size: 68px !important;
                    line-height: 125%;
                    font-weight: 600;
                    margin-bottom: auto;
                }

                body .tag-line p {
                    padding-top: 24px;
                    font-size: 24px;
                    font-weight: 400;
                    line-height: 150%;
                }
            }

            body .btn-started {
                margin-top: 60px;
            }

            @media only screen and (min-width: 768px) {
                body .btn-started {
                    margin-top: 116px !important;
                }
            }

            @media only screen and (min-width: 1000px) {
                .ms-navbar-menu {
                    margin-left: 185px;
                }

                body .tag-line {
                    max-width: 70%;
                }

                body .tag-line p {
                    width: 85%;
                }
            }

            body .btn-started a {
                font-size: 24px;
                background-color: #c2c2c2;
                color: #082D28;
                margin-right: 10px;
                font-weight: bold;
            }
            body .btn-started a:hover {
                background-color: #ffffff;
                color: #035045;
            }
            .nav-item .btn-login{
                background-color: #c2c2c2;
                color: #082D28;
                margin-right: 10px;
                font-weight: bold;
            }
            .nav-item button{
                background-color: #c2c2c2;
                color: #082D28;
                margin-right: 10px;
                font-weight: bold;
            }
            .nav-item .btn-login:hover{
                background-color: #ffffff;
                color: #035045;
            }
            body .cl-light {
                color: #EEEEEE;
            }

            body .cl-light-grey-2 {
                color: #90BCB7;
            }

            body .font-lora {
                font-family: 'Lora', sans-serif !important;
            }

            .bg-workly {
                height: 780px;
                max-width: 442px;
                position: absolute;
                right: 0;
                top: 0;
            }
        </style>
        <div class="header navbar-light overflow-hidden container-fluid position-relative">
            <div class="container">
                <!-- Navbar -->
                <nav class="navbar navbar-expand-lg pt-lg-4">
                    <div class="container">
                        <a class="navbar-brand" href="#">
                            <img src="https://api.elements.buildwithangga.com/storage/files/2/assets/Header/Header-workly/Logo.svg"
                                alt="logo" class="img-fluid" />
                        </a>
                        <button class="navbar-toggler navbar-dark" type="button" data-bs-toggle="collapse"
                            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse mt-4 mt-lg-0" id="navbarSupportedContent">
                            <ul class="navbar-nav ms-navbar-menu gap-3 gap-lg-5">
                                <li class="nav-item active">
                                    <a class="nav-link active" aria-current="page" href="#">HOME</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#pl-house">PRODUCT</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#page-footer">PARTNER</a>
                                </li>
                                @guest
                                <li class="nav-item">
                                    <a href="{{ url('login') }}" class="btn btn-login">LOGIN</a>
                                </li>
                                @endguest
                                @auth
                                <li class="nav-item">
                                    <form action="{{ url('logout') }}" method="POST">
                                        @csrf
                                        <button class="btn btn-login" type="submit">
                                            LOGOUT
                                        </button>
                                    </form>
                                    {{-- <a href="{{ url('logout') }}" class="btn btn-login">LOGOUT</a> --}}
                                </li>
                                @endauth
                            </ul>
                        </div>
                    </div>
                </nav>
                <div class="my-3 tag-line">
                    <div class="cl-light headline">
                        Kata Katane Mang
                    </div>
                    <p class="cl-light-grey-2">
                        Dapatkan produk yang Anda sukai dengan pilihan yang disediakan
                    </p>
                    <div class="btn-started">
                        <a href="#pl-house" class="btn px-5 py-3">Get started</a>
                    </div>
                </div>

                <img src="https://api.elements.buildwithangga.com/storage/files/2/assets/Header/Header-workly/img-header.png"
                    alt="background-head" class="d-none d-lg-block bg-workly" />
            </div>
        </div>
    </section>
    <!-- END: HEADER --><section class="explore">
    <style scoped>
        @import url("https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap");

        * {
            font-family: 'Inter', sans-serif !important;
        }

        @media screen and (min-width: 768px) {
            body .pl-house {
                margin: 0 !important;
                padding-left: 100px;
            }
        }

        @media screen and (max-width: 768px) {
            body .pl-house {
                margin: 0 10px 0 5px !important;
            }
        }

        body .explore {
            background: radial-gradient(100% 100% at 0% 0%, #114E4E 0%, #052D2D 59.9%, #041111 89.53%, #000909 100%);
            padding-top: 100px;
            padding-bottom: 50px;
        }

        @media screen and (max-width: 768px) {
            body .explore {
                padding-top: 50px;
                padding-bottom: 50px;
            }
        }

        body .explore .descript-explore {
            max-width: 75%;
        }

        body .scrolling-wrapper {
            overflow-x: auto;
        }

        body .section::-webkit-scrollbar {
            height: 0 !important;
        }

        body .section::-webkit-scrollbar-track {
            background-color: #e4e4e4;
            border-radius: 100px;
        }

        body .section::-webkit-scrollbar-thumb {
            background-color: #05BB2D;
            border-radius: 100px;
        }

        body .cl-blue {
            color: #0F52BA !important;
        }

        body .btn-blue {
            background-color: #0F52BA;
            color: white;
            font-weight: 600;
            font-size: 16px;
            border-radius: 12px;
            margin-top: 48px;
        }

        body .text-content h1 {
            font-size: 60px !important;
            line-height: 150%;
            color: white;
        }

        body .text-content p {
            font-size: 16px;
            color: #ADB2B8;
            font-weight: 400;
            line-height: 28px;
            padding-bottom: 108px;
        }

        body .title h1 {
            font-size: 72px;
            font-weight: 700;
            line-height: 150%;
        }

        @media screen and (max-width: 768px) {
            body .title h1 {
                font-size: 48px;
            }
        }

        body .section::-webkit-scrollbar {
            height: 0 !important;
        }

        body .section::-webkit-scrollbar-track {
            background-color: #e4e4e4;
            border-radius: 100px;
        }

        body .section::-webkit-scrollbar-thumb {
            background-color: #05BB2D;
            border-radius: 100px;
        }

        body .img-explore {
            height: 600px;
            padding: 0;
        }

        @media only screen and (max-width: 768px) {
            body .img-explore {
                height: 300px;
            }
        }

        body .img-explore img {
            width: 452px !important;
            height: 100%;
            -o-object-fit: cover;
            object-fit: cover;
            border-radius: 24px;
            margin-right: 72px;
        }

        @media only screen and (max-width: 768px) {
            body .img-explore img {
                width: 226px !important;
            }
        }
    </style>
    <div class="pl-house" id="pl-house">
        <div class="row text-content title pt-35 my-0 mx-0" id="header">
            <div class="col-md-9 px-md-0">
                <h1 class="pb-3">
                    Eksplor produk kami
                </h1>
                <p class="pb-0 descript-explore">
                    Berbagai macam produk mebel kami sediakan untuk Anda
                </p>
            </div>
            <div class="col-md-3 mt-md-3">
                @auth
                    <a href="{{ url('dashboard/'. Auth::user()->id ) }}" class="btn btn-blue px-5 py-3 mt-0">Learn More</a>
                @endauth
                @guest
                    <a href="{{ url('login') }}" class="btn btn-blue px-5 py-3 mt-0">Learn More</a>

                @endguest
            </div>
        </div>
        <div class="row section scrolling-wrapper flex-row flex-nowrap mt-3 img-explore mx-2">
            <img src="https://api.elements.buildwithangga.com/storage/files/2/assets/Content/Content-House/image-1.jpeg"
                alt="image-1" class="img-fluid">
            <img src="https://api.elements.buildwithangga.com/storage/files/2/assets/Content/Content-House/image-2.jpeg"
                alt="image-2" class="img-fluid">
            <img src="https://api.elements.buildwithangga.com/storage/files/2/assets/Content/Content-House/image-3.jpeg"
                alt="image-3" class="img-fluid">
        </div>
    </div>
</section>
  <footer class="page-footer font-small blue py-5 text-white" id="page-footer">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
        integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns"
        crossorigin="anonymous"></script>
    <style>
        @import url("https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap");

        * {
            font-family: 'Inter', sans-serif !important;
        }

        body footer {
            background: radial-gradient(100% 100% at 0% 0%, #114E4E 0%, #052D2D 59.9%, #041111 89.53%, #000909 100%);
        }
        body .famouly-brands-darken {
            min-height: 30vh;
        }
        body footer p {
            font-size: 20px;
            color: #ADB2B8;
        }

        @media screen and (min-width: 768px) {
            body footer .container-fluid {
                padding-left: 80px;
            }
        }

        body footer li {
            margin-bottom: 12px;
        }

        body footer li a {
            color: #ADB2B8;
            font-size: 20px;
            font-weight: 400 !important;
        }
    </style>
       <div class="container famouly-brands-darken">
        <div class="row brand">
          <div class="col-md-3 col-6 text-center my-md-auto">
            <img
              src="https://api.elements.buildwithangga.com/storage/files/2/assets/Content/Content10/dark/Slack-Logo.png"
              alt="" class="img-fluid">
          </div>
          <div class="col-md-3 col-6 text-center my-md-auto">
            <img
              src="https://api.elements.buildwithangga.com/storage/files/2/assets/Content/Content10/dark/Microsoft-Logo.png"
              alt="" class="img-fluid">
          </div>
          <div class="col-md-3 col-6 text-center my-md-auto mt-5 mt-md-0">
            <img
              src="https://api.elements.buildwithangga.com/storage/files/2/assets/Content/Content10/dark/Google-Logo.png"
              alt="" class="img-fluid">
          </div>
          <div class="col-md-3 col-6 text-center my-md-auto mt-5 mt-md-0">
            <img
              src="https://api.elements.buildwithangga.com/storage/files/2/assets/Content/Content10/dark/Airbnb-Logo.png"
              alt="" class="img-fluid">
          </div>
        </div>
      </div>
    <div class="container-fluid text-md-left">
        <div class="row">
            <div class="col-md-5 mt-md-0 mt-3">
                <h3 class="font-weight-bold mb-4">Alamat Kami</h3>
                <p class="mb-2">
                    Kudus
                </p>
                <p>
                    +62 822 0932 3824
                </p>
            </div>
            <hr class="clearfix w-100 d-md-none pb-3">
            <div class="row col-md-7 justify-content-center">
                <div class="col-md-4 col-sm-6 mb-md-0 mb-3">
                    <p class="text-white font-weight-bold mb-4">
                        Partners
                    </p>
                    <ul class="list-unstyled">
                        <li>
                            <p href="#!">Ekspedisi</p>
                        </li>
                        <li>
                            <p href="#!">Payment Gateway</p>
                        </li>
                    </ul>
                </div>
                {{-- <div class="col-md-4 col-sm-6 mb-md-0 mb-3">
                    <p class="text-white font-weight-bold mb-4">
                        Recommendation
                    </p>
                    <ul class="list-unstyled">
                        <li>
                            <a href="#!">Homestays</a>
                        </li>
                        <li>
                            <a href="#!">Villas</a>
                        </li>
                    </ul>
                </div>
                <div class="col-md-4 col-sm-6 mb-md-0 mb-3">
                    <p class="text-white font-weight-bold mb-4">
                        About Us
                    </p>
                    <ul class="list-unstyled">
                        <li>
                            <a href="#!">Blog</a>
                        </li>
                        <li>
                            <a href="#!">Career</a>
                        </li>
                        <li>
                            <a href="#!">Our values</a>
                        </li>
                    </ul>
                </div> --}}
            </div>
        </div>
    </div>
</footer>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
    </body>
  </html>
