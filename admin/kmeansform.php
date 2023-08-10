<div class="main_content_iner">
  <div class="container-fluid p-0">
    <div class="row justify-content-center">
      <div class="col-lg-12">
        <div class="white_card card_height_100 mb_30">
          <div class="white_card_body">
            <div class="QA_section">
              <div class="white_box_tittle list_header">
                <h4>Form K-Means</h4>
              </div>
              <div class="col-lg-6">
                <div class="QA_table mb_30">
                  <form action="?mod=perhitungan" method="post">
                    <div class="modal-body">
                      <div class="mb-3">
                        <label class="form-label" for="awal">Rentang Waktu Awal</label>
                        <input type="date" class="form-control" id="awal" name="awal" required>
                      </div>
                      <div class="mb-3">
                        <label class="form-label" for="akhir">Rentang Waktu Akhir</label>
                        <input type="date" class="form-control" id="akhir" name="akhir" required>
                      </div>
                      <div class="mb-3">
                        <label class="form-label" for="batas">Batas Perulangan</label>
                        <input type="number" class="form-control" id="batas" name="batas" required min=1>
                      </div>
                    </div>
                    <div class="modal-footer">
                      <button type="submit" class="btn btn-primary">Mulai</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-12"></div>
    </div>
  </div>
</div>