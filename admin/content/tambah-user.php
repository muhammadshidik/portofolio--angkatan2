<?php
// Ini semacam penjaga pintu khusus. Dia akan memeriksa siapa yang mau masuk ke halaman ini.
// Anggap saja situs web ini punya beberapa ruangan, dan ini adalah pintu masuk ke 'ruangan khusus'.

// Si penjaga pintu bertanya: "Kamu punya kartu akses level berapa?
// Kartu kamu bukan level 1, ya?"
// '$_SESSION['level']' itu kayak nomor level yang tercatat di kartu aksesmu saat kamu login.
// '!= 1' artinya "tidak sama dengan 1". Jadi, kalau nomor levelmu bukan 1, berarti kamu nggak punya akses istimewa.
if ($_SESSION['level'] != 1) {
    // Kalau jawaban dari pertanyaan tadi "iya, kartu saya bukan level 1",
    // maka si penjaga pintu langsung bilang dengan nada tegas:
    // echo "<h1> Anda tidak berhak kesini !! </h1>";

    // Setelah itu, penjaga pintu menambahkan: "Nih, balik aja ke halaman awal (dashboard) kamu."
    // Ini kayak ngasih tombol "Kembali" yang bisa kamu klik buat balik ke tempat yang boleh kamu akses.
    // echo "<a href='dashboard.php' class='btn btn-warning'>Kembali<a/>";

    // Terakhir, si penjaga pintu bilang: "Udah, cukup sampai sini aja.
    // Kamu nggak boleh lihat apa-apa lagi di halaman ini."
    // Perintah ini fungsinya buat langsung menghentikan semua proses di halaman itu,
    // jadi kamu nggak bakal bisa ngintip atau ngelanjutin ke bagian halaman yang seharusnya rahasia.

    // atau
    header("location:dashboard.php?failed=access");
    die;
}

// jika user/pengguna mencet tombol simpan
// ambil data dari inputan, email, nama dan password
// masukkan ke dalam table user (name, email, password) nilainya dari masing-masing inputan 
if (isset($_POST['simpan'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $id_level = $_POST['id_level'];
    $password = sha1($_POST['password']);

    $query = mysqli_query($config, "INSERT INTO users (name, email, password)
     VALUES ('$name','$email','$password','$id_level')");
    if ($query) {
        header("location:?page=tambah-user&tambah=berhasil");
        exit;
    }
}

$header = isset($_GET['edit']) ? "Edit" : "Tambah";
$id_user = isset($_GET['edit']) ? $_GET['edit'] : '';
$queryEdit = mysqli_query($config, "SELECT * FROM users WHERE id='$id_user'");
$rowEdit  = mysqli_fetch_assoc($queryEdit);

if (isset($_POST['edit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $id_level = $_POST['id_level'];
    $password = sha1($_POST['password']);

    if ($password == '') {
        $queryUpdate = mysqli_query($config, "UPDATE users SET id_level='$id_level', name='$name', email='$email' WHERE id='$id_user'");
    }
    $queryUpdate = mysqli_query($config, "UPDATE users SET id_level='$id_level', name='$name', email='$email', 
    password='$password' WHERE id='$id_user'");
    if ($queryUpdate) {
        header("page=user&ubah=berhasil");
    }
}

$queryLevels = mysqli_query($config, "SELECT * FROM level ORDER BY id DESC");
$rowLevels = mysqli_fetch_all($queryLevels, MYSQLI_ASSOC);
?>

<form action="" method="post">
    <div class="mb-3 row">
        <div class="col-sm-2">
            <label for="">Nama Level * </label>
        </div>
        <div class="col-sm-10">

            <select name="id_level" id="form-control">
                <option value="">Pilih Level</option>
                <!-- data option ini diambil dari tabel level -->
                <?php foreach ($rowLevels as $level): ?>
                    <option value="<?php echo isset($_GET['edit']) ? ($level['id'] == $rowEdit['id_level']) ? 'selected' : '' : '' ?>"></option>
                    <?php echo $level['id'] ?>"><?php echo $level['name_level'] ?>
                <?php endforeach ?>
                <!-- end option -->

            </select>
        </div>
    </div>
    <div class="mb-3 row">
        <div class="col-sm-2">
            <label for="">Nama * </label>
        </div>
        <div class="col-sm-10">
            <input required name="name" type="text"
                class="form-control"
                placeholder="Masukkan nama anda"
                value="<?= isset($_GET['edit']) ? $rowEdit['name'] : '' ?>">
        </div>
    </div>
    <div class="mb-3 row">
        <div class="col-sm-2">
            <label for="">Email * </label>
        </div>
        <div class="col-sm-10">
            <input required name="email" type="email"
                class="form-control"
                placeholder="Masukkan email anda"
                value="<?= isset($_GET['edit']) ? $rowEdit['email'] : '' ?>">
        </div>
    </div>
    <div class="mb-3 row">
        <div class="col-sm-2">
            <label for="">Password *</label>
        </div>
        <div class="col-sm-10">
            <input name="password" type="password"
                class="form-control" value=""
                placeholder="Masukkan password anda">
        </div>
    </div>
    <div class="mb-3 row">
        <div class="col-sm-12">
            <button name="<?= isset($_GET['edit']) ? 'edit' : 'simpan'; ?>" type="submit"
                class="btn btn-primary">Simpan</button>
        </div>
    </div>
</form>