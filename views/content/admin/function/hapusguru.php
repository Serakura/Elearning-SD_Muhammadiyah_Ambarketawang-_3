<?php
require '../../../../database/db.php';
$nip = $_GET['nip'];
$hapus = mysqli_query($koneksi, "DELETE FROM guru WHERE nip='$nip'");
if ($hapus) {
?>
    <script>
        document.location = '../../../?page=guru&msg=Berhasil menghapus data guru';
    </script>
<?php
}

?>