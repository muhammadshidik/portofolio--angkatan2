<?php
// Menginclude file 'koneksi.php' yang berisi detail koneksi ke database.
// File ini wajib ada agar script bisa berkomunikasi dengan database.
include 'config/koneksi.php';

// --- LOGIKA MENAMBAH PENGGUNA BARU ---
// Memeriksa apakah form telah disubmit dengan tombol 'simpan' ditekan.
// Tombol 'simpan' biasanya ada saat kita ingin menambah data baru.
if (isset($_POST['simpan'])) {
    // Ambil data 'name' dari inputan form.
    $name = $_POST['name'];
    // Ambil data 'email' dari inputan form.
    $email = $_POST['email'];
    // Ambil data 'password' dari inputan form, lalu enkripsi menggunakan SHA1.
    // PENTING: SHA1 adalah metode enkripsi yang *tidak aman* untuk password di zaman sekarang.
    // Sebaiknya gunakan fungsi `password_hash()` dan `password_verify()` PHP untuk keamanan yang lebih baik.
    $password = sha1($_POST['password']);

    // Jalankan query SQL untuk memasukkan data baru ke tabel 'users'.
    // `INSERT INTO users (name, email, password) VALUES ('$name','$email','$password')`
    // Artinya: Masukkan ke tabel 'users', di kolom 'name', 'email', 'password',
    // nilainya diambil dari variabel `$name`, `$email`, dan `$password`.
    $query = mysqli_query($config, "INSERT INTO users (name, email, password)
    VALUES ('$name','$email','$password')");

    // Memeriksa apakah query INSERT berhasil dijalankan.
    if ($query) {
        // Jika berhasil, alihkan pengguna kembali ke halaman 'user.php'
        // dengan menambahkan parameter `?tambah=berhasil` di URL.
        // Ini bisa digunakan untuk menampilkan pesan sukses di halaman daftar user.
        header("location:user.php?tambah=berhasil");
    }
}

// --- LOGIKA MENENTUKAN JUDUL FORM (Tambah atau Edit) dan MENGAMBIL DATA UNTUK EDIT ---
// Menentukan teks untuk judul form.
// Jika ada parameter 'edit' di URL (`?edit=ID_USER`), maka judulnya adalah "Edit".
// Jika tidak ada, judulnya adalah "Tambah".
$header = isset($_GET['edit']) ? "Edit" : "Tambah";

// Mengambil ID pengguna jika ada parameter 'edit' di URL.
// Jika tidak ada, `id_user` akan menjadi string kosong.
$id_user = isset($_GET['edit']) ? $_GET['edit'] : '';

// Jika `id_user` tidak kosong (berarti ini mode edit),
// kita ambil data pengguna tersebut dari database.
// `SELECT * FROM users WHERE id='$id_user'` : Ambil semua kolom dari tabel 'users'
// di mana ID pengguna sama dengan `$id_user`.
$queryEdit = mysqli_query($config, "SELECT * FROM users WHERE id='$id_user'");

// Ambil hasil query `$queryEdit` sebagai array asosiatif.
// Data ini akan digunakan untuk mengisi otomatis form saat dalam mode "Edit".
$rowEdit = mysqli_fetch_assoc($queryEdit);


// --- LOGIKA MENGEDIT PENGGUNA YANG SUDAH ADA ---
// Memeriksa apakah form telah disubmit dengan tombol 'edit' ditekan.
// Tombol 'edit' ini muncul saat kita dalam mode pengeditan.
if (isset($_POST['edit'])) {
    // Ambil data 'name' yang baru dari inputan form.
    $name = $_POST['name'];
    // Ambil data 'email' yang baru dari inputan form.
    $email = $_POST['email'];
    // Ambil data 'password' yang baru dari inputan form dan enkripsi dengan SHA1.
    // Sekali lagi, ingat isu keamanan SHA1 untuk password.
    $password = sha1($_POST['password']);

    // Jalankan query SQL untuk memperbarui (UPDATE) data pengguna di tabel 'users'.
    // `UPDATE users SET name='$name', email='$email', password='$password' WHERE id='$id_user'`
    // Artinya: Perbarui tabel 'users', atur kolom 'name' menjadi `$name` yang baru,
    // 'email' menjadi `$email` yang baru, dan 'password' menjadi `$password` yang baru,
    // di mana ID pengguna sama dengan `$id_user` yang sedang diedit.
    $queryUpdate = mysqli_query($config, "UPDATE users SET name='$name', email='$email',
    password='$password' WHERE id='$id_user'");

    // Memeriksa apakah query UPDATE berhasil dijalankan.
    if ($queryUpdate) {
        // Jika berhasil, alihkan pengguna kembali ke halaman 'user.php'
        // dengan menambahkan parameter `?ubah=berhasil` di URL.
        // Ini bisa digunakan untuk menampilkan pesan sukses bahwa data telah diubah.
        header("location:user.php?ubah=berhasil");
    }
}
?>