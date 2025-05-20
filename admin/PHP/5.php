<!-- if: percabangan dan logika, untuk menjalakan 
 kode berdasarkan kondisi yang dicari -->

<?php

// operator pembanding
// = memberikan nilai
// == membandingkan
// ==membandingkan tapi dengan tipe datanya
// !: tidak
// empty :kosong
// isset : tidak kosong
// > : lebih besar, < lebih kecil >=: lebih besar sama dengan,
// <=: lebih kecil sama dengan
$nama = "bambang";
if ($nama != "bambang") {
    echo "Iya";
} else {
    echo "Bukan";
}

if (!isset($nama)) {
    echo "Yaa";
} else {
    echo "Tidak";
}
echo "<br>";
echo "<br>";

$suhu = 35;
if ($suhu > 37) {
    $status =  "Demam";
} elseif ($suhu >= 35) {
    $status =  "Normal";
} else {
    $status =  "Kedinginan";
}
echo $status;
echo "<br>";


?>

<!-- 
    Output
    Nama Peserta : Nama Kalian
    Nilai : 85
    Grade : B
    Status: Lulus

    Peserta dinyatakan lulus jika nilainya lebih dari 70 
    dan tidak lulus jika nilai kurang dari 70.
    Nilai juga dikategorikan ke dalam grade dengan huruf:
    A: 90-100
    B: 80-89
    C:70-79
    D: 60-69
    E:dibawah 60 
-->

<?php

$nama  = "Muhammad Reza Ibrahim";
$nilai = 71;
$grade = "";
$status = "";

if ($nilai > 70) {
    $status = "Lulus";
} else {
    $status = "Tidak Lulus";
}

if ($nilai >= 90) {
    $grade = "A";
} elseif ($nilai >= 80) {
    $grade = "B";
} elseif ($nilai >= 70) {
    $grade = "C";
} elseif ($nilai >= 60) {
    $grade = "D";
} else {
    $grade = "E";
}

echo "Nama Peserta :
 " . $nama . "<br> Nilai : " . $nilai . "<br> Grade : " . $grade .
    "<br> Status : " . $status;

echo "<br>";
echo "<br>";

// operator logika
// AND, &&, OR, ||, !

$username = "admin56";
$password = "admin123";

if ($username == "admin" or $password == "admin") {
    echo "Login berhasil";
} else {
    echo "Login gagal";
}
