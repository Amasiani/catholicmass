<!DOCTYPE html>
<html lang="en-US" dir="ltr">

  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <!-- ===============================================-->
    <!--    Document Title-->
    <!-- ===============================================-->
    <title>Catholic Clock</title>


    <!-- ===============================================-->
    <!--    Favicons-->
    <!-- ===============================================-->
    <link rel="apple-touch-icon" sizes="180x180" href="assets/img/favicons/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="assets/img/favicons/favicon-32x321.png">
    <link rel="icon" type="image/png" sizes="16x16" href="assets/img/favicons/favicon-16x16123.png">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicons/favicon.ico">
    <link rel="manifest" href="assets/img/favicons/manifest.json">
    <meta name="msapplication-TileImage" content="assets/img/favicons/mstile-150x150.png">
    <meta name="theme-color" content="#ffffff">


    <!-- ===============================================-->
    <!--    Stylesheets-->
    <!-- ===============================================-->
    <link href="assets/cssFront/theme.css" rel="stylesheet" />

  </head>


  <body>

    <!-- ===============================================-->
    <!--    Main Content-->
    <!-- ===============================================-->
    <main class="main" id="top">
      <nav class="navbar navbar-expand-lg navbar-light fixed-top py-3 backdrop" data-navbar-on-scroll="data-navbar-on-scroll" style="background-color: #65c2f5;">
        <div class="container"><a class="navbar-brand d-flex align-items-center fw-bolder fs-2 fst-italic" href="#">
            <img src="assets/img/gallery/logo.png" class="rounded-circle" alt="">
             <div class="col md-6 px-1">Catholic Clock</div>           
          </a>
          <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
          <div class="collapse navbar-collapse border-top border-lg-0 mt-4 mt-lg-0" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto pt-2 pt-lg-0">
              <li class="nav-item px-2"><a class="nav-link fw-medium active" aria-current="page" href="{{ url('/') }}">Home</a></li>
              <li class="nav-item px-2"><a class="nav-link fw-medium" href="{{ route('contact') }}">Contact us</a></li>
              <li class="nav-item px-2"><a class="nav-link fw-medium" href="#">About</a></li>
              <form class="ps-lg-5" action="{{ route('login') }}">
                <button class="btn btn-lg btn-primary rounded-pill bg-gradient order-0" type="submit">Sign In</button>
              </form>
            </ul>
          </div>
        </div>
      </nav>
      <section class="py-0" id="home">
        <div class="bg-holder d-none d-sm-block" style="background-image:url(assets/img/gallery/user-113.png);background-position:right top;background-size:contain;">
        </div>
        <!--/.bg-holder-->

        <div class="bg-holder d-sm-none" style="background-image:url(assets/img/illustrations/hero-bg.png);background-position:right top;background-size:contain;">
        </div>
        <!--/.bg-holder-->

        <div class="container">
          <div class="row align-items-center min-vh-75 min-vh-md-100">
            <div class="col-md-7 col-lg-6 py-6 text-sm-start text-center">
              <p class="mb-4 fs-1">Find Catholic church near you</p>
              <div class="pt-3">
                <form>
                  <div class="input-group w-xl-75 w-xxl-50 d-flex flex-end-center">
                    <input class="form-control rounded-pill shadow-lg border-0" id="formGroupExampleInput" type="text" placeholder="Search for catholic church near your" /><img class="input-box-icon me-2" src="assets/img/illustrations/search.png" width="30" alt="" />
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </section>
      <section class="py-5">
        <div class="bg-holder" style="background-image:url(assets/img/illustrations/bg123.png);background-position:left top;background-size:initial;margin-top:-180px;">
        </div>
        <!--/.bg-holder-->

        <div class="container">
          <div class="row flex-center">
            <div class="col-md-5 order-md-0 text-center text-md-start"><img class="img-fluid mb-4" src="assets/img/illustrations/passion.png" width="450" alt="" /></div>
            <div class="col-md-5 text-center text-md-start">
              <h6 class="fw-bold fs-2 fs-lg-3 display-3 lh-sm">Find your passion and<br />achieve success</h6>
              <p class="my-4 pe-xl-8"> find a job that suits your interests and talents. A high salary is not the top priority. Most importantly,You can work according to your heart's desire.</p>
            </div>
          </div>
        </div>
      </section>


      <!-- <section> begin ============================-->
      <section class="py-8">

        <div class="container">
            @yield('content')
        </div>
        <!-- end of .container-->

      </section>
      <!-- <section> close ============================-->
      <!-- ============================================-->


      <section class="py-0"><img class="w-100" src="assets/img/illustrations/come-on-join.png" alt="" />
        <div class="container">
          <div class="row align-items-center">
            <div class="col-12 text-center">
              <h6 class="fw-bold fs-3 fs-lg-5 lh-sm">Come on, join with us !</h6>
              <p>Create an account and refer your friend </p>
            </div>
          </div>
        </div>
      </section>
      <section class="py-8">
        <div class="container-lg">
          <div class="row flex-center">
            <div class="col-md-11 col-lg-6 col-xl-4 col-xxl-5">
              <h6 class="fs-3 fs-lg-4 lh-sm">Trending News</h6>
            </div>
            <div class="col-lg-4 position-relative mt-n5 mt-md-n4"><a class="carousel-control-prev carousel-icon z-index-2" href="#carouselExampleDark" role="button" data-bs-slide="prev"><span class="carousel-control-prev-icon" aria-hidden="true"></span><span class="visually-hidden">Previous</span></a><a class="carousel-control-next carousel-icon z-index-2" href="#carouselExampleDark" role="button" data-bs-slide="next"><span class="carousel-control-next-icon" aria-hidden="true"></span><span class="visually-hidden">Next</span></a></div>
          </div>
          <div class="row flex-center">
            <div class="col-xl-10 px-0">
              <div class="carousel slide pt-6" id="carouselExampleDark" data-bs-ride="carousel"> 
                <div class="carousel-inner">
                @foreach($notifications as $key => $notification)
                  <div class="carousel-item {{ $key == 0 ? 'active' : '' }}" data-bs-interval="10000">
                    <div class="row h-100 m-lg-7 mx-3 mt-6 mx-md-4 my-md-7">
                      <div class="col-md-12 mb-8 mb-md-0">
                        <div class="card card-span h-100 shadow-lg">
                          <div class="card-span-img"><img src="{{ asset('images/' . $notification->img)  }}" class="rounded-circle" width="150" height="150" alt="" /></div>
                          <div class="card-body d-flex flex-column flex-center py-6">
                            <div class="my-4">
                             <ul class="list-unstyled list-inline">
                                <li class="list-inline-item me-0">
                                  <svg class="bi bi-star-fill" xmlns="http://www.w3.org/2000/svg" width="28" height="26" fill="#FF974D" viewBox="0 0 16 16">
                                    <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.283.95l-3.523 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"></path>
                                  </svg>
                                </li>
                                <li class="list-inline-item me-0">
                                  <svg class="bi bi-star-fill" xmlns="http://www.w3.org/2000/svg" width="28" height="26" fill="#FF974D" viewBox="0 0 16 16">
                                    <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.283.95l-3.523 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"></path>
                                  </svg>
                                </li>
                                <li class="list-inline-item me-0">
                                  <svg class="bi bi-star-fill" xmlns="http://www.w3.org/2000/svg" width="28" height="26" fill="#FF974D" viewBox="0 0 16 16">
                                    <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.283.95l-3.523 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"></path>
                                  </svg>
                                </li>
                                <li class="list-inline-item me-0">
                                  <svg class="bi bi-star-fill" xmlns="http://www.w3.org/2000/svg" width="28" height="26" fill="#FF974D" viewBox="0 0 16 16">
                                    <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.283.95l-3.523 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"></path>
                                  </svg>
                                </li>
                                <li class="list-inline-item me-0">
                                  <svg class="bi bi-star-fill" xmlns="http://www.w3.org/2000/svg" width="28" height="26" fill="#FF974D" viewBox="0 0 16 16">
                                    <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.283.95l-3.523 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"> </path>
                                  </svg>
                                </li>
                              </ul>
                            </div>
                            <p class="card-text text-center text-1000 px-4">I love Jobest, easy platform to use,fantasic staff and nothing but great results!</p>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>                 
                  @endforeach
                </div>
              </div>             
            </div>
          </div>
        </div>
      </section>
      <section class="py-0 bg-transparent">
        <div class="bg-holder" style="background-image:url(assets/img/illustrations/footer-bg.png);background-position:center;background-size:cover;">
        </div>
        <!--/.bg-holder-->

        <div class="container">
          <div class="row flex-center py-8">
            <div class="col-lg-6 mb-4 text-center">
              <h1 class="text-white">Get started now</h1>
            </div>
            <div class="col-lg-6 d-flex justify-content-lg-end justify-content-center">
              <form class="row row-cols-lg-auto g-0 align-items-center">
                <div class="col-9 col-lg-8">
                  <label class="visually-hidden" for="colFormLabel">Username</label>
                  <div class="input-group">
                    <input class="rounded-end-0 form-control" id="colFormLabel" type="email" placeholder="email address" />
                  </div>
                </div>
                <div class="col-3 col-lg-4">
                  <button class="btn btn-primary rounded-start-0" type="submit">Submit</button>
                </div>
              </form>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-6">
              <div class="card">
                <div class="card-body">
                  <h5 class="card-title">Special title treatment</h5>
                  <!--former iframe link-->
                </div>
              </div>
            </div>
            <div class="col-sm-6">
              <div class="card">
                <div class="card-body">
                  <h5 class="card-title">Special title treatment</h5>
                  <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                  <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
              </div>
            </div>
          </div>
          <div class="row flex-center">
            <div class="col-auto my-4">
              <ul class="list-unstyled list-inline">
                <li class="list-inline-item me-3"><a href="#!">
                    <svg class="bi bi-twitter" xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="#1F3A63" viewBox="0 0 16 16">
                      <path d="M5.026 15c6.038 0 9.341-5.003 9.341-9.334 0-.14 0-.282-.006-.422A6.685 6.685 0 0 0 16 3.542a6.658 6.658 0 0 1-1.889.518 3.301 3.301 0 0 0 1.447-1.817 6.533 6.533 0 0 1-2.087.793A3.286 3.286 0 0 0 7.875 6.03a9.325 9.325 0 0 1-6.767-3.429 3.289 3.289 0 0 0 1.018 4.382A3.323 3.323 0 0 1 .64 6.575v.045a3.288 3.288 0 0 0 2.632 3.218 3.203 3.203 0 0 1-.865.115 3.23 3.23 0 0 1-.614-.057 3.283 3.283 0 0 0 3.067 2.277A6.588 6.588 0 0 1 .78 13.58a6.32 6.32 0 0 1-.78-.045A9.344 9.344 0 0 0 5.026 15z"></path>
                    </svg></a></li>
                <li class="list-inline-item me-3"><a class="text-decoration-none" href="#!">
                    <svg class="bi bi-facebook" xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="#1F3A63" viewBox="0 0 16 16">
                      <path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z"></path>
                    </svg></a></li>
                <li class="list-inline-item me-3"><a href="#!">
                    <svg class="bi bi-instagram" xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="#1F3A63" viewBox="0 0 16 16">
                      <path d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.917 3.917 0 0 0-1.417.923A3.927 3.927 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.916 3.916 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.926 3.926 0 0 0-.923-1.417A3.911 3.911 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0h.003zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599.28.28.453.546.598.92.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.47 2.47 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.478 2.478 0 0 1-.92-.598 2.48 2.48 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233 0-2.136.008-2.388.046-3.231.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92.28-.28.546-.453.92-.598.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045v.002zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92zm-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217zm0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334z"> </path>
                    </svg></a></li>
              </ul>
            </div>
          </div>
          <div class="row justify-content-center">
            <div class="col-auto mb-2">
              <p class="mb-0 fs--1 text-white my-2 text-center">&copy; This webApp is made with&nbsp;
                <svg class="bi bi-suit-heart-fill" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#1F3A63" viewBox="0 0 16 16">
                  <path d="M4 1c2.21 0 4 1.755 4 3.92C8 2.755 9.79 1 12 1s4 1.755 4 3.92c0 3.263-3.234 4.414-7.608 9.608a.513.513 0 0 1-.784 0C3.234 9.334 0 8.183 0 4.92 0 2.755 1.79 1 4 1z"></path>
                </svg>&nbsp;by&nbsp;<a class="text-white" href="https://eastsunnetwork.com/" target="_blank">Eastsun Network Ltd </a>
              </p>
            </div>
          </div>
        </div>
      </section>
    </main>
    <!-- ===============================================-->
    <!--    End of Main Content-->
    <!-- ===============================================-->




    <!-- ===============================================-->
    <!--    JavaScripts-->
    <!-- ===============================================-->
    <script src="vendors/@popperjs/popper.min.js"></script>
    <script src="vendors/bootstrap/bootstrap.min.js"></script>
    <script src="vendors/is/is.min.js"></script>
    <script src="https://polyfill.io/v3/polyfill.min.js?features=window.scroll"></script>
    <script src="assets/js/theme.js"></script>

    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,200;1,300;1,400&amp;display=swap" rel="stylesheet">
  </body>
</html>