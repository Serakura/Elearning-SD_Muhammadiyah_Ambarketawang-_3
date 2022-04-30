<?php
require '../../../../database/db.php';
$nis = $_GET['nis'];
$hapus = mysqli_query($koneksi, "DELETE FROM siswa WHERE nis='$nis'");
if ($hapus) {
?>
    <script>
        document.location = '../../../?page=siswa&msg=Berhasil menghapus data siswa';
    </script>
<?php
}

?>