<?php
// jika user/pengguna mencet tombol simpan
// ambil data dari inputan, email, nama dan password
// masukkan ke dalam table user (name, email, password) nilainya dari masing-masing inputan 
//fungsi insert

// include "config/koneksi.php";
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
    // apakah user mengupload gambar dengan ekstensi tersebut, jika iya masukkan gambar ke table dan folder, jika tidak
    // error, ekstensi tidak ditemukan
    // in_array = 

$ext = pathinfo($photo, PATHINFO_EXTENSION);
    if (!in_array($ext, $ekstensi)) {
        $error[] = "Mohon maaf, ekstensi file tidak ditemukan";
    } else {
        $query = mysqli_query($config, "INSERT INTO abouts (name, profile, email, phone, photo, status, skills, description)
         VALUES ('$name','$profile','$email','$phone','$photo','$status','$skills','$description')");
        if ($query) {
            header("location:?page=about&tambah=berhasil");
        }
    }
    print_r($error);
    die;
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
    $status  = $_POST['status'];
    $skills = $_POST['skills'];

    $queryUpdate = mysqli_query($config, "UPDATE abouts SET name='$name', profile='$profile', email='$email', phone='phone',status='$status', skills='$skills' WHERE id='$id_user'");
    if ($queryUpdate) {
        header("location:content/about.php?ubah=berhasil");
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
        <textarea name ="description" class="form-control mb-3" style="width:450px ; height: 150px ; margin-left: 215px" value="<?php echo !isset($_GET['edit']) ? $rowEdit['description'] :'' ?>"cols="30" rows="5">
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