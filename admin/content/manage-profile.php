<?php
//fungsi insert
include "config/koneksi.php";
if (isset($_POST['simpan'])) {
    $profile_name = $_POST['profile_name'];
    $profesion = $_POST['profesion'];
    $description = $_POST['description'];
    //proses simpan foto
    $photo = $_FILES['photo'];
    // var_dump($photo);
    if ($photo['error'] == 0) {
        $fileName = uniqid() . "_" . basename($photo['name']);
        $filePath = "uploads/" . $fileName;
        move_uploaded_file($photo['tmp_name'], $filePath);
        $insertQ = mysqli_query($config, "INSERT INTO profiles(profile_name, profesion, description, photo) VAlUES ('$profile_name','$profesion','description','$$fileName')");
    }
    $insertQ = mysqli_query($config, "INSERT INTO profiles (profile_name, profesion, description) VALUES ('$profile_name','$profesion','$description')");
    if ($insertQ) {
        // header("location:dashboard.php?role=" . base64_encode($_SESSION['LEVEL']) . "&page=manage-profile");
    }
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
    <div class="m-2" style="width:55%">
        <label class="form-label">Profile Name</label>
        <input type="text" value="<?php echo !isset($row['profile_name']) ? '' : $row['profile_name'] ?>" class="form-control" name="profile_name">

        <label class="form-label">Profesion</label>
        <input type="text" value="<?php echo !isset($row['profesion']) ? '' : $row['description'] ?>" class="form-control" name="profesion">

        <label class="form-label">Description</label>
        <textarea class="form-control" value="<?php echo !isset($row['description']) ? '' : $row['profile_name'] ?>" name="description" cols="30" rows="5">
        </textarea>

        <label class="form-label">Photo</label>
        <input type="file" name="photo" class="form-control">
        <img src="uploads/<?php echo $row['photo'] ?>" width="150" alt=""><br>
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