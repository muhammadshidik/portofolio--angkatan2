<?php
// Memulai atau melanjutkan sesi PHP. Ini penting untuk menyimpan informasi pengguna (seperti nama, ID, level)
// setelah login berhasil, agar informasi tersebut bisa diakses di halaman lain.
session_start();
// Menginclude file 'koneksi.php' yang berisi detail koneksi ke database.
// File ini diasumsikan sudah ada dan benar.
include 'config/koneksi.php';

// Bagian kode yang dikomentari di bawah ini adalah contoh atau versi sebelumnya dari logika login.
// (Biasanya ada alasan mengapa ini dikomentari, mungkin ada versi yang lebih baru atau perubahan fungsionalitas.)
/*
// if (isset($_POST['email']) && isset($_POST['password'])) {
//     $email = $_POST['email'];
//     $password = sha1($_POST['password']); // Mengenkripsi password menggunakan SHA1 (perlu diingat: SHA1 sudah tidak aman untuk password!)

// select /tampilkan semua data dari table user dimana email diambil dari orang
// input di inputan email

// membuat kueri user
// $query = mysqli_query($config, "SELECT * FROM users
// WHERE email='$email' AND password ='$password'");

// apakah / jika betul email yang input user adalah email yang ada ditable user

// if (mysqli_num_rows($query) > 0) { // Memeriksa apakah ada baris data yang ditemukan (email dan password cocok)
//     $row = mysqli_fetch_assoc($query); // Mengambil data pengguna sebagai array asosiatif
//     $_SESSION['EMAIL'] = $row['email']; // Menyimpan email ke sesi
//     $_SESSION['ID_USER'] = $row['id'];   // Menyimpan ID pengguna ke sesi
//     header("location:dashboard.php"); // Mengarahkan ke dashboard jika login berhasil
// } else {
//     header("location:index.php?error=login"); // Mengarahkan kembali ke index dengan pesan error jika gagal
// }
// }
*/

// Kode Fikri - Ini adalah implementasi logika login yang aktif dan digunakan.
// Memeriksa apakah form login telah disubmit (yaitu, apakah input 'email' dan 'password' ada di data POST).
if (isset($_POST['email']) && isset($_POST['password'])) {
    // Mengambil nilai email yang diinput dari form.
    $email = $_POST['email'];
    // Mengambil nilai password yang diinput dari form dan mengenkripsinya menggunakan SHA1.
    // PENTING: SHA1 adalah metode hashing yang *tidak aman* untuk password di era modern.
    // Seharusnya menggunakan `password_hash()` dan `password_verify()` PHP untuk keamanan yang lebih baik.
    $password = sha1($_POST['password']);

    // Check if the email and password are empty - Komentar ini tidak diimplementasikan dengan kode PHP untuk cek kosong.
    // Logikanya langsung memproses query.

    // Melakukan query ke database untuk mencari pengguna dengan email dan password yang cocok.
    $query = mysqli_query($config, "SELECT * FROM users WHERE email='$email' AND password='$password'");
    // Check if the user exists - Memeriksa apakah ada baris data yang ditemukan dari query di atas.
    // Jika `mysqli_num_rows($query)` lebih dari 0, berarti ada pengguna dengan kombinasi email dan password tersebut.
    if (mysqli_num_rows($query) > 0) {
        // Jika pengguna ditemukan, ambil data pengguna tersebut sebagai array asosiatif.
        $row = mysqli_fetch_assoc($query);
        // Check if the password is correct - Komentar ini sedikit misleading karena cek password sudah dilakukan di query SQL.
        // Jika sampai sini, password sudah dianggap benar.

        // Menyimpan beberapa informasi penting pengguna ke dalam SESSION.
        // Ini akan digunakan untuk melacak status login pengguna di halaman lain.
        $_SESSION['name'] = $row['name'];      // Menyimpan nama pengguna.
        $_SESSION['uuid'] = $row['id'];        // Menyimpan ID unik pengguna (UUID).
        $_SESSION['LEVEL'] = $row['id_level']; // Menyimpan level akses pengguna (misalnya Admin, User Biasa).

        // Mengarahkan pengguna ke halaman 'dashboard.php' setelah login berhasil.
        header('Location: dashboard.php');
    } else {
        // Jika tidak ada pengguna yang cocok (email atau password salah),
        // pengguna akan dialihkan kembali ke halaman 'index.php' dengan pesan kesalahan 'login=failed'.
        header('Location: index.php?login=failed');
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form | Portofolio Siddiq</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
</head>

<body>

    <div class="wrapper">
        <div class="login-form mt-5">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-sm-6">
                        <div class="card">
                            <div class="card-header">
                                Login Form
                            </div>
                            <div class="card-body">
                                <form action="" method="post">
                                    <div class="mb-3">
                                        <label for="" class="form-label">Email</label>
                                        <input type="email" class="form-control"
                                            name="email" id="email" placeholder="Ex:admin@gmail.com">
                                    </div>
                                    <div class="mb-3">
                                        <label for="" class="form-label">Password</label>
                                        <input type="password" class="form-control"
                                            name="password" id="password" placeholder="Masukkan Password Anda">
                                    </div>
                                    <div class="mb-3">
                                        <button type="submit" class="btn btn-primary">Login</button>
                                    </div>


                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.min.js" integrity="sha384-RuyvpeZCxMJCqVUGFI0Do1mQrods/hhxYlcVfGPOfQtPJh0JCw12tUAZ/Mv10S7D" crossorigin="anonymous"></script>
</body>

</html>