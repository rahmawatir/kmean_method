<div class="main_content_iner">
  <div class="container-fluid p-0">
    <div class="row justify-content-center">
      <div class="col-lg-12">
        <div class="white_card card_height_100 mb_30">
          <div class="white_card_body">
            <div class="QA_section">
              <div class="white_box_tittle list_header">
                <h4>Data Barang Keluar</h4>
                <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modalTambahBarangKeluar"><i class="ti-plus"></i> Tambah Barang Keluar</button>
              </div>
              <div class="QA_table mb_30">
                <table class="table" id="barangKeluar">
                  <thead>
                    <tr>
                      <th scope="col">ID Transaksi</th>
                      <th scope="col">ID Barang</th>
                      <th scope="col">Tanggal</th>
                      <th scope="col">Jumlah</th>
                      <th scope="col">User</th>
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

<div class="modal fade" id="modalTambahBarangKeluar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Form Tambah Barang Keluar</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="" id="formBarangKeluar">
        <div class="modal-body">
          <div class="mb-3">
            <label class="form-label" for="partnumber">Part Number</label>
            <input type="hidden" name="id" id="id">
            <input list="partnumbers" class="form-control" id="partnumber" name="partnumber" required autocomplete="off" onchange="barangkeluardetail(this)">
            <datalist id="partnumbers">
              <?php
                $querydata = mysqli_query ($con, "SELECT * FROM tb_barang");
                while($row = mysqli_fetch_assoc($querydata)){
                  ?>
                  <option value="<?php echo $row['part_number'];?>"><?php echo $row['deskripsi'];?></option>
                <?php } ?>
              </datalist>
          </div>
          <div class="mb-3">
            <label class="form-label" for="deskripsi">Deskripsi</label>
            <input type="text" class="form-control" id="deskripsi" name="deskripsi" required readonly>
          </div>
          <div class="mb-3">
            <label class="form-label" for="stok">Stok</label>
            <input type="number" class="form-control" id="stok" name="stok" required min=1 readonly>
          </div>
          <div class="mb-3">
            <label class="form-label" for="jumlah">Jumlah</label>
            <input type="number" class="form-control" id="jumlah" name="jumlah" required min=1>
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