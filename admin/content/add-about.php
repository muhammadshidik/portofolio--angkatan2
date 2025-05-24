<?php
//fungsi insert
include "config/koneksi.php";
if (isset($_POST['simpan'])) {
    $name = $_POST['name'];
    $profile = $_POST['profile'];
    $email = $_POST['email'];
    //proses simpan foto
    $photo = $_FILES['photo'];
    // var_dump($photo);
    if ($photo['error'] == 0) {
        $fileName = uniqid() . "_" . basename($photo['name']);
        $filePath = "uploads/" . $fileName;
        move_uploaded_file($photo['tmp_name'], $filePath);
    }
    $insertQ = mysqli_query($config, "INSERT INTO abouts(name, profile, email,  photo) VAlUES ('$name','$profile','$email','$fileName')");
    if ($insertQ) {
        // header("location:dashboard.php?role=" . base64_encode($_SESSION['LEVEL']) . "&page=manage-profile");
    }
}

if (isset($_GET['del'])) {
    $idDel = $_GET['del'];
    $selectPhoto = mysqli_query($config, "SELECT photo FROM abouts WHERE id= $idDel");
    $rowPhoto = mysqli_fetch_assoc($selectPhoto);
    if (isset($rowPhoto['photo'])) {
        @unlink("uploads/" . $rowPhoto['photo']);
    }
    $delete = mysqli_query($config, "DELETE FROM abouts WHERE id= $idDel");

    if ($delete) {
        // header("location:?level=" . base64_encode($_SESSION['LEVEL']) . "&page=manage-profile");
        // echo "<script></script>";
    }
}
$selectProfile = mysqli_query($config, "SELECT * FROM abouts");
$row = mysqli_fetch_assoc($selectProfile);
?>

<form action="" method="post" enctype="multipart/form-data">
    <div class="m-2" style="width:55%">
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
    </div>
</form>