<?php
require '../../../../database/db.php';
$nis = $_GET['nis'];
$hapus = mysqli_query($koneksi, "DELETE FROM siswa WHERE nis='$nis'");
if ($hapus) {
?>
    <script>
        alert('Data Berhasil di Hapus');
        document.location = '../../../?page=siswa';
    </script>
<?php
}

?>