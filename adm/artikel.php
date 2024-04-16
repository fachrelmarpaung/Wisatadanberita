<?php 
if(count($pages) > 5){
$LoadUsers = $admin->SearchArtikel();
}else{
$LoadUsers = $admin->ViewArtikel();
}

if(isset($_POST['search'])){
  header("Location: ".$path."member/".$_POST['search']."/halaman/1");
  exit;
}
if(isset($_POST['delete'])){
  if($admin->DeleteArtikel($_POST['idartikel']) > 0){
    echo "<script>alert('Update Success!')</script>";
  }
}
$currentUrl = $_SERVER['REQUEST_URI'];
$urlParts = explode('/', $currentUrl);
$id = end($urlParts);

?>
<?php
// Check if response data is available
if (isset($_SESSION['register_response'])) {
    $response = $_SESSION['register_response'];

    // For example, display it in an alert
    if ($response['status'] === 'success') {
        echo '<div class="alert alert-success alert-dismissible bg-success text-white border-0 fade show" role="alert">
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
        <strong>Berhasil - </strong> '.$response['message'].'
      </div>';
    }

    // Clear the session variable after use
    unset($_SESSION['register_response']);
}elseif (isset($_SESSION['edit_response'])) {
    $response = $_SESSION['edit_response'];

    // For example, display it in an alert
    if ($response['status'] === 'success') {
        echo '<div class="alert alert-success alert-dismissible bg-success text-white border-0 fade show" role="alert">
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
        <strong>Berhasil - </strong> '.$response['message'].'
      </div>';
    }

    // Clear the session variable after use
    unset($_SESSION['edit_response']);
}
// var_dump($_SESSION['deletestatus']);
elseif(isset($_SESSION['deletestatus'])){
    $response = $_SESSION['deletestatus'];
    // For example, display it in an alert
    if ($response['status'] === 'success') {
        echo '<div class="alert alert-success alert-dismissible bg-success text-white border-0 fade show" role="alert">
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
        <strong>Berhasil - </strong> '.$response['message'].'
      </div>';
    }else{
        echo '<div class="alert alert-danger alert-dismissible bg-danger text-white border-0 fade show" role="alert">
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
        <strong>Gagal - </strong> '.$response['message'].'
      </div>';
    }
    
    unset($_SESSION['deletestatus']);
}
?>
<div class="card bg-light-info shadow-none position-relative overflow-hidden">
<div class="card-body px-4 py-3">
    <div class="row align-items-center">
    <div class="col-9">
        <h4 class="fw-semibold mb-8">Artikel</h4>
        <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
            <a class="text-muted" href="<?= $assets; ?>member/dashboard">Dashboard</a>
            </li>
            <li class="breadcrumb-item" aria-current="page">
            Artikel
            </li>
        </ol>
        </nav>
    </div>
    <div class="col-3">
        <div class="text-center mb-n5">
        <img src="<?= $assets; ?>assets/job/ChatBc.png" alt="" class="img-fluid mb-n4">
        </div>
    </div>
    </div>
</div>
</div>
<div class="widget-content searchable-container list">
<!-- --------------------- start Contact ---------------- -->
<div class="card card-body">
    <div class="row">
    <div class="col-md-4 col-xl-3">
        <form class="position-relative">
        <input type="text" class="form-control product-search ps-5" id="input-search" placeholder="Search Contacts...">
        <i class="ti ti-search position-absolute top-50 start-0 translate-middle-y fs-6 text-dark ms-3"></i>
        </form>
    </div>
    <div class="col-md-8 col-xl-9 text-end d-flex justify-content-md-end justify-content-center mt-3 mt-md-0">
        <a href="../createartikel" id="btn-add-contact" class="btn btn-info d-flex align-items-center">
        <i class="ti ti-news text-white me-1 fs-5"></i> Tambah Artikel
        </a>
    </div>
    </div>
</div>
<!-- ---------------------
                end Contact
            ---------------- -->
<!-- Modal -->
<div class="card card-body">
    <div class="table-responsive">
    <table class="table search-table align-middle text-nowrap">
        <thead class="header-item">
        <th>Judul</th>
        <th>Gambar</th>
        <th>Status</th>
        <th>Deskripsi</th>
        <th>Longitude</th>
        <th>Latitude</th>
        <th>Action</th>
        </tr></thead>
        <tbody>
        <!-- start row -->
        <?php
            if ($LoadUsers !== false) {
                if ($LoadUsers->num_rows > 0) {
                    $i = 1;
                    $s = ((@$_GET['p'] * 10) - 10);
                    while ($KK = $LoadUsers->fetch_assoc()) {

        ?>
        <tr class="search-items">
            <td>
                <div class="d-flex align-items-center">
                    <img src="<?= $assets; ?>assets/job/icon-dd-message-box.svg" alt="avatar" class="rounded-circle" width="35">
                    <div class="ms-3">
                    <div class="user-meta-info">
                        <h6 class="user-name mb-0" data-name="<?= $KK['Title']; ?>">
                        <?= $KK['Title']; ?>
                        </h6>
                        <span class="user-work fs-3" data-occupation="<?= $KK['postby']; ?>"><?= $KK['postby']; ?></span>
                    </div>
                    </div>
                </div>
            </td>
            <td>
                <img src="<?= $assets; ?>assets/artikel/<?= $KK['Gambar']; ?>" alt="<?= $KK['Gambar']; ?>" style="max-width: 100px; border-radius:10px">
            </td>
            <td>
                <span class="usr-location" data-location=""><?php if($KK['Status'] === '0'){ echo "Wisata"; }else{ echo "Berita"; }; ?></span>
            </td>
            <td>
                <span class="usr-location" data-location=""><?= substr($KK['Deskripsi'], 0, 90); ?>...</span>
            </td>
            <td>
                <span class="usr-location" data-location=""><?= $KK['Longitude']; ?></span>
            </td>
            <td>
                <span class="usr-location" data-location=""><?= $KK['Latitude']; ?></span>
            </td>
            <td>
                <div class="action-btn">
                    <form method="POST">
                        <input type="hidden" name="idartikel" value="<?= $KK['id'];?>">
                        <a href="../editartikel/<?= $KK['id'];?>" class="text-primary"><i class="ti ti-edit fs-6"></i></a>
                        <button type="submit" name="delete" class="text-danger" style="border:none; background-color:transparent;"><i class="ti ti-trash fs-6"></i></button>
                    </form>
                </div>
            </td>
            </tr>
            <!-- end row -->
            <?php
                    }
                } else {
                    ?>
                    <tr>
                        <td colspan="11" class="col-auto" align="center"> No Data </td>
                    </tr>
                <?php
                }
            } else {
                ?>
                <tr>
                    <td colspan="11" class="col-auto" align="center"> Unable To check the table </td>
                </tr>
            <?php
            } ?>
            </td>
            
        </tr>
        </tbody>
    </table>
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
</div>
</div>