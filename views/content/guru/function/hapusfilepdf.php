<?php
require '../../../../database/db.php';
$id_materi = $_GET['id_materi'];
$mapel = $_GET['id_mapel'];
$file_lama = $_GET['nama_file'];

$query = mysqli_query($koneksi, "UPDATE materi SET nama_file= NULL WHERE id_materi='$id_materi'");
if ($query) {
    $file_path = '../../../../upload_files/' . $file_lama;
    @unlink($file_path);
    echo "<script>
        alert('File berhasil terhapus');
        window.location='../../../index.php?page=editmateri&id_mapel=$mapel&id_materi=$id_materi';
    </script>";
}
