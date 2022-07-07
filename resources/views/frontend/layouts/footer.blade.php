<!-- Footer -->
    <div class="osahan-menu-fotter fixed-bottom bg-white px-3 py-2 text-center d-none">
        <div class="row">
            <div class="col selected">
                <a href="/" class="text-danger small font-weight-bold text-decoration-none">
                    <p class="h4 m-0"><i class="feather-home text-danger"></i></p>
                    Home
                </a>
            </div>
            <div class="col">
                <a href="#" class="text-dark small font-weight-bold text-decoration-none">
                    <p class="h4 m-0"><i class="feather-map-pin"></i></p>
                    Trending
                </a>
            </div>
            <div class="col bg-white rounded-circle mt-n4 px-3 py-2">
                <div class="bg-danger rounded-circle mt-n0 shadow">
                    <a href="#checkout" class="text-white small font-weight-bold text-decoration-none">
                        {{--  <i class="feather-shopping-cart"></i>  --}}
                        {{--  <span class="fa-stack fa-2x has-badge" data-count="5">
                            <i class="feather-shopping-cart"></i>
                            <i style="" class="fa fa-shopping-cart fa-stack-2x red-cart"></i>
                        </span>  --}}
                        <i class="fa" style="font-size:24px">&#xf07a;</i>
<span class='badge badge-warning' id='lblCartCount'> 5 </span>
                    </a>
                </div>
            </div>
            <div class="col">
                <a href="#" class="text-dark small font-weight-bold text-decoration-none">
                    <p class="h4 m-0"><i class="feather-heart"></i></p>
                    Favorites
                </a>
            </div>
            <div class="col">
                <a href="#" class="text-dark small font-weight-bold text-decoration-none">
                    <p class="h4 m-0"><i class="feather-user"></i></p>
                    Profile
                </a>
            </div>
        </div>
    </div>
    <!-- footer -->
    <footer class="section-footer border-top bg-dark">
        <div class="container">
            <section class="footer-top padding-y py-5">
                <div class="row">
                    <aside class="col-md-6 footer-about">
                        <article class="d-flex pb-3">
                            <div><img alt="#" src="{{ asset('img/loggoo.png') }}" class="logo-footer mr-3"></div>
                            <div>
                                <h6 class="title text-white">About Us</h6>
                                <p class="text-muted">Some short text about company like You might remember the Dell computer commercials in which a youth reports.</p>
                                <div class="d-flex align-items-center">
                                    <a class="btn btn-icon btn-outline-light mr-1 btn-sm" title="Facebook" target="_blank" href="#"><i class="feather-facebook"></i></a>
                                    <a class="btn btn-icon btn-outline-light mr-1 btn-sm" title="Instagram" target="_blank" href="#"><i class="feather-instagram"></i></a>
                                    <a class="btn btn-icon btn-outline-light mr-1 btn-sm" title="Youtube" target="_blank" href="#"><i class="feather-youtube"></i></a>
                                    <a class="btn btn-icon btn-outline-light mr-1 btn-sm" title="Twitter" target="_blank" href="#"><i class="feather-twitter"></i></a>
                                </div>
                                <p class="mt-3  text-white"> © 2020 Company All rights reserved </p>
                            </div>
                        </article>
                    </aside>
                    <aside class="col-sm-6  text-white">
                        <section class="footer-copyright mt-5 py-3 ">
                            <div class="container d-flex align-items-center">
                                {{--  <p class="mb-0"> © 2020 Company All rights reserved </p>  --}}
                                <p class="text-muted mb-0 ml-auto d-flex align-items-center">
                                    <a href="#" class="d-block"><img alt="#" src="{{ asset('img/appstore.png') }}" height="40"></a>
                                    <a href="#" class="d-block ml-3"><img alt="#" src="{{ asset('img/playmarket.png') }}" height="40"></a>
                                </p>
                            </div>
                        </section>

                    </aside>

                </div>
                <!-- row.// -->
            </section>
            <!-- footer-top.// -->
        </div>
    </footer>
    <style>
        .badge {
            padding-left: 9px;
            padding-right: 9px;
            -webkit-border-radius: 9px;
            -moz-border-radius: 9px;
            border-radius: 9px;
          }

          .label-warning[href],
          .badge-warning[href] {
            background-color: #c67605;
          }
          #lblCartCount {
              font-size: 12px;
              background: #ff0000;
              color: #fff;
              padding: 0 5px;
              vertical-align: top;
              margin-left: -10px;
          }
    </style>
