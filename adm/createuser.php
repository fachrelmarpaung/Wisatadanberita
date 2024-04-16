<?php 
if(isset($_POST['Tambah'])){
    $Registers = new Users($_POST['Username'], $_POST['Email'], $_POST['Nohp'], $_POST['Password'], $_POST['Status']);
    $Registnow = $Registers->registerUser();
}
// Check if response data is available
if (isset($_SESSION['register_response'])) {
    $response = $_SESSION['register_response'];
}
?>
<div class="card bg-light-info shadow-none position-relative overflow-hidden">
<div class="card-body px-4 py-3">
    <div class="row align-items-center">
    <div class="col-9">
        <h4 class="fw-semibold mb-8">Buat Pengguna Baru</h4>
        <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
            <a class="text-muted" href="<?= $assets; ?>member/dashboard">Dashboard</a>
            </li>
            <li class="breadcrumb-item" aria-current="page">
            Buat Pengguna Baru
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
<div class="card">
    <div class="card-body">
    <form method="POST">
        <div class="form-floating mb-3">
            <input type="text" name="Username" class="form-control <?= isset($_SESSION['register_response']['ErrorWich']) && $_SESSION['register_response']['ErrorWich'] === 'Username' ? 'is-invalid' : '' ?>" id="tb-fname" placeholder="Enter Name here" required>
            <label for="tb-fname">Username</label>
            <div class="invalid-feedback">
                <?= $_SESSION['register_response']['message']; ?>
            </div>
        </div>
        <div class="form-floating mb-3">
            <input type="email" name="Email" class="form-control" id="tb-fname" placeholder="Enter Name here" required>
            <label for="tb-fname">Email</label>
        </div>
        <div class="form-floating mb-3">
            <input type="tel" name="Nohp" class="form-control" id="tb-fname" placeholder="Enter Name here" required>
            <label for="tb-fname">Nohp</label>
        </div>
        <div class="form-floating mb-3">
            <input type="password" name="Password" class="form-control" id="tb-fname" placeholder="Enter Name here" required>
            <label for="tb-fname">Password</label>
        </div>
        <div class="mb-3">
            <label>Status</label>
                <select class="form-select col-12" id="inlineFormCustomSelect" name="Status" required>
                <option selected disabled>Choose...</option>
                <option value="0">Admin</option>
                <option value="1">Member</option>
            </select>
        </div>
        <div class="col-12">
            <div class="d-md-flex align-items-center mt-3">
                <div class="invalid-feedback" style="display: block;">
                    *Semua form harus diisi.
                </div>
                <div class="ms-auto mt-3 mt-md-0">
                    <button type="submit" class="btn btn-info font-medium rounded-pill px-4" name="Tambah">
                    <div class="d-flex align-items-center">
                        <i class="ti ti-users me-2 fs-4"></i>
                        Tambah
                    </div>
                    </button>
                </div>
            </div>
        </div>
    </form>
    </div>
</div>