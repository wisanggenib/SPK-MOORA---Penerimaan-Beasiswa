<h3><i class="fa fa-angle-right"></i> List Hasil</h3>
        <div class="row mb">
          <!-- page start-->
          <div class="content-panel">
            <div class="adv-table" style="padding: 15px;">
              <table cellpadding="0" cellspacing="0" border="0" class="display table table-bordered" id="myDataTables">
                <thead>
                  <tr>
                    <th>Nama</th>
                    <th>Nilai</th>
                    <th>Status</th>
                    <?php
                        if($_SESSION['namauser']=='kepsek'){
                    ?>
                    <th>Hapus</th>
                    <?php
                        }
                    ?>
                  </tr>
                </thead>
                <tbody>
          <?php
          $sql = "SELECT * FROM tabel_hasil WHERE tanggal = '$_GET[tanggal]'";
          $result = mysqli_query($koneksi, $sql);
         
              while ($row = mysqli_fetch_assoc($result)) {
                  
          ?>
                  <tr class="gradeX">
                    <td><?=$row['nama']?></td>
                    <td><?php echo number_format($row['nilai'],2)?></td>
                    <td><?=$row['status']?></td>
                    <?php
                        if($_SESSION['namauser']=='kepsek'){
                    ?>
                    <td><a href="index.php?module=hapus_hasil_siswa&&nama=<?=$row['nama']?>&&tanggal=<?=$row['tanggal']?>"><button type="button" class="btn btn-danger">Hapus</button></a></td></td>
                    <?php
                        }
                    ?>
                  </tr>
          <?php
                
              }
          ?>
                </tbody>
              </table>
            </div>
          </div>
          <!-- page end-->
        </div>
        <!-- /row -->