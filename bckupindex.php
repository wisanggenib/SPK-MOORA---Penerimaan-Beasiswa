<?php
//-- konfigurasi database
$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = '';
$dbname = 'db_dss';
//-- koneksi ke database server dengan extension mysqli
$db = new mysqli($dbhost,$dbuser,$dbpass,$dbname);
//-- hentikan program dan tampilkan pesan kesalahan jika koneksi gagal
if ($db->connect_error) {
   die('Connect Error ('.$db->connect_errno.')'.$db->connect_error);
}

$sql = 'SELECT * FROM moo_kriteria';
$result = $db->query($sql);
//-- menyiapkan variable penampung berupa array
$kriteria=array();
//-- melakukan iterasi pengisian array untuk tiap record data yang didapat
foreach ($result as $row) {
   $kriteria[$row['id_kriteria']]=array($row['kriteria'],$row['type'],$row['bobot']);
}

$sql = 'SELECT * FROM moo_alternatif';
$result = $db->query($sql);
//-- menyiapkan variable penampung berupa array
$alternatif=array();
//-- melakukan iterasi pengisian array untuk tiap record data yang didapat
foreach ($result as $row) {
   $alternatif[$row['id_alternatif']]=array($row['alternatif'],
                                               $row['bahan'],
                                    $row['harga'],
                                    $row['pengatur'],
                                    $row['ukuran'],
                                    $row['garansi']);
}


$sql = 'SELECT * FROM moo_nilai ORDER BY id_alternatif,id_kriteria';
$result = $db->query($sql);
//-- menyiapkan variable penampung berupa array
$sample=array();
//-- melakukan iterasi pengisian array untuk tiap record data yang didapat
foreach ($result as $row) {
   //-- jika array $sample[$row['id_alternatif']] belum ada maka buat baru
   //-- $row['id_alternatif'] adalah id kandidat/alternatif
   if (!isset($sample[$row['id_alternatif']])) {
      $sample[$row['id_alternatif']] = array();
   }
   $sample[$row['id_alternatif']][$row['id_kriteria']] = $row['nilai'];
}

print_r($sample);
echo "<br>";

print_r($kriteria);



?>

<!-- proses normalisasi -->

 <?php
//-- inisialisasi nilai normalisasi dengan nilai dari $sample
$normal=$sample;
foreach($kriteria as $id_kriteria=>$k){
   //-- inisialisasi nilai pembagi tiap kriteria
   $pembagi=0;
   foreach($alternatif as $id_alternatif=>$a){
      $pembagi+=pow($sample[$id_alternatif][$id_kriteria],2);
   }
   foreach($alternatif as $id_alternatif=>$a){
      $normal[$id_alternatif][$id_kriteria]/=sqrt($pembagi);
   }
}
?> 

<!-- tampilkan normalisasi -->

<?php 
echo "<br>";
foreach ($kriteria as $id_kriteria => $k) {
	echo $id_kriteria."<br>";
	foreach ($alternatif as $id_alternatif => $a) {
		echo $normal[$id_alternatif][$id_kriteria].'<br>';
	}
}

?>

<!-- optimasi -->

 <?php
//-- menyiapkan variabel untuk menyimpan data yang sudah dioptimasi
$optimasi=array();
foreach($alternatif as $id_alternatif=>$a){
   $optimasi[$id_alternatif]=0;
   foreach($kriteria as $id_kriteria=>$k){
      $optimasi[$id_alternatif]+=$normal[$id_alternatif][$id_kriteria]*($k[1]=='benefit'?1:-1)*$k[2];
      echo $id_kriteria."<br>";
      print_r($optimasi[$id_alternatif]+=$normal[$id_alternatif][$id_kriteria]*($k[1]=='benefit'?1:-1)*$k[2]);
      echo "<br>";
   }
}
?> 

<!-- lihat optimasi -->

<?php 
echo "<br>LIHAT OPTIMASI<br>";
print_r($optimasi);
echo "<br>Check itung optimasi<br>";

// $ok2 = (($normal[2][1] * 2.2)+(0.48 * 2.1)+(0.55 * 2.1))-((0.35 * 1.8)+(0.33 * 1.8));

foreach ($kriteria as $id_kriteria => $k){
	echo $normal[1][$id_kriteria]."<br>";
}
print_r($kriteria);
echo "<br> asu";
$kriteria[3][2];
echo "<br>";

$ok = ((0.5 * 2.2)+(0.35 * 2.1)+(0.48 * 2.1))-((0.32 * 1.8)+(0.54 * 1.8));
echo $ok;
?>

 <?php
//--mengurutkan data secara descending dengan tetap mempertahankan key/index array-nya
arsort($optimasi);
//-- mendapatkan key/index item array yang pertama
$index=key($optimasi);
//-- menampilkan hasil akhir:
echo "<br>Hasilnya adalah alternatif <b>{$alternatif[$index][0]}</b> ";
echo "dengan nilai optimasi <b>{$optimasi[$index]}</b> yang terpilih";
?> 

