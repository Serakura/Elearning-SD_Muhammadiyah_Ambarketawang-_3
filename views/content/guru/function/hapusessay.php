<?php
require '../../../../database/db.php';

$mapel = $_GET['id_mapel'];
$tugas = $_GET['id_tugas'];
$essay = $_GET['id_essay'];


$query = mysqli_query($koneksi, "DELETE FROM essay WHERE id_essay=$essay");

if ($query) {
    echo "<script>
    alert('Soal berhasil terhapus');
    window.location='../../../index.php?page=buatsoal&id_mapel=$mapel&id_tugas=$tugas';
</script>";
} else {
    echo "<script>
    alert('Soal gagal terhapus');
    window.location='../../../index.php?page=buatsoal&id_mapel=$mapel&id_tugas=$tugas';
</script>";
}
