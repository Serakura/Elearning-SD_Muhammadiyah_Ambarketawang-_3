<?php
require '../../../../database/db.php';
$materi = $_GET['id_materi'];
$mapel = $_GET['id_mapel'];

$query = mysqli_query($koneksi, "SELECT nama_file FROM materi WHERE id_materi=$materi");
while ($rw = mysqli_fetch_row($query)) {
    $file_lama = $rw[0];
    $file_path = '../../../../upload_files/' . $file_lama;
    @unlink($file_path);
    $delete = mysqli_query($koneksi, "DELETE FROM materi WHERE id_materi=$materi");
    if ($delete) {
        echo "<script>
    window.location='../../../index.php?page=mapel&id_mapel=$mapel&msg=Berhasil menghapus materi';
</script>";
    }
}
