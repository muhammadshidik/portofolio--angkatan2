<?php
// update terbaru tgl 27 - Ini cuma catatan kecil, mungkin menandakan kapan kode ini terakhir diubah.

// Bagian ini adalah inti dari kode PHP kita.
// Kita mengambil data pengguna dari database.
// Query SQL-nya seperti ini: "SELECT levels.name_level, users.* FROM users LEFT JOIN levels ON levels.id = users.id_level ORDER BY users.id DESC"
// Artinya:
// - SELECT levels.name_level, users.* : Ambil kolom 'name_level' dari tabel 'levels' (ini adalah nama level pengguna, seperti 'Admin' atau 'Pengguna Biasa')
//   dan ambil SEMUA kolom (*) dari tabel 'users' (seperti nama, email, dll.).
// - FROM users : Kita mulai dari tabel 'users'.
// - LEFT JOIN levels ON levels.id = users.id_level : Gabungkan (join) tabel 'users' dengan tabel 'levels'.
//   Kita gabungkan berdasarkan kondisi di mana 'id' di tabel 'levels' sama dengan 'id_level' di tabel 'users'.
//   Ini penting agar kita bisa tahu nama level dari setiap pengguna.
// - ORDER BY users.id DESC : Urutkan hasilnya berdasarkan ID pengguna, dari yang terbaru (ID terbesar) ke yang lama (ID terkecil).
$query = mysqli_query($config, "SELECT levels.name_level, users.* FROM users
LEFT JOIN levels ON levels.id = users.id_level ORDER BY users.id DESC");

// Setelah data berhasil diambil dari database,
// baris ini mengubah hasil query menjadi sebuah array yang mudah kita gunakan di PHP.
// `MYSQLI_ASSOC` berarti setiap baris data akan menjadi array asosiatif (kita bisa akses datanya pakai nama kolom, contohnya `$data['name']`).
$row = mysqli_fetch_all($query, MYSQLI_ASSOC);

// Bagian ini menangani proses penghapusan data pengguna.
// `if (isset($_GET['delete']))` artinya: periksa apakah ada parameter bernama 'delete' di URL.
// Misalnya, jika URL-nya `http://namasitus.com/?page=user&delete=123`, maka blok ini akan dijalankan.
if (isset($_GET['delete'])) {
    // Ambil nilai ID pengguna yang ingin dihapus dari parameter 'delete' di URL.
    $id = $_GET['delete'];
    // Lakukan perintah SQL untuk menghapus baris dari tabel 'users'
    // di mana 'id' pengguna sama dengan nilai `$id` yang kita dapatkan tadi.
    $queryDelete = mysqli_query($config, "DELETE FROM users WHERE id='$id'");
    // Setelah penghapusan selesai, kita alihkan (redirect) pengguna kembali ke halaman daftar pengguna (`?page=user`).
    // Kita juga tambahkan parameter `&hapus=berhasil` di URL, yang bisa digunakan untuk menampilkan pesan sukses di halaman tujuan.
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
                <th>No</th>           <th>Nama Level</th>   <th>Nama</th>         <th>Email</th>        <th></th>             </tr>
        </thead>
        <tbody>
            <?php
            // `$i = 1;` - Ini adalah variabel penghitung, tapi sebenarnya tidak dipakai di sini
            // karena kita menggunakan `$key + 1` untuk nomor urut.
            // Loop `foreach ($row as $key => $data):` ini akan mengulang
            // untuk setiap baris data pengguna yang kita ambil dari database (`$row`).
            // `$key` adalah indeks array (dimulai dari 0), dan `$data` adalah detail lengkap satu baris pengguna.
            foreach ($row as $key => $data): ?>
                <tr>
                    <td><?= $key + 1 ?></td>
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