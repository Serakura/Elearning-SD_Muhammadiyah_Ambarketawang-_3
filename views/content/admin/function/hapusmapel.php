<?php
require '../../../../database/db.php';
$kode = $_GET['kd_mapel'];
$hapus = mysqli_query($koneksi, "DELETE FROM mata_pelajaran WHERE kd_mapel='$kode'");
if ($hapus) {
?>
    <script>
        alert('Data Berhasil di Hapus');
        document.location = '../../../?page=mapel';
    </script>
<?php
}

?>