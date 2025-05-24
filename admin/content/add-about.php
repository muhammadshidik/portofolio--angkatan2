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
    $skills = $_POST['skills'];
    //proses simpan foto
    $photo = $_FILES['photo'];
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
        $query = mysqli_query($config, "INSERT INTO abouts (name, profil, email, phone, status, skills, photo)
         VALUES ('$name','$profil','$email', '$phone','$status','$skills','$photo')");
        if ($query) {
            header("location:?page=team&tambah=berhasil");
        }
    }
    print_r($error);
    die;
}

//revisian ambil dari pak reza
$header = isset($_GET['edit']) ? "Edit" : "Tambah";
$id_user = isset($_GET['edit']) ? $_GET['edit'] : '';
$queryEdit = mysqli_query($config, "SELECT * FROM users WHERE id='$id_user'");
$rowEdit  = mysqli_fetch_assoc($queryEdit);

if (isset($_POST['edit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = sha1($_POST['password']);

    if ($password == '') {
        $queryUpdate = mysqli_query($config, "UPDATE users SET name='$name', email='$email' WHERE id='$id_user'");
    }
    $queryUpdate = mysqli_query($config, "UPDATE users SET name='$name', email='$email', 
    password='$password' WHERE id='$id_user'");
    if ($queryUpdate) {
        header("location:user.php?ubah=berhasil");
    }
}
?>

<!-- <form action="" method="post" enctype="multipart/form-data">
        <label class="form-label">nama </label>
        <input type="text" value="<?php echo !isset($row['name']) ? '' : $row['name'] ?>" class="form-control" name="name">

        <label class="form-label">Profil </label>
        <input type="text" value="<?php echo !isset($row['profile']) ? '' : $row['profile'] ?>" class="form-control" name="profile">

        <label class="form-label">Email</label>
        <input type="text" value="<?php echo !isset($row['email']) ? '' : $row['email'] ?>" class="form-control" name="email">

        <label class="form-label">Nomor Handpone</label>
        <input type="text" value="<?php echo !isset($row['phone']) ? '' : $row['phone'] ?>" class="form-control" name="phone">

        <label class="form-label">Description</label>
        <textarea class="form-control" value="" name="description" cols="30" rows="5"><?php echo !isset($row['description']) ? '' : $row['descripstion'] ?>
        </textarea>

        <label class="form-label">Photo</label>
        <input type="file" name="photo" class="form-control">
        <img src="uploads/<?php echo $row['photo'] ?>" width="200" alt="gambar"><br>
        <?php if (empty($row['profile_name'])) {
        ?>
            <button type="submit" name="simpan" class="btn btn-primary mt-2">simpan</button>


        <?php
        } else {
        ?>
            <a onclick="return confirm('YAKIN INGIN DIHAPUS??')" href="?
            level=<?php echo base64_encode($_SESSION['LEVEL']) ?>& page=manage-profile>&del=<?php echo $row['id'] ?>" class="btn btn-danger mt-2">Delete</a>
        <?php
        } ?>
</form> -->

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
            <label for="">Jabatan * </label>
        </div>
        <div class="col-sm-10">
            <input required name="position_name" type="text"
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
            <input required name="position_name" type="text"
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
            <input required name="position_name" type="text"
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
            <input required name="position_name" type="text"
                class="form-control"
                placeholder="Masukkan kemampuan anda"
                value="<?= isset($_GET['edit']) ? $rowEdit['skills'] : '' ?>">
        </div>
    </div>

    <div class="mb-3 row">
    <div class="col-sm-10">
        <label class="form-label">Deskripsi * </label>
        <textarea class="form-control mb-3" style="width:450px ; height: 150px ; margin-left: 215px" value="<?php echo !isset($_GET['edit']) ? $rowEdit['description'] :'' ?>"cols="30" rows="5">
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
