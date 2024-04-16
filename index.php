<?php 
session_start();
require('function/settings.php');
$ip = '36.71.139.207'; // Get the user's IP address
$userAgent = $_SERVER['HTTP_USER_AGENT']; // Get user agent
$info = new General();
$website = $info->GlobalInfo();
$wisata = $info->ViewWisata();
// Pencegahan data down pada database
if(@$_SESSION['meet'] != true){
  $result = $info->ipcheck($ip,$userAgent);
  $_SESSION['meet'] = true;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Required Meta Tags Always Come First -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Title -->
  <title><?= $website['Title']; ?></title>

  <!-- Favicon -->
  <link rel="shortcut icon" href="assets/job/<?= $website['Icon']; ?>">

  <!-- Font -->
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&display=swap" rel="stylesheet">

  <!-- CSS Implementing Plugins -->
  <link rel="stylesheet" href="./assets/vendor/bootstrap-icons/font/bootstrap-icons.css">
  <link rel="stylesheet" href="./assets/vendor/hs-mega-menu/dist/hs-mega-menu.min.css">
  <link rel="stylesheet" href="./assets/vendor/swiper/swiper-bundle.min.css">

  <!-- Leaflet CSS -->
  <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
  <!-- Leaflet JavaScript -->
  <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
  <!-- Leaflet Control Geocoder CSS -->
  <link rel="stylesheet" href="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.css" />
  <!-- Leaflet Control Geocoder JavaScript -->
  <script src="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.js"></script>
  <!-- CSS <?= $website['Title']; ?> Template -->
  <link rel="stylesheet" href="./assets/css/theme.min.css">
</head>

<body>
  <!-- ========== HEADER ========== -->
  <header id="header" class="navbar navbar-expand-lg navbar-end navbar-light navbar-absolute-top navbar-show-hide"
          data-hs-header-options='{
            "fixMoment": 0,
            "fixEffect": "slide"
          }'>
    <div class="container">
      <nav class="js-mega-menu navbar-nav-wrap">
        <!-- Default Logo -->
        <a class="navbar-brand" href="https://<?= $_SERVER['SERVER_NAME']; ?>" aria-label="<?= $website['Title']; ?>">
          <img class="navbar-brand-logo" src="assets/job/<?= $website['Icon']; ?>" alt="Image Description">
        </a>
        <!-- End Default Logo -->

        <!-- Toggler -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-default">
            <i class="bi-list"></i>
          </span>
          <span class="navbar-toggler-toggled">
            <i class="bi-x"></i>
          </span>
        </button>
        <!-- End Toggler -->
      
        <!-- Collapse -->
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
          <div class="navbar-absolute-top-scroller">
            <ul class="navbar-nav nav-pills">
              <!-- Landings -->
              <li class="hs-has-mega-menu nav-item"
                  data-hs-mega-menu-item-options='{
                    "desktop": {
                      "maxWidth": "40rem"
                    }
                  }'>
                <a id="landingsMegaMenu" class="hs-mega-menu-invoker nav-link dropdown-toggle " aria-current="page" href="#" role="button" aria-expanded="false">Halaman Utama</a>

                <!-- Mega Menu -->
                <div class="hs-mega-menu dropdown-menu" aria-labelledby="landingsMegaMenu" style="min-width: 25rem;">
                  <!-- Main Content -->
                  <div class="row">
                    <div class="col-lg d-none d-lg-block">
                      <div class="d-flex align-items-start flex-column bg-light rounded-3 h-100 p-4">
                        <span class="fs-3 fw-bold d-block">Ekowisata Mangrove</span>
                        <p class="text-body">Ekowisata Mangrove Desa Lubuk Kasih, Kecamatan Berandan Barat
                          </p>
                      </div>
                    </div>

                    <div class="col-sm">
                      <div class="navbar-dropdown-menu-inner">
                        <span class="dropdown-header">Halaman Utama</span>
                        <a class="dropdown-item active" href="#Informasi"><i class="bi-building me-2"></i> Informasi Mangrove</a>
                        <a class="dropdown-item " href="#Wisata"><i class="bi bi-airplane-engines-fill"></i> Wisata</a>
                        <a class="dropdown-item " href="exploreberita/1"><i class="bi bi-newspaper"></i> Berita</a>
                        <a class="dropdown-item " href="#Peta"><i class="bi bi-map me-2"></i> Lokasi</a>
                      </div>
                    </div>
                  </div>
                  <!-- End Main Content -->
                </div>
                <!-- End Mega Menu -->
              </li>
              <!-- End Landings -->

              <!-- Pages -->
              <li class="">
                <a class="nav-link" href="#Peta">Peta</a>
                <!-- End Mega Menu -->
              </li>
              <!-- End Pages -->

              <!-- Pages -->
              <li class="">
                <a class="nav-link" href="tentang">Tentang</a>
                <!-- End Mega Menu -->
              </li>

              <!-- Pages -->
              <li class="">
                <a class="nav-link" href="#Contact">Contact</a>
                <!-- End Mega Menu -->
              </li>
              <!-- End Pages -->

              <!-- Log in -->
              <li class="nav-item ms-lg-auto">
              </li>
              <!-- End Log in -->

              <!-- Sign up -->
              <li class="nav-item">
                <a class="btn btn-dark d-none d-lg-inline-block" href="./member">Masuk</a>
              </li>
              <!-- End Sign up -->
            </ul>
          </div>
        </div>
        <!-- End Collapse -->
      </nav>
    </div>
  </header>

  <!-- ========== END HEADER ========== -->

  <!-- ========== MAIN CONTENT ========== -->
  <style>
    .parallax-info{
	position: absolute;
	z-index: 50;
	width: 100%;
	height: 100%;
}
#video_background {
	position: absolute;
	bottom: 0px;
	right: 0px;
	min-width: 100%;
	min-height: 100%;
	width: auto;
	height: auto;
	z-index: -1000;
	overflow: hidden;
}
.container-video{
	position: relative;
	overflow: hidden;
	height: 700px;
}
.full_slide{}
.p-video {                /* give fit to box an aspect ratio */
    display: inline-block; /* let it be styled thusly */
    padding: 0;            /* get rid of pre-styling */
    margin: 0;
    width: 100%;           /* take up full width available */
    padding-top: 56.25%;   /* give aspect ratio of 16:9; "720 / 1280 = 0.5625" */
    height: auto;           /* don't want it to expand beyond padding */
    position: absolute;
	top: 0;
	z-index: 5;
}
.p-video > iframe {
    position: absolute;    /* expand to fill */
    top: 0px;
    left: 0px;
    right: 0px;
    bottom: 0px;
	z-index: -100;
}
.mk-video-mask {
	position: absolute;
	top: 0;
	left: 0;
	z-index: 10;
	width: 100%;
	height: 100%;
	background: url("assets/job/05.png") center center repeat;
}

.p-video-title{
	height: auto;
	margin: auto;
	text-align: center;
	opacity: 0.7;
	font-size: 50px;
	font-weight: 300;
	font-family: 'Roboto', sans-serif;
	letter-spacing: 30px;
	text-transform: uppercase;
	color: #fff;
	margin-top: 200px;
}
@media only screen and (max-width: 600px) {
  .p-video-title{
	  margin-top: 60px;
  }
  .p-video-title {
    font-size: 15px;
	letter-spacing: 10px;
  }
  .p-video-title img{
    width: 28px;
  }
  .container-video {
    height: auto;
  }
  .mk-video-mask {
    margin-top: -4px;
  }
}
video {
            width: 100%;
            height: auto; /* Maintain aspect ratio */
        }
.p-video-title span{}

  </style>
  <main id="content" role="main">
    <!-- Hero -->
    <div class="content-space-t-3" style="width: 100%;">
      <div class="row justify-content-lg-between align-items-lg-center" style="margin-right: 0 !important;margin-left: 0 !important;">
        <article class="container-video" style="padding-right: 0 !important;padding-left: 0 !important;">
        	<div class="parallax-info" >
            <div class="p-video-title">Selamat Datang di<br>
              Ekowisata <span><img src="assets/job/video-ico.png" alt='img'></span> Mangrove<br>
              Desa Lubuk Kasih,<br>
              Kecamatan Berandan Barat<br>
              </div>
            </div>
            <div class="mk-video-mask"></div>
            <div class="video-container" ><div id="player"></div></div>
              <video id="player" autoplay muted loop>
                <source src="assets/video/DJI 0873.mp4" type="video/mp4">
                <!-- Include additional sources for different video formats if needed -->
                Your browser does not support the video tag.
            </video>
        </article>
      </div>
      <!-- End Row -->
    </div>
    <!-- End Hero -->

    <!-- Features -->
    <div class="overflow-hidden" id="Informasi">
      <div class="container content-space-2 content-space-lg-3">
        <div class="row align-items-lg-center">
          <div class="col-lg-7 me-auto ms-lg-n10 mb-5 mb-lg-0">
            <div class="row align-items-center">
              <div class="col-4">
                <img class="img-fluid rounded-3" src="assets/job/<?= $website['bannerone']; ?>" alt="<?= $website['bannerone']; ?>">
              </div>
              <!-- End Col -->
              
              <div class="col-3">
                <img class="img-fluid rounded-3" src="assets/job/<?= $website['bannertwo']; ?>" alt="<?= $website['bannertwo']; ?>">
              </div>
              <!-- End Col -->

              <div class="col-5">
                <img class="img-fluid rounded-3" src="assets/job/<?= $website['bannerthree']; ?>" alt="<?= $website['bannerthree']; ?>">
              </div>
              <!-- End Col -->
            </div>
            <!-- End Row -->
          </div>
          <!-- End Col -->

          <div class="col-lg-5">
            <div class="mb-5">
              <h2>Hi, Selamat Datang di Ekowisata Mangrove</h2>
              <p style="letter-spacing: 2px;"><?= $website['Deskripsi']; ?></p>
            </div>

            <!-- List Checked -->
            <p>Tempat wisata yang tersedia :</p>
            <ul class="list-checked list-checked-soft-bg-primary list-checked-lg">
              <li class="list-checked-item">Cafe Sawah</li>
              <li class="list-checked-item">Dermaga</li>
              <li class="list-checked-item">Tambak</li>
            </ul>
            <!-- End List Checked -->
          </div>
          <!-- End Col -->
        </div>
        <!-- End Row -->
      </div>
    </div>
    <!-- End Features -->

    <!-- Card Grid -->
    <div id="Wisata" style="background-color: aliceblue;">
      <div class="container content-space-2">
        <!-- Heading -->
        <div class="w-lg-65 text-center mx-lg-auto mb-5 mb-sm-7 mb-lg-10">
          <h2>Wisata</h2>
          <p><?= $website['Desctwo']; ?></p>
        </div>
          <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3">
        <?php 
          if ($wisata !== false && $wisata->num_rows > 0) { // Check if there are rows returned from the query
              while ($wisatas = $wisata->fetch_assoc()) { 
          ?>
              <div class="col mb-5 mb-md-0">
                  <!-- Card -->
                  <div class="card card-ghost card-transition-zoom h-100">
                      <a href="wisata/<?= $wisatas['id']; ?>"> <!-- Link should be dynamic based on each item -->
                          <img class="card-img" src="assets/job/<?= $wisatas['Gambar']; ?>" alt="Image Description">
                          <div class="card-body">
                              <h4><?= $wisatas['Title']; ?></h4>
                              <p class="card-text"><?= $wisatas['Deskripsi']; ?></p>
                          </div>
                          <div class="card-footer">
                              <span class="card-link">Lihat Wisata</span>
                          </div>
                      </a>
                  </div>
                  <!-- End Card -->
              </div>
          <?php 
              } // End while loop
            } else { // If $wisata is empty or false
            ?>
            <center>
                <h3 class="text-muted">Tempat Wisata Kosong</h3>
            </center>
            <?php 
            } // End if-else condition
          ?>
          </div>
        <!-- End Row -->
        <div class="d-flex flex-row-reverse mt-5">
          <a href="explorewisata/1"><span class="card-link">Explore Wisata</span></a>
        </div>
      </div>
    </div>
    <!-- End Card Grid -->
    
    <!-- Clients -->
    <div id="Peta" class="content-space-2" style="padding-bottom: 0px !important; background-color: aliceblue;">
      <div class="text-center">
        <h2>Location</h2>
      </div>
      <!-- Swiper Slider -->
      <div class="js-swiper-clients swiper">
        <div id="map" style="height: 400px;"></div>
      </div>
      <!-- End Swiper Slider -->
    </div>
    <!-- End Clients -->
  </main>
  <!-- ========== END MAIN CONTENT ========== -->

  <!-- ========== FOOTER ========== -->
  <footer class="bg-dark">
    <div class="container">
      <div class="row align-items-center pt-8 pb-4">
        <div class="col-md mb-5 mb-md-0">
          <h2 class="fw-medium text-white-70 mb-0">Siahkan bergabung dengan<br><span class="fw-bold text-white">Ekowisata Mangrove</span> untuk dapat menikmati keindahannya</h2>
        </div>
      </div>
      <!-- End Row -->

      <div class="border-bottom border-white-10" id="Contact">
        <div class="row py-6">
          <div class="col-lg-8 mb-4">
          <!-- Contact Form -->
          <div class="overflow-hidden">
                    <!-- Card -->
                    <div class="card card-lg position-relative" style="background-color: #52607a;">
                      <!-- Card Body -->
                      <div class="card-body">
                        <h4 class="mb-4" style="color:white;">Hubungi Kami</h4>
          
                        <form>
                          <div class="mb-4">
                            <label class="form-label" for="contactsFormFirstName" style="color:white;">Nama</label>
                            <input type="text" class="form-control" name="contactsFormNameFirstName" id="contactsFormFirstName" placeholder="John Doe" aria-label="Jacob">
                          </div>
                          <!-- End Row -->
                          <div class="mb-4">
                            <label class="form-label" for="contactsFormFirstName" style="color:white;">Email</label>
                            <input type="email" class="form-control" name="contactsFormNameFirstName" id="contactsFormFirstName" placeholder="Jacob" aria-label="Jacob">
                          </div>
                          <!-- End Row -->
          
                          <!-- Form -->
                          <div class="mb-4">
                            <label class="form-label" for="contactsFormWorkEmail" style="color:white;">Subject</label>
                            <input type="text" class="form-control" name="contactsFormNameWorkEmail" id="contactsFormWorkEmail" placeholder="Subject" aria-label="email@site.com">
                          </div>
                          <!-- End Form -->
          
                          <!-- Form -->
                          <div class="mb-4">
                            <label class="form-label" for="contactsFormDetails" style="color:white;">Pesan</label>
                            <textarea class="form-control" name="contactsFormNameDetails" id="contactsFormDetails" placeholder="Isi Pesan" aria-label="Tell us about your payment sales" rows="4"></textarea>
                          </div>
                          <!-- End Form -->
          
                          <div class="d-grid">
                            <button type="submit" class="btn btn-primary btn-lg">Kirim Pesan</button>
                          </div>
                        </form>
                      <!-- End Card Body -->
                    </div>
                    <!-- End Card -->
                    <!-- End SVG Shape -->
                  </div>
                </div>
                <!-- End Col -->
              </div>
              <!-- End Row -->
          <!-- End Col -->

          <div class="col">
            <span class="text-cap text-white">Tentang</span>

            <!-- List -->
            <ul class="list-unstyled list-py-1 mb-5">
              <li><a class="link link-light link-light-75" href="#Wisata">Wisata <i class="bi-box-arrow-up-right ms-1"></i></a></li>
              <li><a class="link link-light link-light-75" href="tentang">Tentang</a></li>
              <li><a class="link link-light link-light-75" href="#Peta">Lokasi</a></li>
            </ul>
            <!-- End List -->
          </div>
          <!-- End Col -->

          <div class="col">
            <span class="text-cap text-white">Media Sosial</span>

            <!-- List -->
            <ul class="list-unstyled list-py-2 mb-0">
              <li><a class="link link-light link-light-75" href="mailto:<?= $website['Email']; ?>">
                <div class="d-flex">
                  <div class="flex-shrink-0">
                    <i class="bi-envelope-open-fill"></i>
                  </div>

                  <div class="flex-grow-1 ms-2">
                    <span>Email</span>
                  </div>
                </div>
              </a></li>

              <li><a class="link link-light link-light-75" href="https://facebook.com/<?= $website['Facebook']; ?>">
                <div class="d-flex">
                  <div class="flex-shrink-0">
                    <i class="bi-facebook"></i>
                  </div>

                  <div class="flex-grow-1 ms-2">
                    <span>Facebook</span>
                  </div>
                </div>
              </a></li>
            
              <li><a class="link link-light link-light-75" href="https://instagram.com/<?= $website['Instagram']; ?>">
                <div class="d-flex">
                  <div class="flex-shrink-0">
                    <i class="bi-instagram"></i>
                  </div>

                  <div class="flex-grow-1 ms-2">
                    <span>Instagram</span>
                  </div>
                </div>
              </a></li>
            </ul>
            <!-- End List -->
          </div>
          <!-- End Col -->
        </div>
        <!-- End Row -->
      </div>

      <div class="row align-items-md-center py-6">
        <div class="col-md mb-3 mb-md-0">
          <!-- List -->
          <ul class="list-inline list-px-2 mb-0">
            <li class="list-inline-item"><a class="link link-light link-light-75" href="#">Privacy and Policy</a></li>
            <li class="list-inline-item"><a class="link link-light link-light-75" href="#">Terms</a></li>
            <li class="list-inline-item"><a class="link link-light link-light-75" href="#">Status</a></li>
            <li class="list-inline-item">
              <!-- Button Group -->
              <div class="btn-group">
                <a class="link link-light link-light-75" href="javascript:;" id="selectLanguage" data-bs-toggle="dropdown" aria-expanded="false">
                  <span class="d-flex align-items-center">
                    <img class="avatar avatar-xss avatar-circle me-2" src="./assets/vendor/flag-icon-css/flags/1x1/id.svg" alt="Image description" width="16"/>
                    <span>Indonesia</span>
                  </span>
                </a>
              </div>
              <!-- End Button Group -->
            </li>
          </ul>
          <!-- End List -->
        </div>
        <!-- End Col -->

        <div class="col-md-auto">
          <p class="fs-5 text-white-70 mb-0">© <?= $website['Title']; ?>. <?= date('Y'); ?></p>
        </div>
        <!-- End Col -->
      </div>
      <!-- End Row -->
    </div>
  </footer>
  <!-- ========== END FOOTER ========== -->

  <!-- ========== SECONDARY CONTENTS ========== -->
  <!-- Go To -->
  <a class="js-go-to go-to position-fixed" href="javascript:;" style="visibility: hidden;"
     data-hs-go-to-options='{
       "offsetTop": 700,
       "position": {
         "init": {
           "right": "2rem"
         },
         "show": {
           "bottom": "2rem"
         },
         "hide": {
           "bottom": "-2rem"
         }
       }
     }'>
    <i class="bi-chevron-up"></i>
  </a>
  <!-- ========== END SECONDARY CONTENTS ========== -->

  <!-- JS Global Compulsory  -->
  <script src="./assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>

  <!-- JS Implementing Plugins -->
  <script src="./assets/vendor/hs-header/dist/hs-header.min.js"></script>
  <script src="./assets/vendor/hs-mega-menu/dist/hs-mega-menu.min.js"></script>
  <script src="./assets/vendor/hs-go-to/dist/hs-go-to.min.js"></script>
  <script src="./assets/vendor/swiper/swiper-bundle.min.js"></script>

  <!-- JS <?= $website['Title']; ?> -->
  <script src="./assets/js/theme.min.js"></script>

  <!-- JS Plugins Init. -->
  <script>
    (function() {
      // INITIALIZATION OF NAVBAR
      // =======================================================
      new HSHeader('#header').init()


      // INITIALIZATION OF MEGA MENU
      // =======================================================
      const megaMenu = new HSMegaMenu('.js-mega-menu', {
        desktop: {
          position: 'left'
        }
      })


      // INITIALIZATION OF GO TO
      // =======================================================
      new HSGoTo('.js-go-to')


      // INITIALIZATION OF SWIPER
      // =======================================================
      var swiper = new Swiper('.js-swiper-clients',{
        slidesPerView: 2,
        breakpoints: {
          380: {
            slidesPerView: 3,
            spaceBetween: 15,
          },
          768: {
            slidesPerView: 4,
            spaceBetween: 15,
          },
          1024: {
            slidesPerView: 5,
            spaceBetween: 15,
          },
        },
      });
    })()
    
    // Initialize Leaflet map
    var map = L.map('map').setView([<?= $website['longitude']; ?>, <?= $website['latitude']; ?>], 13); // Set initial center and zoom level

    // Add OpenStreetMap tile layer to the map
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
    }).addTo(map);

    // Add geocoder control to the map
    L.Control.geocoder().addTo(map);
  </script>
</body>
</html>
