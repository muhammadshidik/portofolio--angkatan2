<?php // Memulai blok kode PHP
// Mengambil semua data dari tabel 'abouts' dan mengurutkannya berdasarkan 'id' secara menurun (DESC).
// '$config' diasumsikan sebagai variabel koneksi ke database.
$query = mysqli_query($config, "SELECT * FROM educations ORDER BY id DESC");

// Mengambil semua baris hasil query sebagai array asosiatif.
// Setiap baris akan menjadi elemen dalam array '$row', dengan nama kolom sebagai kunci.
$row = mysqli_fetch_all($query, MYSQLI_ASSOC);
// Logika untuk tombol hapus dari database
// Mengecek apakah ada parameter 'delete' yang dikirim melalui URL (metode GET).
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $queryDelete = mysqli_query($config, "DELETE FROM educations WHERE id='$id'");
    header("location:?page=education&hapus=berhasil");
}
?>

<div class="table-responsive">
    <div align="right" class="mb-3">
        <a href="?page=add-education" class="btn btn-primary">Tambah</a>
    </div>
    <table class="table table-bordered table-striped" id="table">
        <thead>
            <tr>
                <th>No</th>
                <th>Jurusan</th>
                <th>Tahun</th>
                <th>Universitas</th>
                <th>Deskripsi</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Inisialisasi variabel '$i' untuk nomor urut (alternatif, tapi tidak digunakan di kode aktif).
            $i = 1;
            // Melakukan perulangan (looping) untuk setiap data yang ada di dalam array '$row'.
            // '$key' akan berisi indeks numerik dari array, dan '$data' akan berisi array asosiatif untuk setiap baris data.
            foreach ($row as $key => $data):
            ?>
                <tr>
                    <td><?= $key + 1 ?></td>
                    <td><?= $data['major'] ?></td>
                    <td><?= $data['year'] ?></td>
                    <td><?= $data['university'] ?></td>
                    <td><?= $data['description'] ?></td>
                    <td><?= $data['status'] ?></td>
                    <td>
                        <a href="?page=add-education&edit=<?php echo $data['id'] ?>" class="btn btn-outline-success btn-sm">Edit</a>
                        <a onclick="return confirm('Are you sure??')"
                            href="?page=education&delete=<?php echo $data['id'] ?>" class="btn btn-outline-danger btn-sm">Delete</a>
                    </td>
                </tr>
            <?php
            // Akhir dari perulangan foreach
            endforeach
            ?>
        </tbody>
    </table>
</div>