<?php
// jika user/pengguna mencet tombol simpan
// ambil data dari inputan, email, nama dan password
// masukkan ke dalam table user (name, email, password) nilainya dari masing-masing inputan 
//fungsi insert

include "config/koneksi.php";
if (isset($_POST['simpan'])) {
    $year = $_POST['year'];
    $position = $_POST['position'];
    $company = $_POST['company'];
    $activity = $_POST['activity'];
    $status  = $_POST['status'];

    $query = mysqli_query($config, "INSERT INTO experiences (year, position, company, activity, status) 
 VALUES ('$year','$position','$company','$activity','$status')");
    if ($query) {
        header("location:?page=experience&tambah=berhasil");
    }
}

//revisian ambil dari pak reza
$header = isset($_GET['edit']) ? "Edit" : "Tambah";
$id_user = isset($_GET['edit']) ? $_GET['edit'] : '';
$queryEdit = mysqli_query($config, "SELECT * FROM experiences WHERE id='$id_user'");
$rowEdit  = mysqli_fetch_assoc($queryEdit);

if (isset($_POST['edit'])) {
    $year = $_POST['year'];
    $position = $_POST['position'];
    $company = $_POST['company'];
    $activity = $_POST['activity'];
    $status  = $_POST['status'];


    $queryUpdate = mysqli_query($config, "UPDATE experiences SET year='$year', position='$position', company='$company', activity='$activity', status='$status' WHERE id='$id_user'");
    if ($queryUpdate) {
        header("location:?page=experience&ubah=berhasil");
    }
}

?>
<form action="" method="post" enctype="multipart/form-data">
    <div class="mb-3 row">
        <div class="col-sm-2">
            <label for="">Tahun * </label>
        </div>
        <div class="col-sm-10">
            <input required name="year" type="date"
                class="form-control"
                placeholder="Masukkan Tahun kerja anda"
                value="<?= isset($_GET['edit']) ? $rowEdit['year'] : '' ?>">
        </div>
    </div>
    <div class="mb-3 row">
        <div class="col-sm-2">
            <label for="">Posisi * </label>
        </div>
        <div class="col-sm-10">
            <input required name="position" type="text"
                class="form-control"
                placeholder="Masukkan posisi anda"
                value="<?= isset($_GET['edit']) ? $rowEdit['position'] : '' ?>">
        </div>

    </div>
    <div class="mb-3 row">
        <div class="col-sm-2">
            <label for="">Perusahaan * </label>
        </div>
        <div class="col-sm-10">
            <input required name="company" type="text"
                class="form-control"
                placeholder="Masukkan perusahaan anda bekerja."
                value="<?= isset($_GET['edit']) ? $rowEdit['company'] : '' ?>">
        </div>
    </div>

    <div class="mb-3 row">
        <div class="col-sm-2">
            <label for="">Kegiatan * </label>
        </div>
        <div class="col-sm-10">
            <textarea id="summernote" class="form-control" name="description" cols="30" rows="5"><?php echo !isset($row['activity']) ? "" : $row['activity'] ?></textarea>
        </div>
    </div>

    <div class="mb-3 row">
        <div class="col-sm-2">
            <label for="">Status </label>
        </div>
        <div class="col-sm-10">
            <input type="radio" name="status" value="1" checked> Publish
            <input type="radio" name="status" value="0"> Draft
        </div>
    </div>
    <div class="mb-3 row">
        <div class="col-sm-12">
            <button name="<?= isset($_GET['edit']) ? 'edit' : 'simpan'; ?>" type="submit"
                class="btn btn-primary">Simpan</button>
        </div>
    </div>
</form>