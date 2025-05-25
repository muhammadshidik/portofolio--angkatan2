<?php
include 'config/koneksi.php';

//memunculkan/pilih semua data dari table user urutkan dari yang terbesar
//ke terkecil

$query = mysqli_query($config, "SELECT * FROM users ORDER BY id DESC");
$row = mysqli_fetch_all($query, MYSQLI_ASSOC);


//tombol hapus dari database

if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $queryDelete = mysqli_query($config, "DELETE FROM users WHERE id='$id'");
    header("location:user.php?hapus=berhasil");
}

// //edit
// $header = isset($_GET['edit']) ? "edit" : "Tambah";
// $id_user = isset($_GET['edit']) ? $_GET['edit'] : '';
// $queryEdit = mysqli_query($config, "SELECT FROM users WHERE id='$id_user'");
// $rowEdit = mysqli_fetch_assoc($queryEdit);
// 
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous">
    </script>
</head>

<body>
    <div class="wrapper">
        <?php include 'inc/header.php'; ?>
        <div class="content mt-5">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-header">
                                Data User
                            </div>
                            <div class="card-body">
                                <?php
                                if (isset($_GET['page'])) {
                                    //jika file ada
                                    if (file_exists("content/" . $_GET['page'] . ".php")) {
                                        include('content/' . $_GET['page'] . ".php");
                                    } else {
                                        include "content/notfound.php";
                                    }
                                } else {
                                    include 'content/home.php';
                                }
                                ?>
                                <div class="table-responsive">
                                    <div align="right" class="mb-3">
                                        <a href="tambah-user.php?level=<?php echo base64_encode($_SESSION['LEVEL']) ?>" class="btn btn-primary">Tambah</a>
                                    </div>
                                    <table class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama</th>
                                                <th>Email</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $i = 1;
                                            foreach ($row as $key => $data): ?>
                                                <tr>
                                                    <!-- <td><?= $i++ ?></td> -->
                                                    <td><?= $key + 1 ?></td>
                                                    <td><?= $data['name'] ?></td>
                                                    <td><?= $data['email'] ?></td>
                                                    <td>
                                                        <a href="tambah-user.php?edit=<?php echo $data['id'] ?>" class="btn btn-success btn-sm">Edit</a>
                                                        <a onclick="return confirm('Are you sure??')"
                                                            href="user.php?delete=<?php echo $data['id'] ?>" class="btn btn-warning btn-sm">Delete</a>
                                                    </td>
                                                </tr>
                                            <?php endforeach ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>