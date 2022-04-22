<?php
require '../../../../database/db.php';

$nama       = $_POST['nama'];
$nip        = $_POST['nip'];
$password   = $_POST['password'];
$jenkel     = $_POST['jeniskelamin'];
$alamat     = $_POST['alamat'];
$telp       = $_POST['telepon'];
$email      = $_POST['email'];



$cek_nip = mysqli_query($koneksi, "SELECT * FROM guru WHERE nip='$nip'");

if (mysqli_num_rows($cek_nip) > 0) {
?>
    <script>
        alert('Nomor NIP Sudah digunakan!! || Silahkan Input Ulang!');
        window.location = '../../../index.php?page=guru';
    </script>

<?php
} else {

    $query = mysqli_query($koneksi, "INSERT INTO guru 
						(nama,nip,password,jenis_kelamin,alamat,telp,email)
 						VALUES 
 						('$nama','$nip','$password','$jenkel','$alamat','$telp','$email')");


    echo "<script>
 		alert('Data Berhasil diTambahkan');
 		window.location='../../../index.php?page=guru';

 	</script>";
}

?>