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
            .navbar {
                top: 2%;
                background-color: transparent;
                display: flex;
                width: 90%;
                margin: auto 5%;
                justify-content: space-between;
                overflow: hidden;
                align-items: center;
                position: absolute;
            }

            .navbar-links .men{
                text-decoration: none;
                color: white;
            }
            .navbar .brand-title{
                width: 20%;
                font-size: 20px;
            }
            .navbar .brand-title img{
                width: 20%;
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
            .product-slider {
                margin-top: 90px;
                height: 830px;
                width: 100%;
                padding-left: 5%;
                padding-right: 5%;
                background-color: #F7F7F7;
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
            .ulasan{
                   margin-top: -250px;
                   height: 95vh
            }
            @media screen and (max-width: 1455px)
            {
                .navbar .brand-title{
                    width: 25%;
                    font-size: 20px;
                }
            }
            @media screen and (max-width: 1350px)
            {
                .home .title {
                    margin: auto 14%;
                    color: #fff;
                    font-size: 71px;
                    text-align: center;
                    text-transform: capitalize;
                    font-family: 'gilroy-bold';
                }
            }
            @media screen and (max-width: 1230px)
            {
                 .navbar .brand-title{
                    width: 25%;
                    font-size: 18px;
                }
                .home .title {
                    margin: auto 14%;
                    color: #fff;
                    font-size: 61px;
                    text-align: center;
                    text-transform: capitalize;
                    font-family: 'gilroy-bold';
                }
                .exp-text {
                    width: 50%;
                    margin-left: 15%;
                }
            }
            @media screen and (max-width: 1280px)
            {
                .ulasan {
                    margin-top: -184px;
                    height: 83vh;
                }
            }
            @media screen and (max-width: 1190px)
            {
                 .exp-text {
                    width: 50%;
                    margin-left: 25%;
                }
                .why-title {
                    font-size: 35px;
                    font-family: 'gilroy-bold';
                    color: #1e1e1e;
                    vertical-align: middle;
                    text-transform: capitalize;
                }
                .experiences {
                    letter-spacing: 3px;
                    font-size: 16px;
                    color: #E58411;
                    text-transform: uppercase;
                    font-family: 'gilroy-medium';
                }
                .column-sub2 {
                    font-size: 16px;
                    color: #1e1e1e;
                    opacity: 0.8;
                    line-height: 185%;
                    font-family: 'gilroy-regular';
                    padding-right: 15%;
                }
            }
            @media screen and (max-width: 1060px)
            {
                 .home {
                        padding-top: 16%;
                        width: 100%;
                        height: 780px;
                        background-position: center;
                        margin-bottom: 75px;
                    }
                .home .title {
                    margin: auto 14%;
                    color: #fff;
                    font-size: 50px;
                    text-align: center;
                    text-transform: capitalize;
                    font-family: 'gilroy-bold';
                }
                .subtitle {
                    margin: 1% 14%;
                    color: #fff;
                    font-size: 19px;
                    text-align: center;
                    font-family: 'gilroy-thin';
                    line-height: 35px;
                    opacity: 0.8;
                }

                .navbar .brand-title {
                    width: 25%;
                    font-size: 17px;
                }
                .navbar .navbar-links ul li {
                    display: inline-block;
                    font-size: 14px;
                    font-family: 'gilroy-light';
                    color: #fff;
                    justify-content: space-between;
                    padding: 0px 20px;
                    font-weight: 100;
                }
                .exp-text {
                    width: 50%;
                    margin-left: 35%;
                }
                .experiences {
                    letter-spacing: 3px;
                    font-size: 16px;
                    color: #E58411;
                    text-transform: uppercase;
                    font-family: 'gilroy-medium';
                }
                .why-title {
                    font-size: 31px;
                    font-family: 'gilroy-bold';
                    color: #1e1e1e;
                    vertical-align: middle;
                    text-transform: capitalize;
                }
                .column-sub2 {
                    font-size: 15px;
                    color: #1e1e1e;
                    opacity: 0.8;
                    line-height: 185%;
                    font-family: 'gilroy-regular';
                    padding-right: 15%;
                }
                .product-slider-title {
                    padding-top: 45px;
                    padding-bottom: 45px;
                    font-size: 30px;
                    text-align: center;
                    color: #1e1e1e;
                    font-family: 'gilroy-bold';
                }
                .ulasan {
                    margin-top: -375px;
                    height: 100vh;
                }
                footer {
                    margin-top: 11%;
                    height: 306px;
                    background-color: #f7f7f7;
                    padding: 10% 10% 3% 13%;
                }
            }
            @media screen and (max-width: 1024px)
            {
                .ulasan {
                    margin-top: -200px;
                    height: 100vh;
                }
            }
            @media screen and (max-width: 992px)
            {
                .navbar .brand-title {
                    width: 27%;
                    font-size: 16px;
                }
                .btn {
                    font-size: 14px;
                }
                .exp-img-left img {
                    width: 553px;
                    margin-left: -30px;
                    height: 445px;
                    border-radius: 20px;
                    position: absolute;
                    z-index: 4;
                }
                .back-grey2 {
                    width: 495px;
                    height: 301px;
                    margin-top: 72px;
                    margin-left: 112px;
                    background-color: #f7f7f7;
                    border-radius: 20px;
                    position: absolute;
                    z-index: 2;
                }
                .back-grey3 {
                    width: 555px;
                    height: 423px;
                    margin-top: 52px;
                    margin-left: -16px;
                    background: url(../images/exp-img.jpg);
                    border-radius: 20px;
                    position: absolute;
                    z-index: 3;
                    filter: blur(25px);
                    opacity: 0.5;
                }
                .why-title {
                    font-size: 25px;
                    font-family: 'gilroy-bold';
                    color: #1e1e1e;
                    vertical-align: middle;
                    text-transform: capitalize;
                }
                .column-sub2 {
                    font-size: 13px;
                    color: #1e1e1e;
                    opacity: 0.8;
                    line-height: 185%;
                    font-family: 'gilroy-regular';
                    padding-right: 15%;
                }
            }
            @media screen and (max-width: 920px)
            {
                .exp-text {
                    width: 50%;
                    margin-left: 39%;
                }
            }
            @media screen and (max-width: 912px)
            {
                .navbar {
                    top: 2%;
                    background-color: transparent;
                    display: flex;
                    width: 90%;
                    margin: auto 5%;
                    justify-content: space-between;
                    overflow: hidden;
                    align-items: center;
                    position: absolute;
                }
                .ulasan {
                    margin-top: -72px;
                    height: 39vh;
                }
            }
            @media screen and (max-width: 885px)
            {
                .navbar .brand-title {
                    width: 29%;
                    font-size: 16px;
                }
                .navbar .navbar-links ul li {
                    display: inline-block;
                    font-size: 14px;
                    font-family: 'gilroy-light';
                    color: #fff;
                    justify-content: space-between;
                    padding: 0px 14px;
                    font-weight: 100;
                }
                .exp-img-left img {
                    width: 540px;
                    margin-left: -30px;
                    height: 445px;
                    border-radius: 20px;
                    position: absolute;
                    z-index: 4;
                }
                .back-grey2 {
                    width: 495px;
                    height: 301px;
                    margin-top: 72px;
                    margin-left: 90px;
                    background-color: #f7f7f7;
                    border-radius: 20px;
                    position: absolute;
                    z-index: 2;
                }
            }
            @media screen and (max-width: 865px)
            {
                .home {
                    padding-top: 16%;
                    width: 100%;
                    height: 640px;
                    background-position: center;
                    margin-bottom: 75px;
                }
                .home .title {
                    margin: auto 14%;
                    color: #fff;
                    font-size: 44px;
                    text-align: center;
                    text-transform: capitalize;
                    font-family: 'gilroy-bold';
                }
                .navbar .navbar-links ul li {
                    display: inline-block;
                    font-size: 14px;
                    font-family: 'gilroy-light';
                    color: #fff;
                    justify-content: space-between;
                    padding: 0px 9px;
                    font-weight: 100;
                }
                .subtitle {
                    margin: 1% 14%;
                    color: #fff;
                    font-size: 17px;
                    text-align: center;
                    font-family: 'gilroy-thin';
                    line-height: 35px;
                    opacity: 0.8;
                }
                .experience {
                    padding-top: 100px;
                    display: flex;
                    height: 460px;
                }
                .exp-img-left img {
                    width: 517px;
                    margin-left: -30px;
                    height: 396px;
                    border-radius: 20px;
                    position: absolute;
                    z-index: 4;
                }
                .back-grey1 {
                    margin-top: -49px;
                    margin-left: -66px;
                    width: 493px;
                    height: 382px;
                    background-color: #f7f7f7;
                    border-radius: 20px;
                    position: absolute;
                    z-index: 1;
                }
                .back-grey2 {
                    width: 463px;
                    height: 265px;
                    margin-top: 72px;
                    margin-left: 88px;
                    background-color: #f7f7f7;
                    border-radius: 20px;
                    position: absolute;
                    z-index: 2;
                }
                .back-grey3 {
                    width: 526px;
                    height: 328px;
                    margin-top: 52px;
                    margin-left: -16px;
                    background: url(../images/exp-img.jpg);
                    border-radius: 20px;
                    position: absolute;
                    z-index: 3;
                    filter: blur(25px);
                    opacity: 0.5;
                }
                .why-title {
                    font-size: 23px;
                    font-family: 'gilroy-bold';
                    color: #1e1e1e;
                    vertical-align: middle;
                    text-transform: capitalize;
                }
                footer {
                    margin-top: 11%;
                    height: 237px;
                    background-color: #f7f7f7;
                    padding: 5% 0% 3% 16%;
                }
            }
            @media screen and (max-width: 820px)
            {
                .navbar {
                    top: 1%;
                    background-color: transparent;
                    display: flex;
                    width: 90%;
                    margin: auto 5%;
                    justify-content: space-between;
                    overflow: hidden;
                    align-items: center;
                    position: absolute;
                }
                .ulasan {
                    margin-top: -116px;
                    height: 45vh;
                }
            }
            @media screen and (max-width: 805px)
            {
                .navbar .brand-title {
                    width: 34%;
                    font-size: 16px;
                }
                .navbar .brand-title img {
                    width: 16%;
                }
                .product-slider .product-title {
                    font-size: 16px;
                    font-family: 'gilroy-bold';
                    align-items: left;
                    padding-left: 20px;
                    color: #0D1B39;
                    margin-bottom: 8px;
                }
                .product-slider .price-text {
                    margin-top: 20px;
                    font-size: 14px;
                }
                .product-slider .product-price {
                    height: 50px;
                    padding-left: 20px;
                    font-size: 6px;
                    font-family: 'gilroy-bold';
                    color: #0D1B39;
                }
                .ulasan {
                    margin-top: -253px;
                    height: 67vh;
                }
                .ulasan .multiple-items .card p {
                    font-size: 13px;
                }
                .slick-dotted.slick-slider {
                    margin-bottom: 30px;
                    margin-top: -20px;
                }
                .back-grey2 {
                    width: 463px;
                    height: 265px;
                    margin-top: 72px;
                    margin-left: 75px;
                    background-color: #f7f7f7;
                    border-radius: 20px;
                    position: absolute;
                    z-index: 2;
                }
                .col1 p {
                    font-size: 13px;
                    font-family: 'gilroy-regular';
                    line-height: 160%;
                    color: #1e1e1e;
                    opacity: 0.8;
                }
                .col2 p {
                    font-size: 13px;
                    color: #1e1e1e;
                    line-height: 160%;
                    opacity: 0.8;
                    font-family: 'gilroy-regular';
                }
            }
            @media screen and (max-width: 795px)
            {
                .navbar .navbar-links ul li {
                    display: inline-block;
                    font-size: 13px;
                    font-family: 'gilroy-light';
                    color: #fff;
                    justify-content: space-between;
                    padding: 0px 6px;
                    font-weight: 100;
                }
                .ulasan {
                    margin-top: -266px;
                    height: 66vh;
                }
                .subtitle {
                    margin: 1% 14%;
                    color: #fff;
                    font-size: 16px;
                    text-align: center;
                    font-family: 'gilroy-thin';
                    line-height: 35px;
                    opacity: 0.8;
                }
                .exp-img-left img {
                    width: 509px;
                    margin-left: -30px;
                    height: 376px;
                    border-radius: 20px;
                    position: absolute;
                    z-index: 4;
                }
                .back-grey2 {
                    width: 463px;
                    height: 265px;
                    margin-top: 72px;
                    margin-left: 66px;
                    background-color: #f7f7f7;
                    border-radius: 20px;
                    position: absolute;
                    z-index: 2;
                }
            }
            @media screen and (max-width: 768px)
            {
                .navbar .brand-title {
                    width: 34%;
                    font-size: 16px;
                    margin-top: -16px;
                }
                    /* Navbar Menu Starts here */

                .toggle-button {
                    display: flex;
                    right: 8%;
                    top: 22px;
                }


                .navbar-links {
                    display: none;
                    width: 100%;

                }

                .navbar .navbar-links ul {
                    flex-direction: column;
                    width: 100%;
                    padding-left: 0;

                }

                .navbar .navbar-links ul li {
                    text-align: start;
                    height: 35px;
                    width: 100%;
                    padding-top: 7px;

                }

                .navbar .navbar-links ul li:hover {
                    background-color: #8D8D8D;
                }

                .navbar .brand-title {
                    padding-left: 0px;
                    padding-bottom: 20px;
                }

                .navbar {
                    top: 0;
                    flex-direction: column;
                    align-items: flex-start;
                    margin: 0;
                    width: 100%;
                    padding-left: 8%;
                    padding-right: 8%;
                    padding-top: 5%;
                    background-color: rgba(30, 30, 30, 0.99);
                }

                .fa-shopping-cart {
                    display: none;
                }

                .navbar-links.active {
                    display: flex;
                    text-align: left;

                }

                /* Navbar Menu Ends */

                /* Home Section Starts */

                .home {
                    padding-top: 30%;
                    width: 100%;
                    height: 561px;
                    background-position: center;
                    margin-bottom: 75px;
                }

                .home .title {
                    margin: auto 14%;
                    color: #fff;
                    font-size: 38px;
                    text-align: center;
                    text-transform: capitalize;
                    font-family: 'gilroy-bold';
                    margin-top: -80px;
                }
                .subtitle {
                    margin: 10px auto;
                    font-size: 14px;
                    line-height: 100%;
                }
                .product-slider-title {
                    padding-top: 30px;
                    padding-bottom: 10px;
                    font-size: 27px;
                    text-align: center;
                    color: #1e1e1e;
                    font-family: 'gilroy-bold';
                }
                .product-card-bottom {
                    background-color: #fff;
                    padding: 25px 25px 0px 5px;
                    border-bottom-left-radius: 30px;
                    border-bottom-right-radius: 30px;
                }
                .ulasan {
                    margin-top: -199px;
                    height: 47vh;
                }
                .slick-dotted.slick-slider {
                    margin-bottom: 30px;
                    margin-top: 20px;
                }
                .search-bar {
                    padding-top: 15px;
                    display: flex;
                }

                .search {
                    padding: 15px 25px;
                    height: 35px;
                    width: 200px;
                }


                input::placeholder {
                    font-size: 12px;
                }

                .circle {
                    border-radius: 50%;
                    width: 25px;
                    height: 25px;
                    margin-left: -30px;
                }

                .fa-search {
                    font-size: 14px;
                }

                /* Home Section Ends */


                /* Why Us section Starts Here */

                .column {
                    float: none;
                    width: 100%;
                    align-items: center;
                    font-family: 'gilroy-medium';
                    padding: 10px 16px 25px 16px;

                }

                .row {
                    display: flex;
                    flex-direction: column;
                    width: 100%;
                    padding: 5%;
                }


                .column1 {
                    flex-direction: row;
                    width: 100%;
                    justify-content: center;
                    margin-left: 0;
                    margin: 0 auto 10% auto;
                }

                .why-title {
                    display: inline-block;
                    font-size: 30px;
                    padding-left: 10px;
                }

                .column-title {
                    font-size: 22px;
                }

                .column-sub {
                    font-size: 14px;
                }

                /* Why Us Section Ends */

                /* Experiences Section Starts */

                .experience {
                    padding-top: 75px;
                    display: block;
                    height: 660px;
                }

                .exp-img {
                    width: 100%;
                    display: flex;
                    margin-bottom: 70%;
                }

                .exp-img-left img {
                    width: 85%;
                    margin-left: 8%;
                    height: 346px;
                }

                .back-grey1 {
                    display: none;
                }

                .back-grey2 {
                    display: none;
                }

                .back-grey3 {
                    width: 80%;
                    height: 200px;
                    margin-left: 0px;
                    filter: blur(15px);
                    opacity: 0.3;
                    margin-left: 5%;
                }

                .exp-text {
                    width: 91%;
                    margin-left: 10%;
                    margin-bottom: 10%;
                    margin-top: -130px;
                }
                .why-title {
                    padding-left: 0;
                    margin: 0;
                }

                .column-sub2 {
                    font-size: 17px;
                    margin-right: 5%;
                }

                /* Experiences Section Ends */

                /* Materials Section Starts */

                .materials {
                    padding: 0% 0 8% 10%;
                    margin: 0 auto 8% auto;
                    display: flex;
                    flex-direction: column-reverse;
                    right: 0;
                    height: 750px;
                }

                .mat-text {
                    width: 100%;
                    margin-top: 80%;
                }

                .mat-img {
                    width: 100%;
                    position: inherit;
                    float: none;
                    align-items: center;
                }

                .mat-img-right img {
                    width: 90%;
                    margin-right: 5%;
                    height: 245px;
                    right: 0px;
                    margin-bottom: 25%;


                }

                .mat-img-left {
                    display: none;
                }

                .mat-img-right-blur {
                    width: 80%;
                    margin-right: 5%;
                    height: 235px;
                    right: 0px;
                    margin-bottom: 50%;

                }

                .back-grey4 {
                    display: none;
                }

                /* Materials Section Ends */


                /* Testimonial Section Starts */

                .testimonial-black-title {
                    font-size: 33px;
                }

                .owl-nav .owl-next {
                    right: -3%;
                }

                .white-card {
                    width: 90%;
                }

                .testi-text {
                    margin-bottom: 15px;
                }

                .white-card .star-rating {
                    padding-left: 0%;
                }


                /* Testimonial Section Ends */


                /* Footer Section Starts */

                footer {
                    height: 210px;
                    padding: 10% 0% 0% 13%;
                }
                .footer-bar {
                    display: flex;
                }

                .col1 {
                    width: 100%;
                }

                .col2 {
                    display: none;
                }

                .terms-text {
                    display: none;
                }

            }
            @media screen and (max-width: 700px)
            {
                .navbar .brand-title {
                    width: 40%;
                    font-size: 16px;
                    margin-top: -16px;
                }
                .exp-text {
                    width: 91%;
                    margin-left: 10%;
                    margin-bottom: 10%;
                    margin-top: -100px;
                }
            }
            @media screen and (max-width: 656px)
            {
                .home .title {
                    margin: auto 14%;
                    color: #fff;
                    font-size: 34px;
                    text-align: center;
                    text-transform: capitalize;
                    font-family: 'gilroy-bold';
                    margin-top: -80px;
                }
                .exp-text {
                    width: 91%;
                    margin-left: 10%;
                    margin-bottom: 10%;
                    margin-top: -65px;
                }
                .experiences {
                    letter-spacing: 3px;
                    font-size: 15px;
                    color: #E58411;
                    text-transform: uppercase;
                    font-family: 'gilroy-medium';
                }
                .why-title {
                    display: inline-block;
                    font-size: 24px;
                }
                .column-sub2 {
                    font-size: 15px;
                    margin-right: 5%;
                }
            }
            @media screen and (max-width: 595px)
            {
                .navbar .brand-title {
                    width: 43%;
                    font-size: 15px;
                    margin-top: -16px;
                }
                .exp-text {
                    width: 91%;
                    margin-left: 10%;
                    margin-bottom: 10%;
                    margin-top: -25px;
                }
            }
            @media screen and (max-width: 586px)
            {
                .home {
                    padding-top: 30%;
                    width: 100%;
                    height: 531px;
                    background-position: center;
                    margin-bottom: 75px;
                }
                .home .title {
                    margin: auto 14%;
                    color: #fff;
                    font-size: 32px;
                    text-align: center;
                    text-transform: capitalize;
                    font-family: 'gilroy-bold';
                    margin-top: -80px;
                }
            }
            @media screen and (max-width: 555px)
            {
                .home .title {
                    margin: auto 14%;
                    color: #fff;
                    font-size: 29px;
                    text-align: center;
                    text-transform: capitalize;
                    font-family: 'gilroy-bold';
                    margin-top: -46px;
                }
                .product-slider-title {
                    padding-top: 30px;
                    padding-bottom: 10px;
                    font-size: 24px;
                    text-align: center;
                    color: #1e1e1e;
                    font-family: 'gilroy-bold';
                }
                .exp-text {
                    width: 91%;
                    margin-left: 10%;
                    margin-bottom: 10%;
                    margin-top: -5px;
                }
                .why-title {
                    display: inline-block;
                    font-size: 22px;
                }
                .column-sub2 {
                    font-size: 13px;
                    margin-right: 5%;
                }
            }
            @media screen and (max-width: 540px)
            {
                .ulasan {
                    margin-top: -290px;
                    height: 67vh;
                }
            }
            @media screen and (max-width: 520px)
            {
                .navbar {
                    top: 0;
                    flex-direction: column;
                    align-items: flex-start;
                    margin: 0;
                    width: 100%;
                    padding-left: 8%;
                    padding-right: 8%;
                    padding-top: 0%;
                    background-color: rgba(30, 30, 30, 0.99);
                }
                .navbar .brand-title {
                    width: 45%;
                    font-size: 14px;
                    margin-top: 15px;
                    margin-bottom: -10px;
                }
                .toggle-button {
                    display: flex;
                    right: 8%;
                    top: 10px;
                }
                .home .title {
                    margin: auto 12%;
                    color: #fff;
                    font-size: 29px;
                    text-align: center;
                    text-transform: capitalize;
                    font-family: 'gilroy-bold';
                    margin-top: -46px;
                }
                .exp-text {
                    width: 91%;
                    margin-left: 10%;
                    margin-bottom: 10%;
                    margin-top: 0px;
                    padding-top: 17px;
                }
                .why-title {
                    display: inline-block;
                    font-size: 20px;
                }
            }
            @media screen and (max-width: 476px)
            {
                .home {
                    padding-top: 30%;
                    width: 100%;
                    height: 461px;
                    background-position: center;
                    margin-bottom: 75px;
                }
                .home .title {
                    margin: auto 6%;
                    color: #fff;
                    font-size: 29px;
                    text-align: center;
                    text-transform: capitalize;
                    font-family: 'gilroy-bold';
                    margin-top: -46px;
                }
                .exp-text {
                    width: 91%;
                    margin-left: 10%;
                    margin-bottom: 10%;
                    margin-top: 0px;
                    padding-top: 50px;
                }
            }
            @media screen and (max-width: 463px)
            {
                .navbar .brand-title {
                    width: 57%;
                    font-size: 14px;
                    margin-top: 15px;
                    margin-bottom: -10px;
                }
                .navbar .brand-title img {
                    width: 14%;
                }
                .exp-text {
                    width: 91%;
                    margin-left: 10%;
                    margin-bottom: 10%;
                    margin-top: 0px;
                    padding-top: 75px;
                }
            }
            @media screen  and (max-width: 410px)
            {
                .home .title {
                    margin: auto 6%;
                    color: #fff;
                    font-size: 25px;
                    text-align: center;
                    text-transform: capitalize;
                    font-family: 'gilroy-bold';
                    margin-top: -21px;
                }
                .subtitle {
                    margin: 10px auto;
                    font-size: 12px;
                    line-height: 100%;
                }
                .product-slider-title {
                    padding-top: 30px;
                    padding-bottom: 10px;
                    font-size: 22px;
                    text-align: center;
                    color: #1e1e1e;
                    font-family: 'gilroy-bold';
                }
            }
            @media screen and (max-width: 414px)
            {
                .product-card-bottom {
                    background-color: #fff;
                    padding: 25px 25px -10px 5px;
                    border-bottom-left-radius: 30px;
                    border-bottom-right-radius: 30px;
                }
                .product-slider .product-title {
                    font-size: 16px;
                    font-family: 'gilroy-bold';
                    align-items: left;
                    padding-left: 20px;
                    color: #0D1B39;
                    margin-bottom: 0px;
                    margin-top: 16px;
                }
                .star-rating {
                    padding-left: 20px;
                    margin-bottom: 5px;
                }
                .ulasan {
                    margin-top: -260px;
                    height: 46vh;
                }
            }
            @media screen and (max-width: 393px)
            {
                .ulasan {
                    margin-top: -298px;
                    height: 50vh;
                }
            }
            @media screen and (max-width: 375px)
            {
                .home .title {
                    margin: auto 6%;
                    color: #fff;
                    font-size: 25px;
                    text-align: center;
                    text-transform: capitalize;
                    font-family: 'gilroy-bold';
                    margin-top: -5px;
                }
                .product-slider {
                    height: 512px;
                    width: 100%;
                    padding-left: 5%;
                    padding-right: 5%;
                    margin-top: -3px;
                    background-color: #F7F7F7;
                }
                .subtitle {
                    margin: auto 4%;
                    font-size: 12px;
                    line-height: 100%;
                    margin-top: 13px;
                }
                .exp-img-left img {
                    width: 85%;
                    margin-left: 8%;
                    height: 306px;
                }
            }
            @media screen and (max-width: 360px)
            {
                .navbar .brand-title {
                    width: 65%;
                    font-size: 13px;
                    margin-top: 15px;
                    margin-bottom: -10px;
                }
                .home .title {
                    margin: auto 5%;
                    color: #fff;
                    font-size: 24px;
                    text-align: center;
                    text-transform: capitalize;
                    font-family: 'gilroy-bold';
                    margin-top: -3px;
                }
                .subtitle {
                    margin: auto 6%;
                    font-size: 12px;
                    line-height: 100%;
                    margin-top: 3%;
                }
               .product-slider-title {
                    padding-top: 25px;
                    padding-bottom: 10px;
                    font-size: 20px;
                    text-align: center;
                    color: #1e1e1e;
                    font-family: 'gilroy-bold';
                }
                .product-card-bottom {
                    background-color: #fff;
                    padding: 20px 25px 0px 5px;
                    border-bottom-left-radius: 30px;
                    border-bottom-right-radius: 30px;
                }
                .exp-text {
                    width: 91%;
                    margin-left: 10%;
                    margin-bottom: 10%;
                    margin-top: 0px;
                    padding-top: 139px;
                }
                .experiences {
                    letter-spacing: 3px;
                    font-size: 14px;
                    color: #E58411;
                    text-transform: uppercase;
                    font-family: 'gilroy-medium';
                    margin-bottom: 6px;
                }
                .why-title {
                    display: inline-block;
                    font-size: 19px;
                }
                .column-sub2 {
                    font-size: 12px;
                    margin-right: 5%;
                }
                .col1 h1 {
                    font-size: 20px;
                    font-family: 'gilroy-bold';
                    color: #1e1e1e;
                }
            }
            @media screen and (max-width: 300px)
            {
                .exp-img-left img {
                    width: 85%;
                    margin-left: 8%;
                    height: 282px;
                }
                .navbar .brand-title {
                    width: 71%;
                    font-size: 13px;
                    margin-top: 15px;
                    margin-bottom: -10px;
                }
            }
    </style>
</head>

<body>
    <!-----Header Nav Bar Starts-->
    <nav class="navbar">
        <div class="brand-title">
            <img src="{{ asset('client/assets/images/logo.png') }}" alt=""> Murah Prima Furniture
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
                <li><a href="#product-slider" class="men">Ulasan</a></li>
                <li><a href="#experience" class="men">Tentang Kami</a></li>
                @guest
                <li><a href="{{ url('login/index') }}" class="btn btn-login">Masuk</a> </li>
                @endguest
                @auth
                <li class="nav-item">
                    <form action="{{ url('logout') }}" method="POST">
                        @csrf
                        <button class="btn btn-login" type="submit">
                            Keluar
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
            Ubah ruangan Anda menjadi lebih minimalis dan modern dengan mudah
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
                    <a href="{{ url('login/index') }}" class="btn btn-blue px-4 py-2 mt-0">Lebih Lanjut</a>

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
        <div class="product-slider ulasan" id="product-slider">
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
                    breakpoint: 1060,
                    settings: {
                        slidesToShow: 3,
                        slidesToScroll: 3,
                        infinite: true,
                        dots: true
                    }
                    },
                    {
                    breakpoint: 1024,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 2,
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
                    breakpoint: 480,
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
                    <h1>Murah Prima Furniture</h1>
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
