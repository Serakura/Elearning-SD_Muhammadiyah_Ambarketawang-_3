<?php
require '../../../../database/db.php';
$id_kelas = $_GET['id_kelas'];
$hapus = mysqli_query($koneksi, "DELETE FROM kelas WHERE id_kelas='$id_kelas'");
if ($hapus) {
?>
    <script>
        document.location = '../../../?page=kelas&msg=Berhasil menghapus data kelas';
    </script>
<?php
}

?>