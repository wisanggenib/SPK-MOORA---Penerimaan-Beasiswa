            <div class="form-panel">
              <h4 class="mb"><i class="fa fa-angle-right"></i> Tambah Kriteria</h4>
              <form class="form-horizontal style-form" method="POST" action="pages/kriteria/aksi_tambah.php">
                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Nama Kriteria</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control round-form" name="kriteria">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Type Kriteria</label>
                  <div class="col-sm-10">
                    <div class="form-check-inline">
                      <label class="form-check-label" for="radio1">
                        <input type="radio" class="form-check-input" id="radio1" name="type" value="benefit" checked> Benefit
                      </label>
                    </div>
                    <div class="form-check-inline">
                      <label class="form-check-label" for="radio2">
                        <input type="radio" class="form-check-input" id="radio2" name="type" value="cost"> Cost
                      </label>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Bobot Kriteria</label>
                  <div class="col-sm-10">
                    <input type="number" name="bobot" class="form-control round-form" min="0" step="0.1">
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