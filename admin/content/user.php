<?php
// update terbaru tgl 27
$query = mysqli_query($config, "SELECT levels.name_level, users.* FROM users
LEFT JOIN levels ON levels.id = users.id_level ORDER BY users.id DESC");
$row = mysqli_fetch_all($query, MYSQLI_ASSOC);

if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $queryDelete = mysqli_query($config, "DELETE FROM users WHERE id='$id'");
    header("location:?page=user&hapus=berhasil");
}
?>

<div class="table-responsive">
    <div align="right" class="mb-3">
        <a href="?page=tambah-user" class="btn btn-primary">Tambah</a>
    </div>
    <table class="table table-bordered table-striped" id="table">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Level</th>
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
                    <!-- //terbaru id level 27 05 -->
                    <td><?= $data['name_level'] ?></td>
                    <td><?= $data['name'] ?></td>
                    <td><?= $data['email'] ?></td>
                    <td>
                        <a href="?page=tambah-user&edit=<?php echo $data['id'] ?>" class="btn btn-success btn-sm">Edit</a>
                        <a onclick="return confirm('Are you sure??')"
                            href="?page=user&delete=<?php echo $data['id'] ?>" class="btn btn-warning btn-sm">Delete</a>
                    </td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</div>