<?php
// mengambil data koneksi
include '../../lib/koneksi.php';
// mengambil data dari form sebelumnya
$nama = $_POST['nama'];
$jenis_kelamin = $_POST['jenis_kelamin'];
$alamat = $_POST['alamat'];
$KPS = $_POST['KPS'];
$PKH = $_POST['PKH'];
$status = $_POST['status'];
$ekonomi = $_POST['ekonomi'];
$penghasilan = $_POST['penghasilan'];



if ($KPS == 'ya') {
	$nKPS = 1;
}else{
	$nKPS = 0;
}
if ($PKH == 'ya') {
	$nPKH = 1;
}else{
	$nPKH = 0;
}
if ($status == 'ya') {
	$nStatus = 1;
}else{
	$nStatus = 0;
}
if ($ekonomi == 'fisik') {
	$nEkonomi = 25;
}else if ($ekonomi == 'phk'){
	$nEkonomi = 25;
}else{
	$nEkonomi = 25;
}
if (!empty($penghasilan)) {
	echo $penghasilan;
}else{
	echo "No";
}

// sql
$sql = "INSERT INTO tabel_siswa (nama, jenis_kelamin, alamat,KPS,PKH,status,penghasilan,ekonomi)
VALUES ('$nama', '$jenis_kelamin', '$alamat','$KPS','$PKH','$status','$penghasilan','$ekonomi')";

if ($koneksi->query($sql) === TRUE) {
	//mengambil id siswa terkahir yang baru saja dimasukan
	$sqlIdakhir = "SELECT id_siswa FROM tabel_siswa ORDER BY id_siswa DESC limit 1";
          $resultIdakhir = mysqli_query($koneksi, $sqlIdakhir);
              $hasil = mysqli_fetch_assoc($resultIdakhir);
              	$id_siswa = $hasil['id_siswa'];
              	
              	//insert data to table nilai.
              	$sKPS = "INSERT INTO tabel_nilai (id_kriteria, id_siswa, nilai)
						VALUES ('1', '$id_siswa', '$nKPS')";
				$koneksi->query($sKPS);

				$sKPH = "INSERT INTO tabel_nilai (id_kriteria, id_siswa, nilai)
						VALUES ('2', '$id_siswa', '$nPKH')";
				$koneksi->query($sKPH);

				$sStatus = "INSERT INTO tabel_nilai (id_kriteria, id_siswa, nilai)
						VALUES ('3', '$id_siswa', '$nStatus')";
				$koneksi->query($sStatus);

				$sPenghasilan = "INSERT INTO tabel_nilai (id_kriteria, id_siswa, nilai)
						VALUES ('4', '$id_siswa', '$penghasilan')";
				$koneksi->query($sPenghasilan);

				$sEkonomi = "INSERT INTO tabel_nilai (id_kriteria, id_siswa, nilai)
						VALUES ('5', '$id_siswa', '$nEkonomi')";
				$koneksi->query($sEkonomi);

				echo "<script>alert('Input berhasil');window.location = '../../index.php?module=list_siswa';</script>";
}

// eksekusi sql

// if ($koneksi->query($sql) === TRUE) {
//     echo "<script>alert('Input berhasil');window.location = '../../index.php?module=list_kriteria';</script>";
// } else {
//     echo "Error: " . $sql . "<br>" . $koneksi->error;
// }

?>