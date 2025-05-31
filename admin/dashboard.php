<?php
// Memulai sesi PHP. Ini penting untuk menyimpan dan mengakses variabel sesi, seperti informasi login pengguna.
session_start();
// Mengaktifkan output buffering. Ini menahan semua output dari skrip sampai buffer dibersihkan atau dialirkan, yang berguna untuk mengarahkan header sebelum konten HTML dikirim.
ob_start();

// Mengambil nilai 'name' dari sesi. Jika 'name' tidak ada di sesi, maka akan diinisialisasi dengan string kosong.
$_name = isset($_SESSION['name']) ? $_SESSION['name'] : '';

// Memeriksa apakah variabel $_name kosong (berarti pengguna belum login atau sesi 'name' tidak terdaftar).
if (!$_name) {
    // Jika $_name kosong, pengguna akan diarahkan kembali ke halaman 'index.php' dengan parameter 'access=failed'.
    header("location:index.php?access=failed");
}
// Menginclude file 'koneksi.php' yang kemungkinan berisi kode untuk membuat koneksi ke database.
include 'config/koneksi.php';
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
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.9.0/dist/summernote-lite.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.9.0/dist/summernote-lite.min.js"></script>

    <link rel="stylesheet" href="https://cdn.datatables.net/2.3.1/css/dataTables.dataTables.css" />
    <script src="https://cdn.datatables.net/2.3.1/js/dataTables.js"></script>
</head>

<body>

    <div class="wrapper">
        <?php include 'inc/header.php'; ?>
        <div class="content mt-5">
            <div class="container">
                <div class="row justify-content-center">

                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-header">
                                <?php echo isset($_GET['page']) ? str_replace("-", " ",  ucfirst($_GET['page'])) : 'Home' //untuk menambahkan nama disetiap halaman
                                ?>
                            </div>
                            <div class="card-body">
                                <?php
                                // Memeriksa apakah parameter 'page' ada di URL.
                                if (isset($_GET['page'])) {
                                    // Memeriksa apakah file PHP dengan nama yang sesuai dengan parameter 'page'
                                    // ada di dalam folder 'content'.
                                    if (file_exists("content/" . $_GET['page'] . ".php")) {
                                        // Jika file ada, include file tersebut. Ini berfungsi untuk memuat konten dinamis
                                        // berdasarkan halaman yang diminta.
                                        include('content/' . $_GET['page'] . ".php");
                                    } else {
                                        // Jika file tidak ditemukan, include halaman 'notfound.php'.
                                        include "content/notfound.php";
                                    }
                                } else {
                                    // Jika parameter 'page' tidak ada di URL, secara default include halaman 'home.php'.
                                    include 'content/home.php';
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        // Menginisialisasi editor teks Summernote pada elemen dengan ID 'summernote'.
        $('#summernote').summernote({
            placeholder: 'Hello stand alone ui', // Teks placeholder untuk editor.
            tabsize: 2, // Ukuran tab.
            height: 120, // Tinggi editor.
            toolbar: [ // Konfigurasi toolbar Summernote.
                ['style', ['style']],
                ['font', ['bold', 'underline', 'clear']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['table', ['table']],
                ['insert', ['link', 'picture', 'video']],
                ['view', ['fullscreen', 'codeview', 'help']]
            ]
        });

        // Menginisialisasi plugin DataTables pada elemen dengan ID 'table',
        // yang akan mengubah tabel HTML menjadi tabel interaktif dengan fitur pencarian, sorting, dan paginasi.
        $('#table').DataTable();
    </script>


</body>

</html>