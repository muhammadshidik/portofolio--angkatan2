<?php
//function di php
// cara cepatnya untuk membuat tabel dihtml contoh : thead>tr>th*3
$siswa = [
    [
        "nama" => "reza",
        "umur" => 20,
        "jurusan" => "Frontend",
        "status" => 1,
    ],
    [
        "nama" => "bambang",
        "umur" => 40,
        "jurusan" => "Frontend",
        "status" => 0,
    ]
];

function ubahStatus($status)
{
    switch ($status) {
        case '1':
            return "aktif";
            break;
        default:
            return "tidak aktif";
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data User</title>
</head>

<body>
    <h1>Data Siswa</h1>
    <table border="1" width="100%">
        <thead>
            <tr>
                <th>Nama</th>
                <th>Umur</th>
                <th>Jurusan</th>
                <th>Status</th>
            </tr>
        <tbody>
            <?php foreach ($siswa as $key => $sw) { ?>
                <tr>
                    <td> <?php echo $sw["nama"] ?></td>
                    <td><?php echo $sw["umur"] ?></td>
                    <td><?php echo $sw["jurusan"] ?></td>
                    <td><?php echo $sw["status"] ?></td>
                    <td>
                        <?php echo ubahStatus($sw["status"]);
                        ?>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
        </thead>
    </table>
</body>

</html>