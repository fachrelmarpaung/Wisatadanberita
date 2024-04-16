<?php 
if(isset($_POST['Tambah'])){
    
    // Check if a file is uploaded
    if (isset($_FILES['Icon']) && $_FILES['Icon']['error'] === UPLOAD_ERR_OK) {
        $Icon = $_FILES['Icon'];
    } else {
        $Icon = null;
    }
    $ArtikelNow = $admin->TambahArtikel($_POST['Title'], $Icon,$_POST['Deskripsi'],$_POST['linkgmaps'],$_POST['NamaTempat'],$_POST['Latitude'],$_POST['Longitude'],$_POST['postby'],$_POST['Status']);
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
        <h4 class="fw-semibold mb-8">Buat Artikel Baru</h4>
        <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
            <a class="text-muted" href="<?= $assets; ?>member/dashboard">Dashboard</a>
            </li>
            <li class="breadcrumb-item" aria-current="page">
            Buat Artikel Baru
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
    <form method="POST" enctype="multipart/form-data">
        <div class="form-floating mb-3">
            <input type="text" name="Title" class="form-control" id="tb-fname" placeholder="Masukkan Judul Artikel" required>
            <label for="tb-fname">Judul</label>
            <div class="invalid-feedback">
                <?= $_SESSION['register_response']['message']; ?>
            </div>
        </div>
        <div class="mb-3">
            <label class="form-label">Gambar</label>
            <input type="file" class="form-control" name="Icon" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Deskripsi</label>
            <textarea class="form-control" name="Deskripsi" rows="5" required></textarea>
        </div>
        <div class="mb-3">
            <label class="form-label">Link Gmaps</label>
            <textarea class="form-control" name="linkgmaps" rows="3" required></textarea>
        </div>
        <div class="mb-3">
            <label class="form-label">Nama Tempat</label>
            <input type="text" id="NamaTempat" name="NamaTempat" class="form-control" required>
        </div>
        <div class="row pt-3">
            <div class="col-md-4">
            <div class="mb-3">
                <label class="control-label">Latitude</label>
                <input type="text" id="firstName" name="Latitude" class="form-control" required>
                <small class="form-control-feedback">
                Garis lintang (latitude)
                </small>
            </div>
            </div>
            <div class="col-md-4">
            <div class="mb-3 has-danger">
                <label class="control-label">Longitude</label>
                <input type="text" id="lastName" name="Longitude" class="form-control form-control-danger" required>
                <small class="form-control-feedback">
                Garis bujur (longitude) 
                </small>
            </div>
            </div>
            <div class="col-md-4">
            <div class="mb-3 has-danger">
                <label class="control-label">Status</label>
                <select class="form-select col-12" id="inlineFormCustomSelect" name="Status" required>
                    <option selected disabled>Choose...</option>
                    <option value="0">Wisata</option>
                    <option value="1">Berita</option>
                </select>
                <small class="form-control-feedback">
                Pilih apakah statusnya untuk wisata atau berita.
                </small>
            </div>
            </div>
            
            <!--/span-->
        </div>
        <div class="col-12">
            <div class="d-md-flex align-items-center mt-3">
                <div class="invalid-feedback" style="display: block;">
                    *Semua form harus diisi.
                </div>
                <div class="ms-auto mt-3 mt-md-0">
                    <input type="hidden" name="postby" value="<?= $_SESSION['user']['username']; ?>">
                    <button type="submit" class="btn btn-info font-medium rounded-pill px-4" name="Tambah">
                    <div class="d-flex align-items-center">
                        <i class="ti ti-device-floppy me-2 fs-4"></i>
                        Simpan
                    </div>
                    </button>
                </div>
            </div>
        </div>
    </form>
    </div>
</div>