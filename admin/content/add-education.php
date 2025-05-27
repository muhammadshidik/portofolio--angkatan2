<?php
// jika user/pengguna mencet tombol simpan
// ambil data dari inputan, email, nama dan password
// masukkan ke dalam table user (name, email, password) nilainya dari masing-masing inputan 
//fungsi insert

include "config/koneksi.php";
if (isset($_POST['simpan'])) {
    $major = $_POST['major'];
    $year = $_POST['year'];
    $university = $_POST['university'];
    $description = $_POST['description'];
    $status  = $_POST['status'];

    $query = mysqli_query($config, "INSERT INTO educations (major, year, university, description, status) 
 VALUES ('$major','$year','$university','$description','$status')");
    if ($query) {
        header("location:?page=education&tambah=berhasil");
    }
}

//revisian ambil dari pak reza
$header = isset($_GET['edit']) ? "Edit" : "Tambah";
$id_user = isset($_GET['edit']) ? $_GET['edit'] : '';
$queryEdit = mysqli_query($config, "SELECT * FROM educations WHERE id='$id_user'");
$rowEdit  = mysqli_fetch_assoc($queryEdit);

if (isset($_POST['edit'])) {
    $major = $_POST['major'];
    $year = $_POST['year'];
    $description = $_POST['description'];
    $status  = $_POST['status'];


    $queryUpdate = mysqli_query($config, "UPDATE educations SET major='$major', year='$year', description='$decription',status='$status' WHERE id='$id_user'");
    if ($queryUpdate) {
        header("location:education.php?ubah=berhasil");
    }
}

?>
<form action="" method="post" enctype="multipart/form-data">
    <div class="mb-3 row">
        <div class="col-sm-2">
            <label for="">Jurusan * </label>
        </div>
        <div class="col-sm-10">
            <input required name="major" type="text"
                class="form-control"
                placeholder="Masukkan jurusan anda"
                value="<?= isset($_GET['edit']) ? $rowEdit['major'] : '' ?>">
        </div>
    </div>
    <div class="mb-3 row">
        <div class="col-sm-2">
            <label for="">Tahun * </label>
        </div>
        <div class="col-sm-10">
            <input required name="year" type="date"
                class="form-control"
                placeholder="Masukkan Tahun lulus anda"
                value="<?= isset($_GET['edit']) ? $rowEdit['year'] : '' ?>">
        </div>
    </div>
<div class="mb-3 row">
        <div class="col-sm-2">
            <label for="">Universitas * </label>
        </div>
        <div class="col-sm-10">
            <input required name="university" type="text"
                class="form-control"
                placeholder="Masukkan jurusan anda"
                value="<?= isset($_GET['edit']) ? $rowEdit['university'] : '' ?>">
        </div>
    </div>div>
    <div class="mb-3 row">
        <div class="col-sm-2">
            <label for="">Deskripsi * </label>
        </div>
        <div class="col-sm-10">
            <input required name="description" type="text"
                class="form-control"
                placeholder="Masukkan Tentang Diri anda:"
                value="<?= isset($_GET['edit']) ? $rowEdit['description'] : '' ?>">
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