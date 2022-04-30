<?php
$fil_dir = '../../../../upload_files/';
require '../../../../database/db.php';
$id_materi = $_GET['id_materi'];
$mapel = $_POST['id_mapel'];
$judul = $_POST['judul'];
$deskripsi = $_POST['deskripsi'];
$materi = $_POST['isimateri'];
$namafile = $_FILES['filemateri']['name'];
$tmpfile = $_FILES['filemateri']['tmp_name'];
$error        = $_FILES['filemateri']['error'];
$filelama = $_POST['file_lama'];



if ($namafile == null) {
    $query = mysqli_query($koneksi, "UPDATE materi SET judul_materi='$judul', deskripsi='$deskripsi', isi_materi='$materi' WHERE id_materi='$id_materi'");
    echo "<script>
        window.location='../../../index.php?page=mapel&id_mapel=$mapel&msg=Berhasil mengupdate materi';
    </script>";
} else {
    $ekstensifile     = explode('.', $namafile);
    $ekstensifile    = strtolower(end($ekstensifile));
    if ($ekstensifile != 'pdf') {
        echo "<script>
            window.location='../../../index.php?page=editmateri&id_mapel=$mapel&id_materi=$id_materi&msg=Gagal karena file bukan .pdf';
        </script>";
    } else {
        $namaFileBaru  = uniqid() . '_' . $namafile;
        $pidah_folder = move_uploaded_file($tmpfile, $fil_dir . $namaFileBaru);

        if ($pidah_folder) {
            $query = mysqli_query($koneksi, "UPDATE materi SET judul_materi='$judul', deskripsi='$deskripsi', isi_materi='$materi', nama_file='$namaFileBaru' WHERE id_materi='$id_materi'");
            $file_path = '../../../../upload_files/' . $filelama;
            @unlink($file_path);
            echo "<script>
            window.location='../../../index.php?page=mapel&id_mapel=$mapel&msg=Berhasil mengupdate materi';
        </script>";
        } else {
            echo "<script>
            window.location='../../../index.php?page=buatmateri&id_mapel=$mapel&msg=Gagal mengupdate materi';
        </script>";
        }
    }
}
