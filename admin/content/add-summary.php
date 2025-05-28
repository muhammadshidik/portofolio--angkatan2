<?php
// jika user/pengguna mencet tombol simpan
// ambil data dari inputan, email, nama dan password
// masukkan ke dalam table user (name, email, password) nilainya dari masing-masing inputan 
//fungsi insert

include "config/koneksi.php";
if (isset($_POST['simpan'])) {
    $name = $_POST['name'];
    $description = $_POST['description'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];
    $email  = $_POST['email'];
    $status  = $_POST['status'];

    $query = mysqli_query($config, "INSERT INTO summarys (name, description, address, phone, email, status) 
 VALUES ('$name','$description', '$address','$phone','$email','$status')");
    if ($query) {
        header("location:?page=summary&tambah=berhasil");
    }
}

//revisian ambil dari pak reza
$header = isset($_GET['edit']) ? "Edit" : "Tambah";
$id_user = isset($_GET['edit']) ? $_GET['edit'] : '';
$queryEdit = mysqli_query($config, "SELECT * FROM summarys WHERE id='$id_user'");
$rowEdit  = mysqli_fetch_assoc($queryEdit);

if (isset($_POST['edit'])) {
    $name = $_POST['name'];
    $description = $_POST['description'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];
    $email  = $_POST['email'];
    $status  = $_POST['status'];

    $queryUpdate = mysqli_query($config, "UPDATE summarys SET name='$name', description = '$description', address='$address', phone='$phone', email='$email', status='$status' WHERE id='$id_user'");
    if ($queryUpdate) {
        header("location:?page=summary&ubah=berhasil");
    }
}


?>


<form action="" method="post" enctype="multipart/form-data">
    <div class="mb-3 row">
        <div class="col-sm-2">
            <label for="">Nama * </label>
        </div>
        <div class="col-sm-10">
            <input required name="name" type="text"
                class="form-control"
                placeholder="Masukkan nama anda"
                value="<?= isset($_GET['edit']) ? $rowEdit['name'] : '' ?>">
        </div>
    </div>
    <div class="mb-3 row">
        <div class="col-sm-2">
            <label for="">Deskripsi * </label>
        </div>
        <div class="col-sm-10">
            <input required name="description" type="text"
                class="form-control"
                placeholder="isi deskripsi.."
                value="<?= isset($_GET['edit']) ? $rowEdit['description'] : '' ?>">
        </div>
    </div>
    <div class="mb-3 row">
        <div class="col-sm-2">
            <label for="">Alamat * </label>
        </div>
        <div class="col-sm-10">
            <input required name="address" type="text"
                class="form-control"
                placeholder="Masukkan alamat anda"
                value="<?= isset($_GET['edit']) ? $rowEdit['address'] : '' ?>">
        </div>
    </div>

    <div class="mb-3 row">
        <div class="col-sm-2">
            <label for="">No.hp * </label>
        </div>
        <div class="col-sm-10">
            <input required name="phone" type="text"
                class="form-control"
                placeholder="Masukkan email anda"
                value="<?= isset($_GET['edit']) ? $rowEdit['phone'] : '' ?>">
        </div>
    </div>

    <div class="mb-3 row">
        <div class="col-sm-2">
            <label for="">Email * </label>
        </div>
        <div class="col-sm-10">
            <input required name="email" type="text"
                class="form-control"
                placeholder="Masukkan kemampuan anda"
                value="<?= isset($_GET['edit']) ? $rowEdit['email'] : '' ?>">
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