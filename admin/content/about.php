<?php
$query = mysqli_query($config, "SELECT * FROM abouts ORDER BY id DESC");
$row = mysqli_fetch_all($query, MYSQLI_ASSOC);


//tombol hapus dari database

if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $queryDelete = mysqli_query($config, "DELETE FROM abouts WHERE id='$id'");
    header("location:?page=abouts&hapus=berhasil");
}
?>

<div class="table-responsive">
    <div align="right" class="mb-3">
        <a href="?page=add-about" class="btn btn-primary">Tambah</a>
    </div>
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>Nama</th>
                <th>Profile</th>
                <th>Email</th>
                <th>Phone</th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 1;
            foreach ($row as $key => $data): ?>
                <tr>
                    <!-- <td><?= $i++ ?></td> -->
                    <td><?= $key + 1 ?></td>
                    <td><?= $data['name'] ?></td>
                    <td><?= $data['profile'] ?></td>
                    <td><?= $data['email'] ?></td>
                    <td><?= $data['phone'] ?></td>
                    <td><?= $data['photo'] ?></td>
                    <td><?= $data['status'] ?></td>
                    <td><?= $data['skills'] ?></td>

                    <td>
                        <a href="" class="btn btn-success btn-sm "> Detail</a>
                        <a href="add-about?edit=<?php echo $data['id'] ?>" class="btn btn-success btn-sm">Edit</a>
                        <a onclick="return confirm('Are you sure??')"
                            href="add-about?delete=<?php echo $data['id'] ?>" class="btn btn-warning btn-sm">Delete</a>
                    </td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</div>