<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <!-- mobile metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="viewport" content="initial-scale=1, maximum-scale=1">
      <!-- site metas -->
      <title>Heado</title>
      <meta name="keywords" content="">
      <meta name="description" content="">
      <meta name="author" content="">
      <!-- owl carousel style -->
      <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.0.0-beta.2.4/assets/owl.carousel.min.css" />
      <!-- bootstrap css -->
      <link rel="stylesheet" type="text/css" href="{{asset('Heado-1.0.0')}}/css/bootstrap.min.css">
      <!-- style css -->
      <link rel="stylesheet" type="text/css" href="{{asset('Heado-1.0.0')}}/css/style.css">
      <!-- Responsive-->
      <link rel="stylesheet" href="{{asset('Heado-1.0.0')}}/css/responsive.css">
      <!-- fevicon -->
      <link rel="icon" href="{{asset('Heado-1.0.0')}}/images/fevicon.png" type="image/gif" />
      <!-- Scrollbar Custom CSS -->
      <link rel="stylesheet" href="{{asset('Heado-1.0.0')}}/css/jquery.mCustomScrollbar.min.css">
      <!-- Tweaks for older IEs-->
      <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
      <!-- owl stylesheets --> 
      <link rel="stylesheet" href="{{asset('Heado-1.0.0')}}/css/owl.carousel.min.css">
      <link rel="stylesheet" href="{{asset('Heado-1.0.0')}}/css/owl.theme.default.min.css">
      <link rel="stylesheet" href="{{asset('Heado-1.0.0')}}/https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
   </head>
   <body>
      <!--header section start -->
      <div class="header_section">
         <div class="container">
            <nav class="navbar navbar-dark bg-dark">
               <a class="" style="width: 23%" href="index.html"><img src="{{asset('Heado-1.0.0')}}/images/logo2.png"></a>
               <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample01" aria-controls="navbarsExample01" aria-expanded="false" aria-label="Toggle navigation">
               <span class="navbar-toggler-icon"></span>
               </button>
               <div class="collapse navbar-collapse" id="navbarsExample01">
                  <ul class="navbar-nav mr-auto">
                     <li class="nav-item">
                        <a class="nav-link" href="index.html">Home</a>
                     </li>
                     <li class="nav-item">
                        <a class="nav-link" href="about.html">About</a>
                     </li>
                     <li class="nav-item">
                        <a class="nav-link" href="services.html">Services</a>
                     </li>
                     <li class="nav-item">
                        <a class="nav-link" href="blog.html">Blog</a>
                     </li>
                     <li class="nav-item">
                        <a class="nav-link" href="client.html">Client</a>
                     </li>
                     <li class="nav-item">
                        <a class="nav-link" href="contact.html">Contact Us</a>
                     </li>
                  </ul>
               </div>
            </nav>
         </div>
         <!--banner section start -->
         <div class="banner_section layout_padding">
            <div id="my_slider" class="carousel slide" data-ride="carousel">
               <div class="carousel-inner">
                  <div class="carousel-item active">
                     <div class="container">
                        <div class="row">
                           <div class="col-md-6">
                              <div class="taital_main">
                                 <h4 class="banner_taital">Layanan Rental Mobil</h4>
                                 <p class="banner_text">
                                     Temukan layanan rental mobil terbaik untuk setiap perjalanan Anda! Apakah Anda membutuhkan mobil kecil untuk berkeliling kota atau SUV untuk perjalanan keluarga, kami menawarkan berbagai pilihan kendaraan sesuai kebutuhan Anda. Nikmati kemudahan pemesanan, harga terjangkau, dan pelayanan pelanggan yang ramah.
                                 </p>
                                 <div class="read_bt">
                                     @if (Route::has('login'))
                                         @auth
                                             <a href="{{ url('/dashboard') }}">Lihat Armada Kami</a>
                                         @else
                                             <a href="{{ route('login') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Mulai Sekarang</a>
                                         @endauth
                                     @else
                                         <a href="#" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Selengkapnya</a>
                                     @endif
                                 </div>
                             </div>
                             
                             
                           </div>
                           <div class="col-md-6">
                              <div><img src="{{asset('Heado-1.0.0')}}/images/sparkling cupper gray.png" class="image_1"></div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="carousel-item">
                     <div class="container">
                        <div class="row">
                           <div class="col-md-6">
                              <div class="taital_main">
                                 <h4 class="banner_taital">Web Agency</h4>
                                 <p class="banner_text">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem I</p>
                                 <div class="read_bt"><a href="#">Read More</a></div>
                              </div>
                           </div>
                           <div class="col-md-6">
                              <div><img src="images/img-1.png" class="image_1"></div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="carousel-item">
                     <div class="container">
                        <div class="row">
                           <div class="col-md-6">
                              <div class="taital_main">
                                 <h4 class="banner_taital">Web Agency</h4>
                                 <p class="banner_text">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem I</p>
                                 <div class="read_bt"><a href="#">Read More</a></div>
                              </div>
                           </div>
                           <div class="col-md-6">
                              <div><img src="images/img-1.png" class="image_1"></div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <a class="carousel-control-prev" href="#my_slider" role="button" data-slide="prev">
               <i class=""><img src="{{asset('Heado-1.0.0')}}/images/left-icon.png"></i>
               </a>
               <a class="carousel-control-next" href="#my_slider" role="button" data-slide="next">
               <i class=""><img src="{{asset('Heado-1.0.0')}}/images/right-icon.png"></i>
               </a>
            </div>
         </div>
         <!--banner section end -->
      </div>
      <!--header section end -->
      <!--about section start -->
      <div class="about_section layout_padding">
         <div class="container">
             <div class="row">
                 <div class="col-md-6">
                     <div class="image_2"><img src="{{asset('Heado-1.0.0')}}/images/sparkling cupper gray.png" alt="Mobil Rental"></div>
                 </div>
                 <div class="col-md-6">
                     <h1 class="about_taital">Tentang <span class="us_text">Kami</span></h1>
                     <p class="about_text">
                         Kami adalah penyedia layanan rental mobil yang berkomitmen memberikan pengalaman perjalanan yang nyaman, aman, dan terpercaya. Dengan berbagai pilihan kendaraan mulai dari mobil ekonomi hingga SUV mewah, kami siap mendukung kebutuhan transportasi Anda. Layanan kami dirancang untuk memberikan fleksibilitas dan kenyamanan dengan proses pemesanan yang mudah dan harga kompetitif.
                     </p>
                     <div class="read_bt_1"><a href="#">Selengkapnya</a></div>
                 </div>
             </div>
         </div>
     </div>
     
      <!--about section end -->
      <!--services section start -->
      <div class="services_section layout_padding">
        <div class="container">
            <h1 class="service_taital"><span class="our_text">Our</span> Services</h1>
            <p class="service_text">We offer a wide range of car rental services to meet your travel needs. Explore our offerings below:</p>
            <div class="services_section_2">
                <div class="row">
                    <div class="col-sm-4">
                        <div class="icon_1"><img src="{{asset('Heado-1.0.0')}}/images/images__1_.png" alt="Car Rental Icon"></div>
                        <h4 class="design_text">Daily Rentals</h4>
                        <p class="lorem_text">Rent a car for a day or more. Perfect for short trips or business needs. Flexible options available.</p>
                    </div>
                    <div class="col-sm-4">
                        <div class="icon_3"><img src="{{asset('Heado-1.0.0')}}/images/Vacation_Rental.webp" alt="SUV Rentals Icon"></div>
                        <h4 class="design_text">SUV Rentals</h4>
                        <p class="lorem_text">Explore the outdoors with our range of SUVs. Spacious and comfortable for families or groups.</p>
                        <div class="read_bt_2"><a href="#">Read More</a></div>
                    </div>
                    <div class="col-sm-4">
                        <div class="icon_1"><img src="{{asset('Heado-1.0.0')}}/images/4965302.png" alt="Luxury Rentals Icon"></div>
                        <h4 class="design_text">Luxury Rentals</h4>
                        <p class="lorem_text">Travel in style with our premium luxury car rentals. Ideal for special occasions or business trips.</p>
                        <div class="icon_1"><img src="{{asset('Heado-1.0.0')}}/images/images__2_.png" alt="Van Rentals Icon"></div>
                        <h4 class="design_text">Van Rentals</h4>
                        <p class="lorem_text">Perfect for group travel! Our vans can accommodate larger parties comfortably.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
      <!--services section end -->
      <!--blog section start -->
      <div class="blog_section layout_padding">
         <div class="container">
            <h1 class="blog_taital"><span class="our_text">Our</span> Blog</h1>
            <p class="blog_text">There are many variations of passages of Lorem Ipsum available, but the majority have suffered </p>
            <div class="services_section_2 layout_padding">
               <div class="row">
                  <div class="col-md-4">
                     <div class="box_main">
                        <div class="student_bg"><img src="images/img-3.png" class="student_bg"></div>
                        <div class="image_15">19<br>Feb</div>
                        <h4 class="hannery_text">There are many variations</h4>
                        <p class="fact_text">dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud </p>
                     </div>
                  </div>
                  <div class="col-md-4">
                     <div class="box_main">
                        <div class="student_bg"><img src="images/img-4.png" class="student_bg"></div>
                        <div class="image_15">19<br>Feb</div>
                        <h4 class="hannery_text">There are many variations</h4>
                        <p class="fact_text">dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud </p>
                     </div>
                  </div>
                  <div class="col-md-4">
                     <div class="box_main">
                        <div><img src="images/img-5.png" class="student_bg"></div>
                        <div class="image_15">19<br>Feb</div>
                        <h4 class="hannery_text">There are many variations</h4>
                        <p class="fact_text">dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud </p>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!--blog section end -->

      <!--client section start -->
      <div class="client_section layout_padding">
         <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
               <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
               <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
               <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
               <div class="carousel-item active">
                  <div class="container">
                     <h1 class="blog_taital"><span class="tes_text">Tes</span>timonial</h1>
                     <div class="client_section_2 layout_padding">
                        <div class="row">
                           <div class="col-md-6">
                              <div class="client_box active">
                                 <div class="left_main">
                                    <div class="image_6"><img src="images/img-6.png"></div>
                                 </div>
                                 <div class="right_main">
                                    <h6 class="magna_text active">Magna</h6>
                                    <p class="consectetur_text active">Consectetur adipiscing</p>
                                    <div class="quote_icon active"></div>
                                 </div>
                                 <p class="ipsum_text active">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrudLorem ipsum</p>
                              </div>
                           </div>
                           <div class="col-md-6">
                              <div class="client_box">
                                 <div class="left_main">
                                    <div class="image_6"><img src="images/img-6.png"></div>
                                 </div>
                                 <div class="right_main">
                                    <h6 class="magna_text">Magna</h6>
                                    <p class="consectetur_text">Consectetur adipiscing</p>
                                    <div class="quote_icon"></div>
                                 </div>
                                 <p class="ipsum_text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrudLorem ipsum</p>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="carousel-item">
                  <div class="container">
                     <h1 class="blog_taital"><span class="tes_text">Tes</span>timonial</h1>
                     <div class="client_section_2 layout_padding">
                        <div class="row">
                           <div class="col-md-6">
                              <div class="client_box active">
                                 <div class="left_main">
                                    <div class="image_6"><img src="images/img-6.png"></div>
                                 </div>
                                 <div class="right_main">
                                    <h6 class="magna_text active">Magna</h6>
                                    <p class="consectetur_text active">Consectetur adipiscing</p>
                                    <div class="quote_icon active"></div>
                                 </div>
                                 <p class="ipsum_text active">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrudLorem ipsum</p>
                              </div>
                           </div>
                           <div class="col-md-6">
                              <div class="client_box">
                                 <div class="left_main">
                                    <div class="image_6"><img src="images/img-6.png"></div>
                                 </div>
                                 <div class="right_main">
                                    <h6 class="magna_text">Magna</h6>
                                    <p class="consectetur_text">Consectetur adipiscing</p>
                                    <div class="quote_icon"></div>
                                 </div>
                                 <p class="ipsum_text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrudLorem ipsum</p>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="carousel-item">
                  <div class="container">
                     <h1 class="blog_taital"><span class="tes_text">Tes</span>timonial</h1>
                     <div class="client_section_2 layout_padding">
                        <div class="row">
                           <div class="col-md-6">
                              <div class="client_box active">
                                 <div class="left_main">
                                    <div class="image_6"><img src="images/img-6.png"></div>
                                 </div>
                                 <div class="right_main">
                                    <h6 class="magna_text active">Magna</h6>
                                    <p class="consectetur_text active">Consectetur adipiscing</p>
                                    <div class="quote_icon active"></div>
                                 </div>
                                 <p class="ipsum_text active">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrudLorem ipsum</p>
                              </div>
                           </div>
                           <div class="col-md-6">
                              <div class="client_box">
                                 <div class="left_main">
                                    <div class="image_6"><img src="images/img-6.png"></div>
                                 </div>
                                 <div class="right_main">
                                    <h6 class="magna_text">Magna</h6>
                                    <p class="consectetur_text">Consectetur adipiscing</p>
                                    <div class="quote_icon"></div>
                                 </div>
                                 <p class="ipsum_text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrudLorem ipsum</p>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!--client section end -->
      <!--footer section start -->
      <div class="footer_section layout_padding">
         <div class="container">
            <div class="address_main">
               <div class="address_text"><a href="#"><img src="images/map-icon.png"><span class="padding_left_15">Loram Ipusm hosting web</span></a></div>
               <div class="address_text"><a href="#"><img src="images/call-icon.png"><span class="padding_left_15">+7586656566</span></a></div>
               <div class="address_text"><a href="#"><img src="images/mail-icon.png"><span class="padding_left_15">demo@gmail.com</span></a></div>
            </div>
            <div class="footer_section_2">
               <div class="row">
                  <div class="col-lg-3 col-sm-6">
                     <h4 class="link_text">Useful link</h4>
                     <div class="footer_menu">
                        <ul>
                           <li><a href="index.html">Home</a></li>
                           <li><a href="about.html">About</a></li>
                           <li><a href="services.html">Services</a></li>
                           <li><a href="contact.html">Contact Us</a></li>
                        </ul>
                     </div>
                  </div>
                  <div class="col-lg-3 col-sm-6">
                     <h4 class="link_text">web design</h4>
                     <p class="footer_text">Lorem ipsum dolor sit amet, consectetur adipiscinaliquaL oreadipiscing </p>
                  </div>
                  <div class="col-lg-3 col-sm-6">
                     <h4 class="link_text">social media</h4>
                     <div class="social_icon">
                        <ul>
                           <li><a href="#"><img src="images/fb-icon.png"></a></li>
                           <li><a href="#"><img src="images/twitter-icon.png"></a></li>
                           <li><a href="#"><img src="images/linkedin-icon.png"></a></li>
                           <li><a href="#"><img src="images/youtub-icon.png"></a></li>
                        </ul>
                     </div>
                  </div>
                  <div class="col-lg-3 col-sm-6">
                     <h4 class="link_text">Our Branchs</h4>
                     <p class="footer_text_1">Lorem ipsum dolor sit amet, consectetur adipiscinaliquaLoreadipiscing </p>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!--client section end -->
      <!--copyright section start -->
      <div class="copyright_section">
         <div class="container">
            <p class="copyright_text">Copyright 2023 All Right Reserved By <a href="https://html.design">Free Html Templates</a> Distributed by: <a href="https://themewagon.com">ThemeWagon</a></p>
         </div>
      </div>
      <!--copyright section end -->
      <!-- Javascript files-->
      <script src="{{asset('Heado-1.0.0')}}/js/jquery.min.js"></script>
      <script src="{{asset('Heado-1.0.0')}}/js/popper.min.js"></script>
      <script src="{{asset('Heado-1.0.0')}}/js/bootstrap.bundle.min.js"></script>
      <script src="{{asset('Heado-1.0.0')}}/js/jquery-3.0.0.min.js"></script>
      <script src="{{asset('Heado-1.0.0')}}/js/plugin.js"></script>
      <!-- sidebar -->
      <script src="{{asset('Heado-1.0.0')}}/js/jquery.mCustomScrollbar.concat.min.js"></script>
      <script src="{{asset('Heado-1.0.0')}}/js/custom.js"></script>
      <!-- javascript --> 
      <script src="{{asset('Heado-1.0.0')}}/js/owl.carousel.js"></script>
      <script src="{{asset('Heado-1.0.0')}}/https:cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.js"></script> 
      <script type="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2//2.0.0-beta.2.4/owl.carousel.min.js"></script>
      <script src="{{asset('Heado-1.0.0')}}/https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
      <script>window.jQuery || document.write('<script src="{{asset('Heado-1.0.0')}}/../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
      <script src="{{asset('Heado-1.0.0')}}/../../assets/js/vendor/popper.min.js"></script>
      <script src="{{asset('Heado-1.0.0')}}/../../dist/js/bootstrap.min.js"></script>
   </body>
</html>