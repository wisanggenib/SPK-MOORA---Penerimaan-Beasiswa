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
$id_siswa = $_GET['id_siswa'];


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
	$nEkonomi = 50;
}
if (!empty($penghasilan)) {
	echo $penghasilan;
}else{
	echo "No";
}

 // echo $nKPS."<br>";
 // echo $nPKH."<br>";
 // echo $nStatus."<br>";
 // echo $nEkonomi."<br>";
 // echo $penghasilan."<br>";


	//mengambil id siswa terkahir yang baru saja dimasukan
              	
              	// insert data to table nilai.
              	$sKPS ="UPDATE tabel_nilai SET nilai = '$nKPS' WHERE id_kriteria='1' AND id_siswa = '$id_siswa'; ";
				$koneksi->query($sKPS);

				$sPKH ="UPDATE tabel_nilai SET nilai = '$nPKH' WHERE id_kriteria='2' AND id_siswa = '$id_siswa'; ";
				$koneksi->query($sPKH);

				$sStatus ="UPDATE tabel_nilai SET nilai = '$nStatus' WHERE id_kriteria='3' AND id_siswa = '$id_siswa'; ";
				$koneksi->query($sStatus);

				$sPenghasilan ="UPDATE tabel_nilai
                        SET nilai = '$penghasilan'
                        WHERE id_kriteria='4' AND id_siswa = '$id_siswa'; ";
				$koneksi->query($sPenghasilan);

				$sEkonomi ="UPDATE tabel_nilai
                        SET nilai = '$nEkonomi'
                        WHERE id_kriteria='5' AND id_siswa = '$id_siswa'; ";
                $koneksi->query($sEkonomi);
                
                $sqlSiswa = "UPDATE tabel_siswa SET nama= '$nama', jenis_kelamin='$jenis_kelamin',alamat='$alamat',kps='$KPS',pkh='$PKH',
                            status='$status',penghasilan='$penghasilan',ekonomi='$ekonomi' WHERE id_siswa = '$id_siswa' ";
                $koneksi->query($sqlSiswa);

				echo "<script>alert('Input berhasil');window.location = '../../index.php?module=list_siswa';</script>";


// eksekusi sql

// if ($koneksi->query($sql) === TRUE) {
//     echo "<script>alert('Input berhasil');window.location = '../../index.php?module=list_kriteria';</script>";
// } else {
//     echo "Error: " . $sql . "<br>" . $koneksi->error;
// }

?>