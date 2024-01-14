<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>medical</title>
    <link rel="icon" href="img/favicon.png">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.rtlcss.com/bootstrap/v4.2.1/css/bootstrap.min.css">
    <!-- style CSS -->
    <link rel="stylesheet" href="{{ asset('assets/') }}/css/style.css">
<style>
    .banner_part {
    /* height: 935px; */
    height: 100vh;

    }
    .navbar-nav li a{
        font-size: 20px;
    }

</style>
</head>

<body>

        <!--::header part start::-->
        <header class="main_menu home_menu">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-12">
                        <nav class="navbar navbar-expand-lg navbar-light">
                            <a class="navbar-brand" href="index.html"> <img src="{{ asset('assets/') }}/img/logo.png"
                                    alt="logo"> </a>
                            <button class="navbar-toggler" type="button" data-toggle="collapse"
                                data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                                aria-expanded="false" aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon"></span>
                            </button>

                            <div class="collapse navbar-collapse main-menu-item justify-content-center"
                                id="navbarSupportedContent">
                                <ul class="navbar-nav align-items-center">
                                    <li class="nav-item">
                                        <a class="nav-link" style="font-size: 25px;" href="{{route('patient.search')}}">مريض</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" style="font-size: 25px;" href="{{route('doctor.login_form')}}">طبيب</a>
                                    </li>
                                    <li class="nav-item active">

                                        <a class="nav-link" style="font-size: 25px;" href="{{route('admin.login_form')}}">أدارة</a>
                                    </li>

                                </ul>
                            </div>
                        </nav>
                    </div>
                </div>
            </div>
        </header>
        <!-- Header part end-->

        <!-- banner part start-->
        <section class="banner_part">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-5 col-xl-5">
                        <div class="banner_text">
                            <div class="banner_text_iner">

                                <h1>العيادة الذكية</h1>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing
                                    elit sed do eiusmod tempor incididunt ut labore et dolore
                                    magna aliqua. Quis ipsum suspendisse ultrices gravida.Risus cmodo viverra </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-7">
                        <div class="banner_img">
                            <img src="{{ asset('assets/') }}/img/banner_img.png" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- banner part start-->




    <!-- bootstrap js -->
    <link rel="stylesheet" href="https://cdn.rtlcss.com/bootstrap/v4.2.1/css/bootstrap.min.css">



</body>

</html>
