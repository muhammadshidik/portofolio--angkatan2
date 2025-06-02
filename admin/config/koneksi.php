<?php
// Mendefinisikan variabel untuk hostname database. Umumnya 'localhost' jika database berada di server yang sama.
$hostname = "localhost";
// Mendefinisikan variabel untuk username database. 'root' adalah username default untuk MySQL tanpa password.
$hostusername = "root";
// Mendefinisikan variabel untuk password database. Di sini dikosongkan, yang berarti tidak ada password.
$hostpassword = "";
// Mendefinisikan variabel untuk nama database yang akan dihubungkan.
$hostdatabase = "db_porto_4";

// Mencoba membuat koneksi ke database MySQL menggunakan fungsi mysqli_connect().
// Parameter yang diberikan adalah hostname, username, password, dan nama database.
$config = mysqli_connect($hostname, $hostusername, $hostpassword, $hostdatabase);

// Memeriksa apakah koneksi ke database gagal.
// Jika variabel $config bernilai false (koneksi gagal), maka blok kode di dalamnya akan dieksekusi.
if (!$config) {
    // Menampilkan pesan "Koneksi gagal" jika koneksi ke database tidak berhasil.
    echo "Koneksi gagal";
}
