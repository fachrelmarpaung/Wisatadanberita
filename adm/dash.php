<?php 
if(isset($_POST['Update'])){
    $Title = $_POST['Title'];
    $Lokasi = $_POST['Lokasi'];
    $Deskripsi = $_POST['Deskripsi'];
    $Deskripsitwo = $_POST['Deskripsitwo'];
    $Phonenumber = $_POST['Phonenumber'];
    $Email = $_POST['Email'];
    $Facebook = $_POST['Facebook'];
    $Instagram = $_POST['Instagram'];
    $Latitude = $_POST['Latitude'];
    $Longitude = $_POST['Longitude'];
    
    // Check if a file is uploaded
    if (isset($_FILES['Icon']) && $_FILES['Icon']['error'] === UPLOAD_ERR_OK) {
        $Icon = $_FILES['Icon'];
    } else {
        $Icon = null;
    }
    // Check if a file is uploaded
    if (isset($_FILES['bannerone']) && $_FILES['bannerone']['error'] === UPLOAD_ERR_OK) {
        $bannerone = $_FILES['bannerone'];
    } else {
        $bannerone = null;
    }
    // Check if a file is uploaded
    if (isset($_FILES['bannertwo']) && $_FILES['bannertwo']['error'] === UPLOAD_ERR_OK) {
        $bannertwo = $_FILES['bannertwo'];
    } else {
        $bannertwo = null;
    }
    // Check if a file is uploaded
    if (isset($_FILES['bannerthree']) && $_FILES['bannerthree']['error'] === UPLOAD_ERR_OK) {
        $bannerthree = $_FILES['bannerthree'];
    } else {
        $bannerthree = null;
    }
    $admin->UpdateSettings($Title,$Lokasi,$Deskripsi,$Deskripsitwo,$Phonenumber,$Icon,$bannerone,$bannertwo,$bannerthree,$Latitude,$Longitude,$Email,$Facebook,$Instagram);
    // echo "<script>alert('Update Success!')</script>";
}
?>
<!--  Row 1 -->
<div class="row">
    <!-- Top Performers -->
    <div class="col-lg-3">
        <div class="row">
            <div class="col-lg-12 col-md-6 col-sm-12">
                <!-- Monthly Earnings -->
                <div class="card">
                    <div class="card-body">
                        <div class="row alig n-items-start">
                            <div class="col-8">
                                <h5 class="card-title mb-9 fw-semibold">
                                    Total Pengunjung
                                </h5>
                                <h4 class="fw-semibold mb-3"></h4>
                                <div class="d-flex align-items-center pb-1">
                                    <h5 class="mb-0"><?= $admin->TotalVisitor(); ?> </h5>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="d-flex justify-content-end">
                                    <div class="text-white bg-secondary rounded-circle p-6 d-flex align-items-center justify-content-center">
                                        <i class="ti ti-eye fs-6"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="totalM"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3">
        <div class="row">
            <div class="col-lg-12 col-md-6 col-sm-12">
                <!-- Monthly Earnings -->
                <div class="card">
                    <div class="card-body">
                        <div class="row alig n-items-start">
                            <div class="col-8">
                                <h5 class="card-title mb-9 fw-semibold">
                                    Total Users
                                </h5>
                                <h4 class="fw-semibold mb-3"></h4>
                                <div class="d-flex align-items-center pb-1">
                                    <h5 class="mb-0"><?= $admin->TotalUsers(); ?> </h5>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="d-flex justify-content-end">
                                    <div class="text-white bg-secondary rounded-circle p-6 d-flex align-items-center justify-content-center">
                                        <i class="ti ti-users fs-6"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="totalM"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3">
        <div class="row">
            <div class="col-lg-12 col-md-6 col-sm-12">
                <!-- Monthly Earnings -->
                <div class="card">
                    <div class="card-body">
                        <div class="row alig n-items-start">
                            <div class="col-8">
                                <h5 class="card-title mb-9 fw-semibold">
                                    Total Admins
                                </h5>
                                <h4 class="fw-semibold mb-3"></h4>
                                <div class="d-flex align-items-center pb-1">
                                    <h5 class="mb-0"><?= $admin->TotalAdmin(); ?> </h5>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="d-flex justify-content-end">
                                    <div class="text-white bg-secondary rounded-circle p-6 d-flex align-items-center justify-content-center">
                                        <i class="ti ti-news fs-6"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="totalM"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3">
        <div class="row">
            <div class="col-lg-12 col-md-6 col-sm-12">
                <!-- Monthly Earnings -->
                <div class="card">
                    <div class="card-body">
                        <div class="row alig n-items-start">
                            <div class="col-8">
                                <h5 class="card-title mb-9 fw-semibold">
                                    Total Artikel
                                </h5>
                                <h4 class="fw-semibold mb-3"></h4>
                                <div class="d-flex align-items-center pb-1">
                                    <h5 class="mb-0"><?= $admin->TotalArticle(); ?> </h5>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="d-flex justify-content-end">
                                    <div class="text-white bg-secondary rounded-circle p-6 d-flex align-items-center justify-content-center">
                                        <i class="ti ti-news fs-6"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="totalM"></div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--  Row 2 -->
<div class="row">
    <div class="col-lg-12 d-flex align-items-strech">
        <div class="card w-100">
            <div class="card-body">
                <div class="d-sm-flex d-block align-items-center justify-content-between mb-7">
                    <div class="mb-3 mb-sm-0">
                        <h5 class="card-title fw-semibold">Data - Pantai Bumi Mangrove</h5>
                        <p class="card-subtitle mb-0 text-danger">Settingan Website ini dapat merubah seluruh informasi tentang website.</p>
                    </div>
                </div>
                <div class="card card-body">
                    <h5>Settingan Website</h5>
                    <form method="POST" class="form-horizontal" enctype="multipart/form-data">
                    <div class="mb-3">
                      <label class="form-label">Title</label>
                      <input type="text" class="form-control" name="Title" value="<?= $General->GlobalInfo()['Title'] ?>">
                    </div>
                    <div class="mb-3">
                      <label class="form-label">Lokasi</label>
                      <input type="text" class="form-control" name="Lokasi" value="<?= $General->GlobalInfo()['Location'] ?>">
                    </div>
                    <div class="mb-3">
                      <label class="form-label">Deskripsi</label>
                      <textarea class="form-control" name="Deskripsi" rows="5"><?= $General->GlobalInfo()['Deskripsi'] ?></textarea>
                    </div>
                    <div class="mb-3">
                      <label class="form-label">Deskripsi Dua</label>
                      <textarea class="form-control" name="Deskripsitwo" rows="5"><?= $General->GlobalInfo()['Desctwo'] ?></textarea>
                    </div>
                    <div class="mb-3">
                      <label class="form-label">Nomor (Whatsapp)</label>
                      <input type="tel" class="form-control" name="Phonenumber" value="<?= $General->GlobalInfo()['Phonenumber'] ?>">
                    </div>
                    <div class="mb-3">
                      <label class="form-label">Icon</label>
                      <div class="card" style="max-width:120px; padding:3px;">
                        <img src="../assets/job/<?= $General->GlobalInfo()['Icon'] ?>" style="max-width:120px;" alt="">
                      </div>
                      <input type="file" class="form-control" name="Icon">
                    </div>
                    <div class="row">
                        <span class="text-danger mb-3">*Buat Gambar sesuai dengan ukuran dibawah caranya buka di photoshop atau buka lewat <a href="https://www.photopea.com/" class="badge bg-danger">Photopea</a> (Photoshop Online) timpah gambar anda dengan format berikut</span>
                        <div class="col-lg-4 d-flex align-items-strech">
                            <div class="card">
                                <a href="../assets/job/<?= $General->GlobalInfo()['bannerone'] ?>" target="_blank" rel="noopener noreferrer"><img class="card-img-top" src="../assets/job/<?= $General->GlobalInfo()['bannerone'] ?>" alt="" style="max-height: 360px; object-fit: cover;"></a> 
                                <div class="card-body">
                                    <h5 class="card-title">Banner 1</h5>
                                <input type="file" class="form-control" name="bannerone" value="<?= $General->GlobalInfo()['bannerone'] ?>">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 d-flex align-items-strech">
                            <div class="card">
                            <a href="../assets/job/<?= $General->GlobalInfo()['bannertwo'] ?>" target="_blank" rel="noopener noreferrer"><img class="card-img-top" src="../assets/job/<?= $General->GlobalInfo()['bannertwo'] ?>" alt="" style="max-height: 360px; object-fit: cover;"></a>
                                <div class="card-body">
                                    <h5 class="card-title">Banner 2</h5>
                                <input type="file" class="form-control" name="bannertwo" value="<?= $General->GlobalInfo()['bannertwo'] ?>">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 d-flex align-items-strech">
                            <div class="card">
                            <a href="../assets/job/<?= $General->GlobalInfo()['bannerthree'] ?>" target="_blank" rel="noopener noreferrer"><img class="card-img-top" src="../assets/job/<?= $General->GlobalInfo()['bannerthree'] ?>" alt="" style="max-height: 360px; object-fit: cover;"></a>
                                <div class="card-body">
                                    <h5 class="card-title">Banner 3</h5>
                                <input type="file" class="form-control" name="bannerthree" value="<?= $General->GlobalInfo()['bannerthree'] ?>">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row pt-3">
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label">Email</label>
                                <input type="Email" class="form-control" name="Email" value="<?= $General->GlobalInfo()['Email'] ?>">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label">Facebook</label>
                                <input type="text" class="form-control" name="Facebook" value="<?= $General->GlobalInfo()['Facebook'] ?>">  
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label">Instagram</label>
                                <input type="text" class="form-control" name="Instagram" value="<?= $General->GlobalInfo()['Instagram'] ?>"> 
                            </div>
                        </div>
                    </div>
                    <div class="row pt-3">
                        <div class="col-md-6">
                        <div class="mb-3">
                            <label class="control-label">Latitude</label>
                            <input type="text" id="firstName" name="Latitude" class="form-control" value="<?= $General->GlobalInfo()['latitude'] ?>">
                            <small class="form-control-feedback">
                            Garis lintang (latitude)
                            </small>
                        </div>
                        </div>
                        <!--/span-->
                        <div class="col-md-6">
                        <div class="mb-3 has-danger">
                            <label class="control-label">Longitude</label>
                            <input type="text" id="lastName" name="Longitude" class="form-control form-control-danger" value="<?= $General->GlobalInfo()['longitude'] ?>">
                            <small class="form-control-feedback">
                            Garis bujur (longitude) 
                            </small>
                        </div>
                        </div>
                        <!--/span-->
                    </div>
                    <div class="col-12">
                            <div class="ms-auto mt-3 mt-md-0">
                              <button type="submit" class="btn btn-info font-medium rounded-pill px-4" name="Update">
                                <div class="d-flex align-items-center">
                                  <i class="ti ti-send me-2 fs-4"></i>
                                  Ubah
                                </div>
                              </button>
                            </div>
                          </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>