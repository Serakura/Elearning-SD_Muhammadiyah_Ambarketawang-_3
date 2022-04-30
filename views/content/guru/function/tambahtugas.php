<?php
require '../../../../database/db.php';
date_default_timezone_set('Asia/Jakarta');
$mapel = $_POST['id_mapel'];
$judul = $_POST['judul'];
$deskripsi = $_POST['deskripsi'];
$tanggal_mulai = $_POST['tanggal_mulai'];
$tanggal_selesai = $_POST['tanggal_selesai'];
$waktu_mulai = $_POST['waktu_mulai'];
$waktu_selesai = $_POST['waktu_selesai'];
$date = date('Y-m-d h:i:s');

$tgl_mulai = $tanggal_mulai . " " . $waktu_mulai;
$tgl_selesai = $tanggal_selesai . " " . $waktu_selesai;

$query = mysqli_query($koneksi, "INSERT INTO tugas 
						(judul_tugas,deskripsi,tgl_upload,tgl_mulai,tgl_selesai,id_mapel)
 						VALUES 
 						('$judul','$deskripsi','$date','$tgl_mulai','$tgl_selesai','$mapel')");

if ($query) {
    echo "<script>
    window.location='../../../index.php?page=mapel&id_mapel=$mapel&msg=Berhasil membuat tugas';
</script>";
} else {
    echo "<script>
    window.location='../../../index.php?page=mapel&id_mapel=$mapel&msg=Gagal membuat tugas';
</script>";
}
