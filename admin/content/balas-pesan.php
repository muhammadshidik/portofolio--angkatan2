<?php

if (isset($_GET['idPesan'])) {
}
$getid = $_GET['idPesan'];
$selectPesan = mysqli_query($config, "SELECT * FROM contacts WHERE id = $getid");
$rowPesan = mysqli_fetch_assoc($selectPesan);
if (isset($_POST['kirim_pesan'])) {
    $subject = $_POST['subject'];
    $message = $_POST['message'];
    $email = $rowPesan['email'];

    $headers = "FROM : sidiksadar11@gmail.com\r\n" .
        "Reply-To : sidiksadar11@gmail.com\r\n" .
        "Content-Type : text/plain; charset=UTF-8 \r\n" .
        "MIME-Version : 1.0\r\n";

    if (mail($email, $subject, $message, $headers)) {
        header("location:page=balas-pesan");
        exit();
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
                value="<?php echo $rowPesan['name'] ?>">
        </div>
    </div>
    <div class="mb-3 row">
        <div class="col-sm-2">
            <label for="">email * </label>
        </div>
        <div class="col-sm-10">
            <input required name="email" type="text"
                class="form-control"
                placeholder="exmple:joko@gmail.com"
                value="<?php echo $rowPesan['email'] ?>">
        </div>
    </div>
    <div class="mb-3 row">
        <div class="col-sm-2">
            <label for="">Subject * </label>
        </div>
        <div class="col-sm-10">
            <input required name="Subject" type="text"
                class="form-control"
                placeholder=""
                value="<?php echo $rowPesan['name'] ?>">
        </div>
    </div>

    <div class="mb-3 row">
        <div class="col-sm-2">
            <label for="">Message * </label>
        </div>
        <div class="col-sm-10">
            <textarea id="summernote" class="form-control" name="description" cols="30" rows="5"><?php echo $rowPesan['message'] ?></textarea>
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

    </div>
    <div class="mb-3 row">
        <div class="col-sm-12">
            <button name="kirim_pesan" type="submit"
                class="btn btn-primary">Kirim Pesan</button>
        </div>
    </div>
</form>