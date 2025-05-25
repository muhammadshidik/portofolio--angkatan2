<?php
include "config/koneksi.php";
//FUNGSI INSERT:
if (isset($_POST['simpan'])) {
    $profile_name = $_POST['profile_name']; //undifened array key profile_name
    $description = $_POST['description'];
    //PROSES SIMPAN FOTO
    $photo = $_FILES['photo']['name'];

    // mencari apakah di dalem table profiles ada datanya, jika ada maka update, jika tidak ada maka insert
    // mysqli_num_row()
    $queryProfile = mysqli_query($config, "SELECT * FROM profiles ORDER BY id DESC");
    if (mysqli_num_rows($queryProfile) > 0) {
        $rowProfile = mysqli_fetch_assoc($queryProfile);
        $id = $rowProfile['id'];
        // perintah update
        $update = mysqli_query($config, "UPDATE profiles SET 
        profile_name='$profile_name',  description='$description' WHERE id ='$id'");
        header("location:?page=manage-profile&ubah=berhasil");
    } else {
        // perintah insert
        if (!empty($photo)) {
            // JIKA USER UPLOAD GAMBAR
        } else {
            // JIKA USER TIDAK MENGUPLOAD GAMBAR
            $insertQ = mysqli_query($config, "INSERT INTO profiles (profile_name,  description) 
            VALUES ('$profile_name', '$description')");
            header("location:?page=manage-profile&tambah=berhasil");
        }
    }
    // if ($photo['error'] == 0) {
    //     $fileName = uniqid() . "_" . basename($photo['name']);
    //     $filePath = "uploads/" . $fileName;
    //     move_uploaded_file($photo['tmp_name'], $filePath);
    //     $insertQ = mysqli_query($config, "INSERT INTO profiles (profile_name, profesion, description, photo) VALUES ('$profile_name', '$profesion', '$description', '$fileName')");
    // }
    // //END PROSES SIMPAN FOTO
    // if ($insertQ) {
    //     // header("location:?level=" . base64_encode($_SESSION['LEVEL']) . "&page=manage-profile");
    // }
}

$selectProfile = mysqli_query($config, "SELECT * FROM profiles");
$row = mysqli_fetch_assoc($selectProfile);

if (isset($_GET['del'])) {
    $idDel = $_GET['del'];
    $selectPhoto = mysqli_query($config, "SELECT photo FROM profiles WHERE id= $idDel");
    $rowPhoto = mysqli_fetch_assoc($selectPhoto);
    unlink("uploads/" . $rowPhoto['photo']);
    $delete = mysqli_query($config, "DELETE FROM profiles WHERE id= $idDel");
    if ($delete) {
        // header("location:?level=" . base64_encode($_SESSION['LEVEL']) . "&page=manage-profile");
        // echo "<script></script>";
    }
}
?>
<form action="" method="post" enctype="multipart/form-data">
    <div>
        <div class="mb-3">
            <label class="form-label">Judul</label>
            <input type="text"
                value="<?php echo !isset($row['profile_name']) ? '' : $row['profile_name'] ?>" class="form-control" name="profile_name">
        </div>
        <div class="mb-3">
            <label class="form-label">Description</label>
            <textarea class="form-control" name="description" cols="30" rows="5"><?php echo !isset($row['description']) ? "" : $row['description'] ?></textarea>
        </div>
        <div class="mb-3">
            <label class="form-label">Photo</label>
            <input type="file" name="photo" class="form-control">
        </div>
        <img src="uploads/<?php echo $row['photo'] ?>" width="150" alt=""><br>
        <button type="submit" name="simpan" class="btn btn-primary mt-2">Simpan Perubahan</button>

    </div>
</form>