<?php
require '../../../../database/db.php';

$kode       = $_POST['kode'];
$nama        = $_POST['nama'];
$kelas      = $_POST['kelas'];
$guru      = $_POST['guru'];


$query = mysqli_query($koneksi, "UPDATE mata_pelajaran SET nama_mapel='$nama', id_kelas='$kelas', id_guru='$guru' WHERE kd_mapel='$kode'");


if ($query) {
    echo "<script>
    alert('Data Berhasil diEdit');
    window.location='../../../index.php?page=mapel&msg=Berhasil mengupdate data mata pelajaran';</script>";
} else {
    return false;
}
