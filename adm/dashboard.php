<?php 
error_reporting(E_ALL);
session_start();
ob_start();
if(empty($_SESSION['user'])){
    header('Location: ../member');
}
$web = $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
$pages=explode("/",$web);
$path = 'https:/'.$_SERVER['SERVER_NAME'].'/member/';
if(count($pages) > 5){
  $assets = '../../../';
}elseif(count($pages) > 4){
  $assets = '../../';
  $pathweb = '../';
}elseif(count($pages) > 3){
  $assets = '../';
  $pathweb = './';
}else{
  $assets = '../';
}

require('../function/settings.php');
$General = new General();
$admin = new Admin();

// Page Settings
$page = isset($_GET['page']) ? intval($_GET['page']) : 1;
$perPage = 10;
$offset = ($page - 1) * $perPage;
switch (@$pages[3]) {
  case 'pengguna':
    $file = 'pengguna.php';
    break;
  case 'createpengguna':
    $file = 'createuser.php';
    break;
  case 'edituser':
    $file = 'edituser.php';
    break;
  case 'createartikel':
    $file = 'createartikel.php';
    break;
  case 'editartikel':
    $file = 'editartikel.php';
    break;
  case 'artikel':
    $file = 'artikel.php';
    break;
  case 'about':
    $file = 'about.php';
    break;
  default:
  $file = 'dash.php';
  break;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <!--  Title -->
  <title>Admin |
    <?= $General->GlobalInfo()['Title'] ?>
  </title>
  <!--  Required Meta Tag -->
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <meta name="handheldfriendly" content="true" />
  <meta name="MobileOptimized" content="width" />
  <meta name="description" content="Mordenize" />
  <meta name="author" content=" />
    <meta name=" keywords" content="Mordenize" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <!--  Favicon -->
  <link rel="shortcut icon" type="image/png" href="<?= $assets; ?>assets/job/<?= $General->GlobalInfo()['Icon'] ?>" />
  <!-- Owl Carousel  -->
  <link rel="stylesheet" href="<?= $assets; ?>libs/dist/libs/owl.carousel/dist/assets/owl.carousel.min.css" />

  <!-- Core Css -->
  <link id="themeColors" rel="stylesheet" href="<?= $assets; ?>libs/dist/css/style.min.css" />
</head>

<body>
  <!-- Preloader -->
  <div class="preloader">
    <img src="<?= $assets; ?>assets/job/<?= $General->GlobalInfo()['Icon'] ?>" alt="loader"
      class="lds-ripple img-fluid" />
  </div>
  <!-- Preloader -->
  <div class="preloader">
    <img src="<?= $assets; ?>assets/job/<?= $General->GlobalInfo()['Icon'] ?>" alt="loader"
      class="lds-ripple img-fluid" />
  </div>
  <!--  Body Wrapper -->
  <div class="page-wrapper" id="main-wrapper" data-theme="blue_theme" data-layout="vertical" data-sidebartype="full"
    data-sidebar-position="fixed" data-header-position="fixed">
    <!-- Sidebar Start -->
    <aside class="left-sidebar">
      <!-- Sidebar scroll-->
      <div>
        <div class="brand-logo d-flex align-items-center justify-content-between">
          <a href="dashboard" class="text-nowrap logo-img">
            <div class="light-logo container">
              <h3 class="text-white text-uppercase">Admin Panel</h3>
            </div>
            <div class="dark-logo container">
              <h3 class="text-dark text-uppercase">Admin Panel</h3>
            </div>
          </a>
          <div class="close-btn d-lg-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
            <i class="ti ti-x fs-8"></i>
          </div>
        </div>
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav scroll-sidebar" data-simplebar>
          <ul id="sidebarnav">
            <!-- ============================= -->
            <!-- Home -->
            <!-- ============================= -->
            <li class="nav-small-cap">
              <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
              <span class="hide-menu">Home</span>
            </li>
            <!-- =================== -->
            <!-- Dashboard -->
            <!-- =================== -->
            <li class="sidebar-item">
              <a class="sidebar-link" href="<?= $pathweb; ?>dashboard" aria-expanded="false">
                <span>
                  <i class="ti ti-home"></i>
                </span>
                <span class="hide-menu">Home</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="<?= $pathweb; ?>pengguna/1" aria-expanded="false">
                <span>
                  <i class="ti ti-user"></i>
                </span>
                <span class="hide-menu">Pengguna</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="<?= $pathweb; ?>artikel/1" aria-expanded="false">
                <span>
                  <i class="ti ti-news"></i>
                </span>
                <span class="hide-menu">Artikel</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="<?= $pathweb; ?>about" aria-expanded="false">
                <span>
                  <i class="ti ti-vocabulary"></i>
                </span>
                <span class="hide-menu">About</span>
              </a>
            </li>
            <!-- ============================= -->
            <!-- Laporan -->
            <!-- ============================= -->
            <li class="nav-small-cap">
              <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
              <span class="hide-menu">Laporan</span>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="<?= $pathweb; ?>laporan" aria-expanded="false">
                <span>
                  <i class="ti ti-calendar"></i>
                </span>
                <span class="hide-menu">Laporan</span>
              </a>
            </li>
          </ul>
        </nav>
        <div class="fixed-profile p-3 bg-light-secondary rounded sidebar-ad mt-3">
          <div class="hstack gap-3">
            <div class="john-img">
              <img src="<?= $assets; ?>libs/dist/images/profile/user-1.jpg" class="rounded-circle" width="40"
                height="40" alt=""
                />
              </div>
              <div class="john-title">
              <h6 class="mb-0 fs-4 fw-semibold">ADMIN</h6>
              <span class="fs-2 text-dark">KETUA</span>
            </div>
            <button class="border-0 bg-transparent text-primary ms-auto" tabindex="0" type="button" aria-label="logout"
              data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="logout">
              <i class="ti ti-power fs-6"></i>
            </button>
          </div>
        </div>
        <!-- End Sidebar navigation -->
      </div>
      <!-- End Sidebar scroll-->
    </aside>
    <!--  Sidebar End -->
    <!--  Main wrapper -->
    <div class="body-wrapper">
      <!--  Header Start -->
      <header class="app-header">
        <nav class="navbar navbar-expand-lg navbar-light">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link sidebartoggler nav-icon-hover ms-n3" id="headerCollapse" href="javascript:void(0)">
                <i class="ti ti-menu-2"></i>
              </a>
            </li>
          </ul>
          <div class="d-block d-lg-none">
            <img src="<?= $assets; ?>assets/job/dark-logo.svg" class="dark-logo" width="180" alt="" />
            <img src="<?= $assets; ?>assets/job/light-logo.svg" class="light-logo" width="180" alt="" />
          </div>
          <button class="navbar-toggler p-0 border-0" type="button" data-bs-toggle="collapse"
            data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="p-2">
              <i class="ti ti-dots fs-7"></i>
            </span>
          </button>
          <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <div class="d-flex align-items-center justify-content-between">
              <a href="javascript:void(0)" class="nav-link d-flex d-lg-none align-items-center justify-content-center"
                type="button" data-bs-toggle="offcanvas" data-bs-target="#mobilenavbar"
                aria-controls="offcanvasWithBothOptions">
                <i class="ti ti-align-justified fs-7"></i>
              </a>
              <ul class="navbar-nav flex-row ms-auto align-items-center justify-content-center">
                <li class="nav-item dropdown">
                  <a class="nav-link pe-0" href="javascript:void(0)" id="drop1" data-bs-toggle="dropdown"
                    aria-expanded="false">
                    <div class="d-flex align-items-center">
                      <div class="user-profile-img">
                        <img src="<?= $assets; ?>libs/dist/images/profile/user-1.jpg" class="rounded-circle" width="35"
                          height="35" alt=""
                          />
                        </div>
                      </div>
                    </a>
                    <div
                      class=" dropdown-menu content-dd dropdown-menu-end dropdown-menu-animate-up"
                          aria-labelledby="drop1">
                        <div class="profile-dropdown position-relative" data-simplebar>
                          <div class="py-3 px-7 pb-0">
                            <h5 class="mb-0 fs-5 fw-semibold">User Profile</h5>
                          </div>
                          <div class="d-flex align-items-center py-9 mx-7 border-bottom">
                            <img src="<?= $assets; ?>libs/dist/images/profile/user-1.jpg" class="rounded-circle"
                              width="80" height="80" alt=""
                          />
                          <div class="ms-3">
                            <h5 class="mb-1 fs-3">
                              <?= $_SESSION['user']['username']; ?>
                            </h5>
                            <span class="mb-1 d-block text-dark"><?= $_SESSION['user']['status'] === '0' ? "Admin" : "Member"; ?></span>
                            <p class="mb-0 d-flex text-dark align-items-center gap-2">
                              <i class="ti ti-mail fs-4"></i> <?= $_SESSION['user']['email']; ?>
                            </p>
                          </div>
                        </div>
                        <div class="message-body">
                          <a href="#" class="py-8 px-7 mt-8 d-flex align-items-center">
                            <span class="d-flex align-items-center justify-content-center bg-light rounded-1 p-6">
                              <img src="<?= $assets; ?>libs/dist/images/svgs/icon-account.svg" alt=""
                                width="24" height="24" />
                            </span>
                            <div class="w-75 d-inline-block v-middle ps-3">
                              <h6 class="mb-1 bg-hover-primary fw-semibold">
                                My Profile
                              </h6>
                              <span class="d-block text-dark">Account Settings</span>
                            </div>
                          </a>
                        </div>
                        <div class="d-grid py-4 px-7 pt-8">
                          <div
                            class="upgrade-plan bg-light-primary position-relative overflow-hidden rounded-4 p-4 mb-9">
                            <div class="row">
                              <div class="col-6">
                                <h5 class="fs-4 mb-3 w-50 fw-semibold text-dark">
                                  Administrator
                                </h5>
                              </div>
                              <div class="col-6">
                                <div class="m-n4">
                                  <img src="<?= $assets; ?>libs/dist/images/backgrounds/unlimited-bg.png" alt=""
                                    class="w-100" />
                                </div>
                              </div>
                            </div>
                          </div>
                          <a href="#" class="btn btn-outline-primary">Log Out</a>
                        </div>
                      </div>
                    </div>
                </li>
              </ul>
            </div>
          </div>
        </nav>
      </header>
      <!--  Header End -->
      <div class="container-fluid" style="max-width:none;">
        <?php 
            include($file);
          ?>
      </div>
    </div>
    <!--  Mobilenavbar -->
    <div class="offcanvas offcanvas-start" data-bs-scroll="true" tabindex="-1" id="mobilenavbar"
      aria-labelledby="offcanvasWithBothOptionsLabel">
      <nav class="sidebar-nav scroll-sidebar">
        <div class="offcanvas-header justify-content-between">
          <img src="<?= $assets; ?>assets/job/favicon.png" alt=""
            class=" img-fluid" />
          <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body profile-dropdown mobile-navbar" data-simplebar="
          data-simplebar
        >
          <ul id=" sidebarnav">
          <li class="sidebar-item">
            <a class="sidebar-link" href="#" aria-expanded="false">
              <span>
                <i class="ti ti-message-dots"></i>
              </span>
              <span class="hide-menu">Chat</span>
            </a>
          </li>
          <li class="sidebar-item">
            <a class="sidebar-link" href="#" aria-expanded="false">
              <span>
                <i class="ti ti-calendar"></i>
              </span>
              <span class="hide-menu">Calendar</span>
            </a>
          </li>
          <li class="sidebar-item">
            <a class="sidebar-link" href="#" aria-expanded="false">
              <span>
                <i class="ti ti-mail"></i>
              </span>
              <span class="hide-menu">Email</span>
            </a>
          </li>
          </ul>
        </div>
      </nav>
    </div>

    <!--  Search Bar -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content rounded-1">
          <div class="modal-header border-bottom">
            <input type="search" class="form-control fs-3" placeholder="Search here" id="search" />
            <span data-bs-dismiss="modal" class="lh-1 cursor-pointer">
              <i class="ti ti-x fs-5 ms-3"></i>
            </span>
          </div>
          <div class="modal-body message-body" data-simplebar=">
            <h5 class=" mb-0 fs-5 p-1">Quick Page Links</h5>
            <ul class="list mb-0 py-2">
              <li class="p-1 mb-1 bg-hover-light-black">
                <a href="<?= $assets; ?>dashboard">
                  <span class="fs-3 text-black fw-normal d-block">Dashboard</span>
                  <span class="fs-3 text-muted d-block">/dashboards/dashboard2</span>
                </a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
    <!--  Customizer -->
    <button class="btn btn-primary p-3 rounded-circle d-flex align-items-center justify-content-center customizer-btn"
      type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample" aria-controls="offcanvasExample">
      <i class="ti ti-settings fs-7" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Settings"></i>
    </button>
    <div class="offcanvas offcanvas-end customizer" tabindex="-1" id="offcanvasExample"
      aria-labelledby="offcanvasExampleLabel" data-simplebar=""
    >
      <div
        class=" d-flex align-items-center justify-content-between p-3 border-bottom">
      <h4 class="offcanvas-title fw-semibold" id="offcanvasExampleLabel">
        Settings
      </h4>
      <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body p-4">
      <div class="theme-option pb-4">
        <h6 class="fw-semibold fs-4 mb-1">Theme Option</h6>
        <div class="d-flex align-items-center gap-3 my-3">
          <a href="javascript:void(0)" onclick="toggleTheme('<?= $assets; ?>libs/dist/css/style.min.css')"
            class="rounded-2 p-9 customizer-box hover-img d-flex align-items-center gap-2 light-theme text-dark">
            <i class="ti ti-brightness-up fs-7 text-primary"></i>
            <span class="text-dark">Light</span>
          </a>
          <a href="javascript:void(0)" onclick="toggleTheme('<?= $assets; ?>libs/dist/css/style-dark.min.css')"
            class="rounded-2 p-9 customizer-box hover-img d-flex align-items-center gap-2 dark-theme text-dark">
            <i class="ti ti-moon fs-7"></i>
            <span class="text-dark">Dark</span>
          </a>
        </div>
      </div>
    </div>
  </div>
  <!--  Customizer -->
  <!--  Import Js Files -->
  <script src="<?= $assets; ?>libs/dist/libs/jquery/dist/jquery.min.js"></script>
  <script src="<?= $assets; ?>libs/dist/libs/simplebar/dist/simplebar.min.js"></script>
  <script src="<?= $assets; ?>libs/dist/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <!--  core files -->
  <script src="<?= $assets; ?>libs/dist/js/app.min.js"></script>
  <script src="<?= $assets; ?>libs/dist/js/app.init.js"></script>
  <script src="<?= $assets; ?>libs/dist/js/app-style-switcher.js"></script>
  <script src="<?= $assets; ?>libs/dist/js/sidebarmenu.js"></script>
  <script src="<?= $assets; ?>libs/dist/js/custom.js"></script>
  <!--  current page js files -->
  <script src="<?= $assets; ?>libs/dist/libs/owl.carousel/dist/owl.carousel.min.js"></script>
  <script src="<?= $assets; ?>libs/dist/libs/apexcharts/dist/apexcharts.min.js"></script>
  <script src="<?= $assets; ?>libs/dist/js/dashboard.js"></script>
</body>

</html>