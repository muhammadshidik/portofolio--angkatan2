<?php
//fungsi insert
include "config/koneksi.php";
if (isset($_POST['simpan'])) {
    $profile_name = $_POST['profile_name'];
    $description = $_POST['description'];
    //proses simpan foto
    $photo = $_FILES['photo']['name'];
    // var_dump($photo);
}
//mencari apakah didalem tabel profile ada datanya, jika ada maka update, jika tidak ada maka insert
//mysqli_num_row()
$queryProfile = mysqli_query($config, "SELECT * FROM profiles ORDER BY id DESC");
if (mysqli_num_rows($queryProfile) > 0) {
    $rowProfile = mysqli_fetch_assoc($queryProfile);
    $id = $rowProfile['id'];
    //perintah update
    $update = mysqli_query($config, "UPDATE profiles SET profile_name = '$profile_name', description = '$description' WHERE id = '$id'");
    header("location:?page=-manage-profile&ubah=berhasil");
} else {
    //perintah insert
    if (!empty($photo)) {
        //jika user mengapload gambar
    } else {
        //jika tidak mengaplod gambar
        $insertQ = mysqli_query($config, "INSERT INTO profiles(profile_name, profesion, description, photo) VAlUES ('$profile_name','$profesion','$description','$fileName')");
        if ($insertQ) {
        }
    }
}

//     if ($photo['error'] == 0) {
//         $fileName = uniqid() . "_" . basename($photo['name']);
//         $filePath = "uploads/" . $fileName;
//         move_uploaded_file($photo['tmp_name'], $filePath);
//     }
//     $insertQ = mysqli_query($config, "INSERT INTO profiles(profile_name, profesion, description, photo) VAlUES ('$profile_name','$profesion','$description','$fileName')");
//     if ($insertQ) {
//         // header("location:dashboard.php?role=" . base64_encode($_SESSION['LEVEL']) . "&page=manage-profile");
//     }
// }

if (isset($_GET['del'])) {
    $idDel = $_GET['del'];
    $selectPhoto = mysqli_query($config, "SELECT photo FROM profiles WHERE id= $idDel");
    $rowPhoto = mysqli_fetch_assoc($selectPhoto);
    if (isset($rowPhoto['photo'])) {
        unlink("uploads/" . $rowPhoto['photo']);
    }
    $delete = mysqli_query($config, "DELETE FROM profiles WHERE id= $idDel");

    if ($delete) {
        // header("location:?level=" . base64_encode($_SESSION['LEVEL']) . "&page=manage-profile");
        // echo "<script></script>";
    }
}
$selectProfile = mysqli_query($config, "SELECT * FROM profiles");
$row = mysqli_fetch_assoc($selectProfile);
?>

<form action="" method="post" enctype="multipart/form-data">
    <div class="m-2" style="width:55%">
        <div class="m-3">
            <label class="form-label">judul</label>
            <input type="text" value="<?php echo !isset($row['profile_name']) ? '' : $row['profile_name'] ?>" class="form-control" name="profile_name">
        </div>

        <div class="mb-3">
            <label class="form-label">Description</label>
            <textarea class="form-control" value="" name="description" cols="30" rows="5"><?php echo !isset($row['description']) ? '' : $row['profile_name'] ?>
        </textarea>
        </div>
        <div class="mb-3">
            <label class="form-label">Photo</label>
            <input type="file" name="photo" class="form-control">
        </div>

        <img src="uploads/<?php echo $row['photo'] ?>" width="200" alt="gambar"><br>
        <button type="submit" name="simpan" class="btn btn-primary mt-2">Simpan Perubahan</button>
    </div>
</form>