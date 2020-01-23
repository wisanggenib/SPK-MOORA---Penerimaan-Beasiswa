<?php
include '../../lib/koneksi.php';
$id_kriteria = $_GET['id_kriteria'];
$kriteria = $_POST['kriteria'];
$type = $_POST['type'];
$bobot = $_POST['bobot'];
$sql = "UPDATE tabel_kriteria SET kriteria='$kriteria',type='$type',bobot='$bobot' WHERE id_kriteria=$id_kriteria";

if ($koneksi->query($sql) === TRUE) {
    echo "<script>alert('UPDATE berhasil');window.location = '../../index.php?module=list_kriteria';</script>";
} else {
    echo "Error: " . $sql . "<br>" . $koneksi->error;
}
?>