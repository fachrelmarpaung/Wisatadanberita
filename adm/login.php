<?php 
session_start();
require('../function/settings.php');
$Gene = new General();
$info = $Gene->GlobalInfo();
if(isset($_POST['Login'])){
  $Admin = new Login($_POST['Username'],$_POST['Password']);
  $Login = $Admin->loginUser();
}
if(isset($_SESSION['user'])){
  header("Location: ./member/dashboard");
  exit;
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <!--  Title -->
    <title>Admin | <?= $info['Title']; ?></title>
    <!--  Required Meta Tag -->
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="handheldfriendly" content="true" />
    <meta name="MobileOptimized" content="width" />
    <meta name="description" content="Mordenize" />
    <meta name="author" content="" />
    <meta name="keywords" content="Mordenize" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!--  Favicon -->
    <link
      rel="shortcut icon"
      type="image/png"
      href="assets/job/<?= $info['Icon']; ?>"
    />
    <!-- Core Css -->
    <link
      id="themeColors"
      rel="stylesheet"
      href="libs/dist/css/style.min.css"
    />

    <!-- Icon -->
    <link
      rel="stylesheet"
      href="libs/dist/bootstrap-icons/font/bootstrap-icons.css"
    />
  </head>
  <body>
    <!-- Preloader -->
    <div class="preloader">
      <img
        src="libs/dist/images/logos/favicon.png"
        alt="loader"
        class="lds-ripple img-fluid"
      />
    </div>
    <!-- Preloader -->
    <div class="preloader">
      <img
        src="libs/dist/images/logos/favicon.png"
        alt="loader"
        class="lds-ripple img-fluid"
      />
    </div>
    <!--  Body Wrapper -->
    <div
      class="page-wrapper"
      id="main-wrapper"
      data-layout="vertical"
      data-sidebartype="full"
      data-sidebar-position="fixed"
      data-header-position="fixed"
    >
      <div class="position-relative overflow-hidden radial-gradient min-vh-100">
        <div class="position-relative z-index-5">
          <div class="row">
            <div class="col-lg-6 col-xl-8 col-xxl-8">
              <a
                href="#"
                class="text-nowrap h3 logo-img d-block px-4 py-9 pb-5 pb-xl-0 w-100"
              >
                <?= $_SERVER['SERVER_NAME']; ?>
              </a>
              <div
                class="d-none d-lg-flex align-items-center justify-content-center"
                style="height: calc(100vh - 80px)"
              >
                <img
                  src="libs/dist/images/backgrounds/login-security.svg"
                  alt=""
                  class="img-fluid"
                  width="500"
                />
              </div>
            </div>
            <div class="col-lg-6 col-xl-4 col-xxl-4">
              <div class="card mb-0 shadow-none rounded-0 min-vh-100 h-100">
                <div class="d-flex align-items-center w-100 h-100">
                  <div class="card-body px-xxl-5">
                    <h2 class="mb-3 fs-7 fw-bolder">Welcome to <?= $_SERVER['SERVER_NAME']; ?></h2>
                    <p class="mb-9">Silhakan masuk untuk mengakses dashboard portal admin.</p>
                    <form method="POST">
                      <div class="mb-3">
                        <?php
                        if(isset($_SESSION['warning'])) {
                          ?>
                        <div class="alert bg-light-danger alert-dismissible fade show" role="alert">
                          <div class="d-flex align-items-center text-danger font-medium">
                            <i class="ti ti-info-circle me-2 fs-4"></i>
                              Username/Email dan Password Salah.
                          </div>
                          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        <?php
                        }
                        ?>
                        <label for="exampleInputEmail1" class="form-label"
                          >Username / Email</label
                        >
                        <input
                          type="text"
                          class="form-control"
                          id="Username"
                          name="Username"
                          aria-describedby="Username/Email"
                        />
                      </div>
                      <div class="mb-4">
                        <label for="exampleInputPassword1" class="form-label"
                          >Password</label
                        >
                        <input
                          type="password"
                          class="form-control"
                          id="Password"
                          name="Password"
                          aria-describedby="Password"
                        />
                      </div>
                      <div
                        class="d-flex align-items-center justify-content-between mb-4"
                      >
                        <div class="form-check">
                          <input
                            class="form-check-input primary"
                            type="checkbox"
                            value=""
                            id="flexCheckChecked"
                            checked
                          />
                          <label
                            class="form-check-label text-dark"
                            for="flexCheckChecked"
                          >
                            Ingat Perangkat Ini
                          </label>
                        </div>
                        <a
                          class="text-primary fw-medium"
                          href="./authentication-forgot-password.html"
                          >Lupa Password ?</a
                        >
                      </div>
                      <button type="submit" name="Login"
                        class="btn btn-primary w-100 py-8 mb-4 fs-5 rounded-2"
                      >
                        <i class="bi bi-door-open-fill"></i> Masuk
                      </button>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!--  Import Js Files -->
    <script src="libs/dist/libs/jquery/dist/jquery.min.js"></script>
    <script src="libs/dist/libs/simplebar/dist/simplebar.min.js"></script>
    <script src="libs/dist/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <!--  core files -->
    <script src="libs/dist/js/app.min.js"></script>
    <script src="libs/dist/js/app.init.js"></script>
    <script src="libs/dist/js/app-style-switcher.js"></script>
    <script src="libs/dist/js/sidebarmenu.js"></script>

    <script src="libs/dist/js/custom.js"></script>
  </body>
</html>
