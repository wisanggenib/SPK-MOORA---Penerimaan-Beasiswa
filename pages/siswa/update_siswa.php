<ul class="nav nav-tabs" role="tablist">
    <li class="nav-item">
      <a class="nav-link active" data-toggle="tab" href="#home">Data Diri</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-toggle="tab" href="#menu1">Nilai</a>
    </li>
  </ul>

<?php
$id_siswa = $_GET['id_siswa'];
$sql = "SELECT * FROM tabel_siswa WHERE id_siswa = $id_siswa";
$result = mysqli_query($koneksi, $sql);
$row = mysqli_fetch_assoc($result);
?>

<form class="form-horizontal style-form" method="POST" action="pages/siswa/aksi_edit.php?id_siswa=<?=$id_siswa?>">
  <!-- Tab panes -->
  <div class="tab-content" style="background-color: white;padding: 20px;">
    <div id="home" class="tab-pane active">
      <h3>Data Diri</h3>
        <div class="form-group">
          <label class="col-sm-2 col-sm-2 control-label">Nama </label>
          <div class="col-sm-10">
            <input type="text" class="form-control round-form" name="nama" value="<?=$row['nama']?>">
          </div>
        </div>
        <div class="form-group">
          <label class="col-sm-2 col-sm-2 control-label">Jenis Kelamin</label>
          <div class="col-sm-10">
            <div class="form-check-inline">
              <label class="form-check-label" for="radio1">
              <?php
                if($row['jenis_kelamin']=='L'){
                    echo "<input type='radio' class='form-check-input' id='radio1' name='jenis_kelamin' value='L' checked> Laki - Laki";
                }else {
                    echo "<input type='radio' class='form-check-input' id='radio1' name='jenis_kelamin' value='L' > Laki - Laki";
                }
              ?>
                
              </label>
            </div>
            <div class="form-check-inline">
              <label class="form-check-label" for="radio2">
              <?php
                if($row['jenis_kelamin']=='P'){
                    echo "<input type='radio' class='form-check-input' id='radio2' name='jenis_kelamin' value='P' checked> Perempuan";
                }else {
                    echo "<input type='radio' class='form-check-input' id='radio2' name='jenis_kelamin' value='P' > Perempuan";
                }
              ?>
              </label>
            </div>
          </div>
        </div>
        <div class="form-group">
          <label class="col-sm-2 col-sm-2 control-label">Alamat </label>
          <div class="col-sm-10">
              <textarea class="form-control" rows="5" id="comment" name="alamat"><?=$row['alamat']?></textarea>
          </div>
        </div>      
    </div>
    <div id="menu1" class=" tab-pane fade">
      <h3>Nilai</h3>
        <div class="form-group">
          <label class="col-sm-2 col-sm-2 control-label">Penerima KPS/KKS/KIP : </label>
          <div class="col-sm-10">
            <div class="form-check-inline">
              <label class="form-check-label" for="radio1">
              <?php
                if($row['KPS']=='ya'){
                    echo "<input type='radio' class='form-check-input' id='radio1' name='KPS' value='ya' checked> Ya";
                }else{
                    echo "<input type='radio' class='form-check-input' id='radio1' name='KPS' value='ya'> Ya";
                }
                ?>
              </label>
              <label class="form-check-label" for="radio2">
              <?php
                if($row['KPS']=='tidak'){
                    echo "<input type='radio' class='form-check-input' id='radio1' name='KPS' value='tidak' checked> Tidak";
                }else{
                    echo "<input type='radio' class='form-check-input' id='radio1' name='KPS' value='tidak'> Tidak";
                }
                ?>
              </label>
            </div>
          </div>
        </div>
        <div class="form-group">
          <label class="col-sm-2 col-sm-2 control-label">Penerima PKH : </label>
          <div class="col-sm-10">
            <div class="form-check-inline">
              <label class="form-check-label" for="radio1">
              <?php
                if($row['PKH']=='ya'){
                    echo "<input type='radio' class='form-check-input' id='radio1' name='PKH' value='ya' checked> Ya";
                }else{
                    echo "<input type='radio' class='form-check-input' id='radio1' name='PKH' value='ya'> Ya";
                }
              ?>
                
              </label>
              <label class="form-check-label" for="radio2">
              <?php
                if($row['PKH']=='tidak'){
                    echo "<input type='radio' class='form-check-input' id='radio1' name='PKH' value='tidak' checked> Tidak";
                }else{
                    echo "<input type='radio' class='form-check-input' id='radio1' name='PKH' value='tidak'> Tidak";
                }
              ?>
              </label>
            </div>
          </div>
        </div>
        <div class="form-group">
          <label class="col-sm-2 col-sm-2 control-label">Yatim / Piatu : </label>
          <div class="col-sm-10">
            <div class="form-check-inline">
              <label class="form-check-label" for="radio1">
              <?php
                if($row['status']=='ya'){
                    echo "<input type='radio' class='form-check-input' id='radio1' name='status' value='ya' checked> Ya";
                }else{
                    echo "<input type='radio' class='form-check-input' id='radio1' name='status' value='ya' checked> Ya";
                }
                ?>
              </label>
              <label class="form-check-label" for="radio2">
              <?php
                if($row['status']=='tidak'){
                    echo "<input type='radio' class='form-check-input' id='radio1' name='status' value='tidak' checked> Tidak";
                }else{
                    echo "<input type='radio' class='form-check-input' id='radio1' name='status' value='tidak'> Tidak";
                }
                ?>
              </label>
            </div>
          </div>
        </div>
        <div class="form-group">
          <label class="col-sm-2 col-sm-2 control-label">Kesulitan Ekonomi : </label>
          <div class="col-sm-10">
            <div class="form-check-inline">
              <label class="form-check-label" for="radio1">
              <?php
                if($row['ekonomi']=='fisik'){
                    echo "<input type='radio' class='form-check-input' id='radio1' name='ekonomi' value='fisik' checked> fisik";
                }else{
                    echo "<input type='radio' class='form-check-input' id='radio1' name='ekonomi' value='fisik'> fisik";
                }
              ?>
                </label>
              <label class="form-check-label" for="radio2">
              <?php
                if($row['ekonomi']=='phk'){
                    echo "<input type='radio' class='form-check-input' id='radio1' name='ekonomi' value='phk' checked> phk";
                }else{
                    echo "<input type='radio' class='form-check-input' id='radio1' name='ekonomi' value='phk'> phk";
                }
              ?>
              </label>
              <label class="form-check-label" for="radio2">
              <?php
                if($row['ekonomi']=='terpidana'){
                    echo "<input type='radio' class='form-check-input' id='radio1' name='ekonomi' value='terpidana' checked> terpidana";
                }else{
                    echo "<input type='radio' class='form-check-input' id='radio1' name='ekonomi' value='terpidana'> terpidana";
                }
              ?>
              </label>
            </div>
          </div>
        </div>
        <div class="form-group">
          <label class="col-sm-2 col-sm-2 control-label">Penghasilan </label>
          <div class="col-sm-10">
            <input type="number" class="form-control round-form" name="penghasilan" min="0" step="100" value="<?=$row['penghasilan']?>">
          </div>
        </div>
        <div class="form-group">
          <div class="col-sm-12" style="text-align: center;">
            <button type="submit" class="btn btn-theme03">Masukan</button>
            <button type="reset" class="btn btn-theme04">Reset</button>
          </div>
        </div>
      
    </div>
    <div id="menu2" class="container tab-pane fade"><br>
      <h3>Menu 2</h3>
      <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam.</p>
    </div>
  </div>

  </form>