<?php
require '../../../../database/db.php';

$nama       = $_POST['nama'];

$cek_kelas = mysqli_query($koneksi, "SELECT * FROM kelas WHERE nama_kelas='$nama'");

if (mysqli_num_rows($cek_kelas) > 0) {
?>
    <script>
        alert('Nama Kelas Sudah digunakan!! || Silahkan Input Ulang!');
        window.location = '../../../index.php?page=kelas';
    </script>

<?php
} else {

    $query = mysqli_query($koneksi, "INSERT INTO kelas 
						(nama_kelas)
 						VALUES 
 						('$nama')");


    echo "<script>
 		alert('Data Berhasil diTambahkan');
 		window.location='../../../index.php?page=kelas';

 	</script>";
}

?>