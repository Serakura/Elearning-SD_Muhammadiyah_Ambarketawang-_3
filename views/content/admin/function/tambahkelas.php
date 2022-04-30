<?php
require '../../../../database/db.php';

$nama       = $_POST['nama'];

$cek_kelas = mysqli_query($koneksi, "SELECT * FROM kelas WHERE nama_kelas='$nama'");

if (mysqli_num_rows($cek_kelas) > 0) {
?>
    <script>
        window.location = '../../../index.php?page=kelas&msg=Gagal menambahkan data kelas karena sudah digunakan';
    </script>

<?php
} else {

    $query = mysqli_query($koneksi, "INSERT INTO kelas 
						(nama_kelas)
 						VALUES 
 						('$nama')");


    echo "<script>
    window.location='../../../index.php?page=kelas&msg=Berhasil menambahkan data kelas';
 	</script>";
}

?>