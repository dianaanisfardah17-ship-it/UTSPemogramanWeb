<?php
include 'koneksi.php';

$data = mysqli_query($conn, "SELECT * FROM mahasiswa");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Data Mahasiswa</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<h2>Data Mahasiswa</h2>

<a href="form.php">Tambah Data Mahasiswa</a>

<br><br>

<table>
    <tr>
        <th>No</th>
        <th>Foto</th>
        <th>NIM</th>
        <th>Nama</th>
        <th>Jurusan</th>
        <th>Aksi</th>
    </tr>

    <?php $no=1; ?>
    <?php while($row = mysqli_fetch_assoc($data)) : ?>
    <tr>
        <td><?= $no++; ?></td>

        <td>
            <img src="uploads/<?= $row['foto']; ?>">
        </td>

        <td><?= $row['nim']; ?></td>
        <td><?= $row['nama_lengkap']; ?></td>
        <td><?= $row['jurusan']; ?></td>

        <td>
            <a href="form.php?id=<?= $row['id']; ?>">Edit</a>

            <a class="hapus"
               href="hapus.php?id=<?= $row['id']; ?>"
               onclick="return confirm('Yakin Hapus Data?')">
               Hapus
            </a>
        </td>
    </tr>
    <?php endwhile; ?>

</table>

</body>
</html>
