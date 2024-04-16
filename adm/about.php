<?php 
if(isset($_POST['Update'])){
    
    // Check if a file is uploaded
    if (isset($_FILES['AboutImages']) && $_FILES['AboutImages']['error'] === UPLOAD_ERR_OK) {
        $AboutImages = $_FILES['AboutImages'];
    } else {
        $AboutImages = null;
    }
    $admin->UpdateAbout($_POST['about'],$AboutImages);
}
if (isset($_SESSION['edit_response'])) {
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
}
?>
<!-- CKeditor -->
<script src="https://cdn.ckeditor.com/ckeditor5/40.2.0/classic/ckeditor.js"></script>
<!--  Row 2 -->
<div class="row">
    <div class="col-lg-12 d-flex align-items-strech">
        <div class="card w-100">
            <div class="card-body">
                <div class="d-sm-flex d-block align-items-center justify-content-between mb-7">
                    <div class="mb-3 mb-sm-0">
                        <h5 class="card-title fw-semibold">Tentang - Pantai Bumi Mangrove</h5>
                    </div>
                </div>
                <div class="card card-body">
                    <h5>Tentang Website</h5>
                    <form method="POST" class="form-horizontal" enctype="multipart/form-data">
                    <div class="card">
                        <a href="../assets/job/<?= $General->GlobalInfo()['AboutImages'] ?>" target="_blank" rel="noopener noreferrer"><img class="card-img-top" src="../assets/job/<?= $General->GlobalInfo()['AboutImages'] ?>" alt="" style="max-height: 360px; object-fit: cover;"></a> 
                        <div class="card-body">
                            <h5 class="card-title">Banner 1</h5>
                        <input type="file" class="form-control" name="AboutImages">
                        </div>
                    </div>

                    <div class="mb-3">
                        <textarea class="form-control" rows="10" name="about" id="editor" placeholder="Text Here..."><?= $General->GlobalInfo()['About']; ?></textarea>
                    </div>
                    
                    <div class="col-12">
                        <div class="ms-auto mt-3 mt-md-0 text-end">
                            <button type="submit" class="btn btn-info font-medium rounded-pill px-4" name="Update">
                            <div class="d-flex align-items-center">
                                <i class="ti ti-send me-2 fs-4"></i>
                                Ubah
                            </div>
                            </button>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
ClassicEditor
            .create(document.querySelector('#editor'), {
                height: '300px' // Set the height to 300 pixels
            })
            .then(editor => {
                console.log(editor);
            })
            .catch(error => {
                console.error(error);
            });
</script>