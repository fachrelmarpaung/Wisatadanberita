<?php 
session_start();
require('function/settings.php');
$info = new General();
$website = $info->GlobalInfo();
$artikel = $info->ViewArtikel();

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
  <link rel="shortcut icon" href="../assets/job/<?= $website['Icon']; ?>">

  <!-- Font -->
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&display=swap" rel="stylesheet">

  <!-- CSS Implementing Plugins -->
  <link rel="stylesheet" href="../assets/vendor/bootstrap-icons/font/bootstrap-icons.css">
  <link rel="stylesheet" href="../assets/vendor/hs-mega-menu/dist/hs-mega-menu.min.css">
  <link rel="stylesheet" href="../assets/vendor/swiper/swiper-bundle.min.css">

  <!-- Leaflet CSS -->
  <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
  <!-- Leaflet JavaScript -->
  <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
  <!-- Leaflet Control Geocoder CSS -->
  <link rel="stylesheet" href="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.css" />
  <!-- Leaflet Control Geocoder JavaScript -->
  <script src="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.js"></script>
  <!-- CSS <?= $website['Title']; ?> Template -->
  <link rel="stylesheet" href="../assets/css/theme.min.css">
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
          <img class="navbar-brand-logo" src="../assets/job/<?= $website['Icon']; ?>" alt="Image Description">
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
                        <a class="dropdown-item active" href="../#Informasi"><i class="bi-building me-2"></i> Informasi Mangrove</a>
                        <a class="dropdown-item " href="../explorewisata/1"><i class="bi bi-airplane-engines-fill"></i> Wisata</a>
                        <a class="dropdown-item " href="../exploreberita/1"><i class="bi bi-newspaper"></i> Berita</a>
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
                <a class="nav-link" href="../tentang">Tentang</a>
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
                <a class="btn btn-dark d-none d-lg-inline-block" href="../member">Masuk</a>
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
	background: url("../assets/job/05.png") center center repeat;
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
    <div class="container content-space-2">
        <!-- Heading -->
        <div class="w-lg-65 text-center mx-lg-auto mb-5 mb-sm-7 mb-lg-10">
          <h2>Wisata</h2>
          <p>Wilayah Ekowisata Mangrove Desa Lubuk Kasih memliki garis pantai yang panjang dan dikelilingi keindahan oleh pohon mangrove yang rimbun dan indah. Kawasan Mangrove Desa Lubuk Kasih berpotensi menjadi ekowisata yang layak untuk dikunjungi, karena memiliki sarana dan prasarana yang cukup mendukung seperti : Cafe Sawah, Warung Makan, Mushola dan beberapa fasilitas pendukung lainnya.</p>
        </div>
        <!-- End Heading -->

        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3">
          <?php
              if ($artikel !== false) {
                  if ($artikel->num_rows > 0) {
                      $i = 1;
                      $s = ((@$_GET['p'] * 10) - 10);
                      while ($KK = $artikel->fetch_assoc()) {

          ?>
          <div class="col mb-5 mb-md-0">
            <!-- Card -->
            <a class="card card-ghost card-transition-zoom h-100" href="../wisata/<?= $KK['id']; ?>">
              <div class="card-transition-zoom-item">
                <img class="card-img" src="../assets/job/mangrove.JPG" alt="<?= $KK['Gambar']; ?>">
              </div>

              <div class="card-body">
                <h4><?= $KK['Title']; ?></h4>
                <p class="card-text"><?= $KK['Deskripsi']; ?></p>
              </div>

              <div class="card-footer">
                <span class="card-link">Lihat Wisata</span>
              </div>
            </a>
            <!-- End Card -->
          </div>
            <!-- end row -->
            <?php
                    }
                } else {
                    ?>
                    <center>
                      <h3> No Data </h3>
                    </center>
                <?php
                }
            } else {
                ?>
                <center>
                  <h3> No Data </h3>
                </center>
            <?php
            } ?>
        </div>
          </td>
          
    <nav aria-label="Page navigation" style="float:right">
        <ul class="pagination pagination-primary">
            <?php if ($GLOBALS['jmlhhalaman'] > 1) {
                if ($id > 1) { ?>
                    <li class="page-item"><a class="page-link" href="<?= $path; ?>member/halaman/<?= ($id - 1); ?>">Prev</a></li>
                    <li class="page-item "><a class="page-link" href="<?= $path; ?>member/halaman/<?= ($id - 1); ?>"><?= ($id - 1); ?></a></li>
                <?PHP } elseif ($id > 2) { ?>
                    <li class="page-item"><a class="page-link" href="<?= $path; ?>member/halaman/<?= ($id - 1); ?>">Prev</a></li>
                    <li class="page-item "><a class="page-link" href="<?= $path; ?>member/halaman/<?= ($id - 2); ?>"><?= ($id - 3); ?></a></li>
                    <li class="page-item "><a class="page-link" href="<?= $path; ?>member/halaman/<?= ($id - 2); ?>"><?= ($id - 2); ?></a></li>
                    <li class="page-item "><a class="page-link" href="<?= $path; ?>member/halaman/<?= ($id - 1); ?>"><?= ($id - 1); ?></a></li>
                    
                <?PHP } ?>
                <li class="page-item active"><a class="page-link" href="<?= $path; ?>member/halaman/<?= $id; ?>"><?= $id; ?></a></li>
                <?php if ($id < ($GLOBALS['jmlhhalaman'] - 1)) { ?>
                    <li class="page-item"><a class="page-link" href="<?= $path; ?>member/halaman/<?= ($id + 1); ?>"><?= ($id + 1); ?></a></li>
                    <li class="page-item"><a class="page-link" href="<?= $path; ?>member/halaman/<?= ($id + 2); ?>"><?= ($id + 2); ?></a></li>
                    <li class="page-item"><a class="page-link" href="<?= $path; ?>member/halaman/<?= ($id + 2); ?>"><?= ($id + 3); ?></a></li>
                    <li class="page-item"><a class="page-link" href="<?= $path; ?>member/halaman/<?= ($id + 1); ?>">Next</a></li>
                <?PHP } elseif ($id < $GLOBALS['jmlhhalaman']) { ?>
                    <li class="page-item"><a class="page-link" href="<?= $path; ?>member/halaman/<?= ($id + 1); ?>"><?= ($id + 1); ?></a></li>
                    <li class="page-item"><a class="page-link" href="<?= $path; ?>member/halaman/<?= ($id + 1); ?>">Next</a></li>
            <?PHP }
            } ?>
        </ul>
    </nav>
    </div>
    <!-- End Hero -->

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

      <div id="Contact" class="border-bottom border-white-10">
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
              <li><a class="link link-light link-light-75" href="../#Wisata">Wisata <i class="bi-box-arrow-up-right ms-1"></i></a></li>
              <li><a class="link link-light link-light-75" href="../tentang">Tentang</a></li>
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
                    <img class="avatar avatar-xss avatar-circle me-2" src="../assets/vendor/flag-icon-css/flags/1x1/id.svg" alt="Image description" width="16"/>
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
  <script src="../assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>

  <!-- JS Implementing Plugins -->
  <script src="../assets/vendor/hs-header/dist/hs-header.min.js"></script>
  <script src="../assets/vendor/hs-mega-menu/dist/hs-mega-menu.min.js"></script>
  <script src="../assets/vendor/hs-go-to/dist/hs-go-to.min.js"></script>
  <script src="../assets/vendor/swiper/swiper-bundle.min.js"></script>

  <!-- JS <?= $website['Title']; ?> -->
  <script src="../assets/js/theme.min.js"></script>

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
