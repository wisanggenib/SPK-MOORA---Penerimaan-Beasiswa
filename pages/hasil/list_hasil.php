        <h3><i class="fa fa-angle-right"></i> List Hasil</h3>
        <div class="row mb">
          <!-- page start-->
          <div class="content-panel">
            <div class="adv-table" style="padding: 15px;">
              <table cellpadding="0" cellspacing="0" border="0" class="display table table-bordered" id="myDataTables">
                <thead>
                  <tr>
                    <th>Nama</th>
                    <th>Jen kel</th>
                    <th>Alamat</th>
                    <th>Nilai</th>
                    <th>Status</th>
                  </tr>
                </thead>
                <tbody>
          <?php
          $sql = "SELECT * FROM tabel_hasil join tabel_siswa WHERE tabel_hasil.id_siswa = tabel_siswa.id_siswa ORDER BY tabel_hasil.nilai DESC";
          $result = mysqli_query($koneksi, $sql);
          $tanda = 1;
              while ($row = mysqli_fetch_assoc($result)) {
                  
          ?>
                  <tr class="gradeX">
                    <td><?=$row['nama']?></td>
                    <td><?=$row['jenis_kelamin']?></td>
                    <td><?=$row['alamat']?></td>
                    <td><?=$row['nilai']?></td>
                    <td>
                        <?php
                        if($tanda<=3){
                            echo "Masuk";
                        }else{
                            echo "Keluar";
                        }
                        ?>
                    </td>
                  </tr>
          <?php
                $tanda++;
              }
          ?>
                </tbody>
              </table>
            </div>
          </div>
          <!-- page end-->
        </div>
        <!-- /row -->