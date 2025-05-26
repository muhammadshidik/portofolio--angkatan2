<?php

$hostname = "localhost";
$hostusername = "root";
$hostpassword = "";
$hostdatabase = "db_porto_3";
$config = mysqli_connect($hostname, $hostusername, $hostpassword, $hostdatabase);
if (!$config) {
    echo "Koneksi gagal";
}
