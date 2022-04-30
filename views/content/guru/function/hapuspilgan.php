<?php
require '../../../../database/db.php';

$mapel = $_GET['id_mapel'];
$tugas = $_GET['id_tugas'];
$pilgan = $_GET['id_pilgan'];


$query = mysqli_query($koneksi, "DELETE FROM pilihan_ganda WHERE id_pilgan=$pilgan");

if ($query) {
    echo "<script>
    window.location='../../../index.php?page=buatsoal&id_mapel=$mapel&id_tugas=$tugas&msg=Berhasil menghapus soal pilihan ganda';
</script>";
} else {
    echo "<script>
    window.location='../../../index.php?page=buatsoal&id_mapel=$mapel&id_tugas=$tugas&msg=Gagal menghapus soal pilihan ganda';
</script>";
}
