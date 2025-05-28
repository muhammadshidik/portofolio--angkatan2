<?php
// jika user/pengguna mencet tombol simpan
// ambil data dari inputan, email, nama dan password
// masukkan ke dalam table user (name, email, password) nilainya dari masing-masing inputan 
//fungsi insert

include "config/koneksi.php";
if (isset($_POST['simpan'])) {
    $name = $_POST['name'];
    $profile = $_POST['profile'];
    $email = $_POST['email'];
    $phone  = $_POST['phone'];
    $status  = $_POST['status'];
    $description = $_POST['description'];
    $skills = $_POST['skills'];
    //proses simpan foto
    $photo = $_FILES['photo']['name'];
    $size  = $_FILES['photo']['size'];
    // .png, jpg, jpeg
    $ekstensi = ['png', 'jpg', 'jpeg'];
    //PROSES SIMPAN FOTO
    $tmp_name = $_FILES['photo']['tmp_name'];
    $filename = uniqid() . "_" . basename($photo);
    $filepath = "uploads/" . $filename;

    //Cari, apakah di dlm table profiles ada datanya? YA, update... TIDAK, insert.
    $queryprofile = mysqli_query($config, "SELECT * FROM abouts ORDER BY id DESC");
    if (mysqli_num_rows($queryprofile) > 0) {
        $rowprofile = mysqli_fetch_assoc($queryprofile);
        $id = $rowprofile['id'];

        //Jika USER upload gambar
        if (!empty($photo)) {
            unlink("uploads/" . $rowprofile['photo']);
            move_uploaded_file($tmp_name, $filepath);

            $update = mysqli_query($config, "UPDATE abouts SET name='$name', profile='$profile',email='$email',phone='$phone', photo='$filename', skills='$skills', description='$description' WHERE id = '$id'");
            header("location:?page=manage-aboute&ubah=berhasil");
        } else {
            //Perintah Update
            $update = mysqli_query($config, "UPDATE abouts SET name='$name', profile='$profile',email='$email',phone='$phone', photo='$filename',skills='$skills', description='$description' WHERE id = '$id'");
            header("location:?page=manage-about&ubah=berhasil");
        }
    } else {
        //Perintah Insert
        if (!empty($photo)) {
            move_uploaded_file($tmp_name, $filepath);

            //JIKA USER UPLOAD GAMBAR
            $inputQ = mysqli_query($config, "INSERT INTO abouts (name, profile, email, phone, photo, skills, description) VALUES ('$name','$profile', '$email', '$phone', '$filename','$skills', '$description')");
            header("location:?page=manage-about&tambah=berhasil");
        } else {
            //JIKA USER TIDAK UPLOAD GAMBAR
            $inputQ = mysqli_query($config, "INSERT INTO abouts (name, profile, email, phone, photo, skills, description) VALUES ('$name','$profile', '$email', '$phone','$filename', '$skills', '$description')");
            header("location:?page=manage-about&tambah=berhasil");
        }
    }
}
//revisian ambil dari pak reza
$header = isset($_GET['edit']) ? "Edit" : "Tambah";
$id_user = isset($_GET['edit']) ? $_GET['edit'] : '';
$queryEdit = mysqli_query($config, "SELECT * FROM abouts WHERE id='$id_user'");
$rowEdit  = mysqli_fetch_assoc($queryEdit);

if (isset($_POST['edit'])) {
    $name = $_POST['name'];
    $profile = $_POST['profile'];
    $email = $_POST['email'];
    $phone  = $_POST['phone'];
    $skills = $_POST['skills'];
    $status  = $_POST['status'];
    $queryUpdate = mysqli_query($config, "UPDATE abouts SET name='$name', profile='$profile', email='$email', phone='$phone', status='$status', skills='$skills' WHERE id='$id_user'");
    if ($queryUpdate) {
        header("location:?page=about&ubah=berhasil");
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
            <label for="">Profile * </label>
        </div>
        <div class="col-sm-10">
            <input required name="profile" type="text"
                class="form-control"
                placeholder="Masukkan jabatan anda"
                value="<?= isset($_GET['edit']) ? $rowEdit['profile'] : '' ?>">
        </div>
    </div>

    <div class="mb-3 row">
        <div class="col-sm-2">
            <label for="">Email * </label>
        </div>
        <div class="col-sm-10">
            <input required name="email" type="text"
                class="form-control"
                placeholder="Masukkan email anda"
                value="<?= isset($_GET['edit']) ? $rowEdit['email'] : '' ?>">
        </div>
    </div>
    <div class="mb-3 row">
        <div class="col-sm-2">
            <label for="">No.Hp * </label>
        </div>
        <div class="col-sm-10">
            <input required name="phone" type="text"
                class="form-control"
                placeholder="Masukkan nomor hp anda"
                value="<?= isset($_GET['edit']) ? $rowEdit['phone'] : '' ?>">
        </div>
    </div>
    <div class="mb-3 row">
        <div class="col-sm-2">
            <label for="">Kemampuan * </label>
        </div>
        <div class="col-sm-10">
            <input required name="skills" type="text"
                class="form-control"
                placeholder="Masukkan kemampuan anda"
                value="<?= isset($_GET['edit']) ? $rowEdit['skills'] : '' ?>">
        </div>
    </div>

    <div class="mb-3 row">
        <div class="col-sm-10">
            <label class="form-label">Deskripsi * </label>
            <textarea name="description" class="form-control mb-3" style="width:450px ; height: 150px ; margin-left: 215px" value="<?php echo !isset($_GET['edit']) ? $rowEdit['description'] : '' ?>" cols="30" rows="5">
         </textarea>
        </div>
    </div>

    <div class="mb-3 row">
        <div class="col-sm-2">
            <label for="">Foto </label>
        </div>
        <div class="col-sm-10">
            <input name="photo" type="file">
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