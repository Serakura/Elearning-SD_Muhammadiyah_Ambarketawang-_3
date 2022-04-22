<?php
require '../../../../database/db.php';
$nip = $_GET['nip'];
$hapus = mysqli_query($koneksi, "DELETE FROM guru WHERE nip='$nip'");
if ($hapus) {
?>
    <script>
        alert('Data Berhasil di Hapus');
        document.location = '../../../?page=guru';
    </script>
<?php
}

?>