<?php
$id_kriteria = $_GET['id_kriteria'];
$sql = "SELECT * FROM tabel_kriteria WHERE id_kriteria = $id_kriteria";
$result = mysqli_query($koneksi, $sql);
$row = mysqli_fetch_assoc($result);
?>

            <div class="form-panel">
              <h4 class="mb"><i class="fa fa-angle-right"></i> Tambah Kriteria</h4>
              <form class="form-horizontal style-form" method="POST" action="pages/kriteria/aksi_update.php?id_kriteria=<?=$row['id_kriteria']?>">
                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Nama Kriteria</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control round-form" name="kriteria" value="<?=$row['kriteria']?>" required>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Type Kriteria</label>
                  <div class="col-sm-10">
                    <div class="form-check-inline">
                      <label class="form-check-label" for="radio1">
                        <?php 
                          if ($row['type']==='benefit') {
                        ?>
                            <input type="radio" class="form-check-input" id="radio1" name="type" value="benefit" checked> Benefit
                            <input type="radio" class="form-check-input" id="radio1" name="type" value="cost"> Cost
                         <?php
                          }else{
                          ?>
                            <input type="radio" class="form-check-input" id="radio1" name="type" value="benefit"> Benefit
                            <input type="radio" class="form-check-input" id="radio1" name="type" value="cost" checked> Cost
                        <?php
                          }
                         ?>
                      </label>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Bobot Kriteria</label>
                  <div class="col-sm-10">
                    <input type="number" name="bobot" class="form-control round-form" min="0" step="0.1" value="<?=$row['bobot']?>" required>
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-sm-12" style="text-align: center;">
                    <button type="submit" class="btn btn-theme03">Masukan</button>
                    <button type="reset" class="btn btn-theme04">Reset</button>
                  </div>
                </div>
              </form>
            </div>