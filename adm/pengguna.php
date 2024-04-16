<?php 
if(count($pages) > 5){
$LoadUsers = $admin->SearchMember();
}else{
$LoadUsers = $admin->ViewPengguna();
}

if(isset($_POST['search'])){
  header("Location: ".$path."member/".$_POST['search']."/halaman/1");
  exit;
}
if(isset($_POST['delete'])){
  if($admin->DeleteUser($_POST['idmember']) > 0){
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
}elseif (isset($_SESSION['edit_response'])) {
    $response = $_SESSION['edit_response'];

    // For example, display it in an alert
    if ($response['status'] === 'error') {
        echo '<div class="alert alert-danger alert-dismissible bg-danger text-white border-0 fade show" role="alert">
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
        <strong>Berhasil - </strong> '.$response['message'].'
      </div>';
    }

    // Clear the session variable after use
    unset($_SESSION['edit_response']);
}elseif(@$_SESSION['deletestatus']['status'] === 'success'){
    $response = $_SESSION['deletestatus'];
    echo '<div class="alert alert-success alert-dismissible bg-success text-white border-0 fade show" role="alert">
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
        <strong>Berhasil - </strong> '.$response['message'].'
      </div>';
      unset($_SESSION['deletestatus']);
}elseif (@$_SESSION['deletestatus']['status'] === 'error') {
    $response = $_SESSION['deletestatus'];
    echo '<div class="alert alert-danger alert-dismissible bg-danger text-white border-0 fade show" role="alert">
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
        <strong>Gagal - </strong> '.$response['message'].'
      </div>';
      unset($_SESSION['deletestatus']);
}
?>
<div class="card bg-light-info shadow-none position-relative overflow-hidden">
<div class="card-body px-4 py-3">
    <div class="row align-items-center">
    <div class="col-9">
        <h4 class="fw-semibold mb-8">Pengguna</h4>
        <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
            <a class="text-muted" href="<?= $assets; ?>member/dashboard">Dashboard</a>
            </li>
            <li class="breadcrumb-item" aria-current="page">
            Pengguna
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
        <a href="../createpengguna" id="btn-add-contact" class="btn btn-info d-flex align-items-center">
        <i class="ti ti-users text-white me-1 fs-5"></i> Tambah Pengguna
        </a>
    </div>
    </div>
</div>
<!-- ---------------------
                end Contact
            ---------------- -->
<!-- Modal -->
<div class="modal fade" id="addContactModal" tabindex="-1" role="dialog" aria-labelledby="addContactModalTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
        <div class="modal-header d-flex align-items-center">
        <h5 class="modal-title">Contact</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
        <div class="add-contact-box">
            <div class="add-contact-content">
            <form id="addContactModalTitle">
                <div class="row">
                <div class="col-md-6">
                    <div class="mb-3 contact-name">
                    <input type="text" id="c-name" class="form-control" placeholder="Name">
                    <span class="validation-text text-danger"></span>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3 contact-email">
                    <input type="text" id="c-email" class="form-control" placeholder="Email">
                    <span class="validation-text text-danger"></span>
                    </div>
                </div>
                </div>
                <div class="row">
                <div class="col-md-6">
                    <div class="mb-3 contact-occupation">
                    <input type="text" id="c-occupation" class="form-control" placeholder="Occupation">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3 contact-phone">
                    <input type="text" id="c-phone" class="form-control" placeholder="Phone">
                    <span class="validation-text text-danger"></span>
                    </div>
                </div>
                </div>
                <div class="row">
                <div class="col-md-12">
                    <div class="mb-3 contact-location">
                    <input type="text" id="c-location" class="form-control" placeholder="Location">
                    </div>
                </div>
                </div>
            </form>
            </div>
        </div>
        </div>
        <div class="modal-footer">
        <button id="btn-add" class="btn btn-success rounded-pill px-4">
            Add
        </button>
        <button id="btn-edit" class="btn btn-success rounded-pill px-4">
            Save
        </button>
        <button class="btn btn-danger rounded-pill px-4" data-bs-dismiss="modal">
            Discard
        </button>
        </div>
    </div>
    </div>
</div>
<div class="card card-body">
    <div class="table-responsive">
    <table class="table search-table align-middle text-nowrap">
        <thead class="header-item">
        <th>Nama</th>
        <th>Email</th>
        <th>Nomor Telepon</th>
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
                    <img src="<?= $assets; ?>assets/job/user-7.jpg" alt="avatar" class="rounded-circle" width="35">
                    <div class="ms-3">
                    <div class="user-meta-info">
                        <h6 class="user-name mb-0" data-name="<?= $KK['username']; ?>">
                        <?= $KK['username']; ?>
                        </h6>
                        <span class="user-work fs-3" data-occupation="<?= $KK['status'] === '1' ? "Member" : "Admin"; ?>"><?= $KK['status'] === '1' ? "Member" : "Admin"; ?></span>
                    </div>
                    </div>
                </div>
            </td>
            <td>
                <span class="usr-email-addr" data-email="<?= $KK['email']; ?>"><?= $KK['email']; ?></span>
            </td>
            <td>
                <span class="usr-location" data-location="<?= $KK['nohp']; ?>"><?= $KK['nohp']; ?></span>
            </td>
            <td>
                <div class="action-btn">
                    <form method="POST">
                        <input type="hidden" name="idmember" value="<?= $KK['id'];?>">
                        <a href="../edituser/<?= $KK['id'];?>" class="text-primary"><i class="ti ti-edit fs-6"></i></a>
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