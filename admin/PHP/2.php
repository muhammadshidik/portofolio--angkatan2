<?php
//array
//array index (datanya bisa lebih dari 1)

//$nama = array();
//$nama = [];


$nama = array("reza", 'ibrahim', "joko");
// urutan index 0        1         2

echo $nama[0];
echo "<br>";
echo $nama[1];
echo "<br>";
echo $nama[2];

// menggunakan looping
$buah = ["semangka", "nanas", "apel", "jeruk"];
print_r($buah);
foreach ($buah as $b) {
    echo "nama nama buah " . $b . '<br>';
}


//array asosiatif : key nya menggunakan string 
$kelas_web = [
    "nama" => "budi",
    "umur" => 25,
    "jurusan" => 'junior'
];

echo "nama Siswa" . $kelas_web["nama"] . "umur" . $kelas_web["umur"] . "Jurusan" . $kelas_web["jurusan"];

echo "<br>";

//array multidimensi

$siswa = [
    [
        "nama" => "reza",
        "umur" => 20,
        "jurusan" => "junior web prog"
    ],
    [
        "nama" => "bambang",
        "umur" => 40,
        "jurusan" => "junior web prog"
    ]
];

print_r($siswa);

echo $siswa[1]["nama"]; //bambang//cara memanggil untuk satu target / 1 index
"<br>";
echo $siswa[0]["jurusan"];
"<br>";
echo $siswa[0]["umur"];
"<br>";

//[0] // 

//foreach ($siswa as $sw) altenatif lain
foreach ($siswa as $key => $sw) { //$sw itu alias. artinya untuk merujuk kata ganti $siswa
    echo "nama :" . $sw["nama"] . "<br>";
    echo "umur :" . $sw["umur"] . "<br>";
    echo "jurusan :" . $sw["jurusan"] . "<br>";
}
