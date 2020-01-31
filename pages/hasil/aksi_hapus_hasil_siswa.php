<?php

$sql = "DELETE FROM tabel_hasil WHERE nama='$_GET[nama]'";
if ($koneksi->query($sql) === TRUE) {
    echo "<script>alert('HAPUS berhasil');window.location = 'index.php?module=list_detail_siswa&&tanggal=$_GET[tanggal]';</script>";
} else {
    echo "Error: " . $sql . "<br>" . $koneksi->error;
}
?>