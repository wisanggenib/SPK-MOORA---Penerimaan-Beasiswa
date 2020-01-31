<?php 

$koneksi = new mysqli("localhost","root","","db_moora");
$content ='
<style type="text/css">
.tabel{ border-collapse:collapse;}
.tabel th { padding: 10px 10px; background-color:#ff8320; color:#fff;}
</style>
';

$content .='

<page>
    

	   <h1 align="center">Perpustakaan SMK Negeri 3 Klaten</h1>
       <p align="center">Alamat : Jl. Panunggalan No 17V Pati Jawa Tengah</p>
       <hr>
    
		<div style="padding:10px 0 10px 0; font-size:15px;">Laporan Data Kembali</div>

		<table border="1px" class="tabel">
	<tr>
       	<th>No.</th>
        <th>Nama</th>
        <th>Alamat</th>
        <th>Nilai</th>
    </tr>';

$no=1;
$sql = $koneksi ->query("select * from tabel_hasil JOIN tabel_siswa ON tabel_hasil.id_siswa = tabel_siswa.id_siswa ORDER BY tabel_hasil.nilai");
while ($data = $sql->fetch_assoc()) {
    $content .='
    <tr>
        <td align="center">'.  $no++.'</td>    
        <td align="center">'. $data['nama'].'</td>
        <td align="center">'. $data['alamat'].'</td>
        <td align="center"> '.$data['nilai'].'</td>        
    </tr>
    ';
}
           
 $content .='

	</table>
</page>
    ';

    require __DIR__.'/vendor/autoload.php';

    use Spipu\Html2Pdf\Html2Pdf;
    
    $html2pdf = new Html2Pdf();
    $html2pdf->writeHTML($content);
    $html2pdf->output();

?>
