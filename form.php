<?php
include 'koneksi.php';

$id = "";
$nim = "";
$nama = "";
$jurusan = "";
$foto = "";

if(isset($_GET['id'])){

    $id = $_GET['id'];

    $query = mysqli_query($conn,
        "SELECT * FROM mahasiswa WHERE id='$id'");

    $row = mysqli_fetch_assoc($query);

    $nim = $row['nim'];
    $nama = $row['nama_lengkap'];
    $jurusan = $row['jurusan'];
    $foto = $row['foto'];
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Form Mahasiswa</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<h2>
<?= isset($_GET['id']) ? 'Edit' : 'Tambah'; ?>
Data
</h2>

<form action="simpan.php" method="POST"
      enctype="multipart/form-data"
      onsubmit="return validasiForm()">

    <input type="hidden" name="id" value="<?= $id; ?>">
    <input type="hidden" name="foto_lama" value="<?= $foto; ?>">

    <p>NIM</p>
    <input type="text" name="nim" id="nim"
           value="<?= $nim; ?>">

    <p>Nama Lengkap</p>
    <input type="text" name="nama"
           id="nama"
           value="<?= $nama; ?>">

    <p>Jurusan</p>
    <input type="text" name="jurusan"
           id="jurusan"
           value="<?= $jurusan; ?>">

    <p>Foto</p>
    <input type="file" name="foto" id="foto">

    <br><br>

    <?php if($foto != "") : ?>
        <img src="uploads/<?= $foto; ?>">
    <?php endif; ?>

    <br><br>

    <button type="submit">Simpan</button>

</form>

<script>

function validasiForm(){

    let nim = document.getElementById('nim').value;
    let nama = document.getElementById('nama').value;
    let jurusan = document.getElementById('jurusan').value;
    let foto = document.getElementById('foto');

    if(nim == "" || nama == "" || jurusan == ""){
        alert("Semua field wajib diisi!");
        return false;
    }

    if(foto.files.length > 0){

        let file = foto.files[0];

        let ekstensi = ['image/jpeg', 'image/png'];

        if(!ekstensi.includes(file.type)){
            alert("File harus JPG atau PNG");
            return false;
        }

        if(file.size > 2 * 1024 * 1024){
            alert("Ukuran maksimal 2MB");
            return false;
        }
    }

    return true;
}

</script>

</body>
</html>
