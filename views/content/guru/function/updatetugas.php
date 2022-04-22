<?php
require '../../../../database/db.php';
$tugas = $_POST['id_tugas'];
$mapel = $_POST['id_mapel'];
$judul = $_POST['judul'];
$deskripsi = $_POST['deskripsi'];
$tanggal_mulai = $_POST['tanggal_mulai'];
$tanggal_selesai = $_POST['tanggal_selesai'];
$waktu_mulai = $_POST['waktu_mulai'];
$waktu_selesai = $_POST['waktu_selesai'];


$tgl_mulai = $tanggal_mulai . " " . $waktu_mulai;
$tgl_selesai = $tanggal_selesai . " " . $waktu_selesai;

$query = mysqli_query($koneksi, "UPDATE tugas SET judul_tugas='$judul', deskripsi='$deskripsi', tgl_mulai='$tgl_mulai', tgl_selesai='$tgl_selesai' WHERE id_tugas='$tugas'");

if ($query) {
    echo "<script>
    alert('Tugas berhasil terupdate');
    window.location='../../../index.php?page=mapel&id_mapel=$mapel';
</script>";
} else {
    echo "<script>
    alert('Tugas gagal terupdate');
    window.location='../../../index.php?page=edittugas&id_mapel=$mapel'&id_tugas=$tugas';
</script>";
}
