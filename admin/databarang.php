<div class="main_content_iner">
  <div class="container-fluid p-0">
    <div class="row justify-content-center">
      <div class="col-lg-12">
        <div class="white_card card_height_100 mb_30">
          <div class="white_card_body">
            <div class="QA_section">
              <div class="white_box_tittle list_header">
                <h4>Data Barang</h4>
                <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modalTambahBarang"><i class="ti-plus"></i> Tambah Barang</button>
              </div>
              <div class="QA_table mb_30">
                <table class="table" id="dataBarang">
                  <thead>
                    <tr>
                      <th scope="col">ID</th>
                      <th scope="col">Part Number</th>
                      <th scope="col">Deskripsi</th>
                      <th scope="col">Stok</th>
                      <th scope="col">Kategori</th>
                      <th scope="col">Action</th>
                    </tr>
                  </thead>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-12"></div>
    </div>
  </div>
</div>

<div class="modal fade" id="modalTambahBarang" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Form Tambah Barang</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="" id="formAddDataBarang">
        <div class="modal-body">
          <div class="mb-3">
            <label class="form-label" for="partnumber">Part Number</label>
            <input type="text" class="form-control" id="partnumber" name="partnumber" required>
          </div>
          <div class="mb-3">
            <label class="form-label" for="deskripsi">Deskripsi</label>
            <input type="text" class="form-control" id="deskripsi" name="deskripsi" required>
          </div>
          <div class="mb-3">
            <label class="form-label" for="stok">Stok</label>
            <input type="number" class="form-control" id="stok" name="stok" required min=1>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save changes</button>
        </div>
      </form>
    </div>
  </div>
</div>

<div class="modal fade" id="modalEditBarang" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Form Edit Barang</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="" id="formEditDataBarang">
        <div class="modal-body">
          <div class="mb-3">
            <label class="form-label" for="partnumber">Part Number</label>
            <input type="hidden" class="form-control" id="id1" name="id1" required>
            <input type="text" class="form-control" id="partnumber1" name="partnumber1" required>
          </div>
          <div class="mb-3">
            <label class="form-label" for="deskripsi">Deskripsi</label>
            <input type="text" class="form-control" id="deskripsi1" name="deskripsi1" required>
          </div>
          <div class="mb-3">
            <label class="form-label" for="stok">Stok</label>
            <input type="number" class="form-control" id="stok1" name="stok1" required min=1>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save changes</button>
        </div>
      </form>
    </div>
  </div>
</div>