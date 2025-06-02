<?php
$query = mysqli_query($config, "SELECT * FROM contacts ORDER BY id DESC");
$row = mysqli_fetch_all($query, MYSQLI_ASSOC);

if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $queryDelete = mysqli_query($config, "DELETE FROM contacts WHERE id='$id'");
    header("location:contact.php?hapus=berhasil");
}
?>
<div class="table-responsive">
    <table id="table" class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Lengkap</th>
                <th>Email</th>
                <th>Subjek</th>
                <th>Pesan</th>
                <th>Action</th>
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
                    <td><?= $data['subject'] ?></td>
                    <td><?= $data['message'] ?></td>
                    <td><a href="?page=balas-pesan&idpesan=<?php echo $data['id'] ?>" class="btn btn-success btn-sm">Balas Pesan</a></td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</div>