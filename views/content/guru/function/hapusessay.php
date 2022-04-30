<?php
require '../../../../database/db.php';

$mapel = $_GET['id_mapel'];
$tugas = $_GET['id_tugas'];
$essay = $_GET['id_essay'];


$query = mysqli_query($koneksi, "DELETE FROM essay WHERE id_essay=$essay");

if ($query) {
    echo "<script>
    window.location='../../../index.php?page=buatsoal&id_mapel=$mapel&id_tugas=$tugas&msg=Berhasil menghapus soal essay';
</script>";
} else {
    echo "<script>
    window.location='../../../index.php?page=buatsoal&id_mapel=$mapel&id_tugas=$tugas&msg=Gagal menghapus soal essay';
</script>";
}
