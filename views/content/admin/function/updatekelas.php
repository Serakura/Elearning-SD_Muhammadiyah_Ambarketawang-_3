<?php
require '../../../../database/db.php';

$nama       = $_POST['nama'];
$id_kelas   = $_POST['nip'];



$query = mysqli_query($koneksi, "UPDATE kelas SET nama_kelas='$nama' WHERE id_kelas='$id_kelas'");


if ($query) {
    echo "<script>
    alert('Data Berhasil diEdit');
    window.location='../../../index.php?page=kelas&msg=Berhasil mengupdate data kelas';</script>";
} else {
    return false;
}
