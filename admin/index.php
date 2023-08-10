<!DOCTYPE html>
<?php
date_default_timezone_set("Asia/Makassar");
session_start();
if (!isset($_SESSION['username'])) {
  header("location:../logout.php");
}
if ($_SESSION['level'] != "Administrator") {
  header("location:../logout.php");
}
include '../koneksi.php';
$username    = $_SESSION['username'];

$qbarang = mysqli_query($con, "SELECT * FROM tb_barang");
$qtransaksi = mysqli_query($con, "SELECT * FROM tb_transaksi");
$qmasuk = mysqli_query($con, "SELECT * FROM tb_transaksi WHERE jenis='Masuk'");
$qkeluar = mysqli_query($con, "SELECT * FROM tb_transaksi WHERE jenis='Keluar'");

?>
<html lang="zxx">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <title>Marketing</title>
  <link rel="icon" href="../img/logo-unitama.png" type="image/png" />
  <link rel="stylesheet" href="../css/bootstrap1.min.css" />
  <link rel="stylesheet" href="../vendors/themefy_icon/themify-icons.css" />
  <link rel="stylesheet" href="../vendors/niceselect/css/nice-select.css" />
  <link rel="stylesheet" href="../vendors/owl_carousel/css/owl.carousel.css" />
  <link rel="stylesheet" href="../vendors/gijgo/gijgo.min.css" />
  <link rel="stylesheet" href="../vendors/font_awesome/css/all.min.css" />
  <link rel="stylesheet" href="../vendors/tagsinput/tagsinput.css" />
  <link rel="stylesheet" href="../vendors/datepicker/date-picker.css" />
  <link rel="stylesheet" href="../vendors/scroll/scrollable.css" />
  <link rel="stylesheet" href="../vendors/datatable/css/jquery.dataTables.min.css" />
  <link rel="stylesheet" href="../vendors/datatable/css/responsive.dataTables.min.css" />
  <link rel="stylesheet" href="../vendors/datatable/css/buttons.dataTables.min.css" />
  <link rel="stylesheet" href="../vendors/text_editor/summernote-bs4.css" />
  <link rel="stylesheet" href="../vendors/morris/morris.css" />
  <link rel="stylesheet" href="../vendors/material_icon/material-icons.css" />
  <link rel="stylesheet" href="../css/metisMenu.css" />
  <link rel="stylesheet" href="../css/style1.css" />
  <link rel="stylesheet" href="../css/colors/default.css" id="colorSkinCSS" />

  <!-- Sweet Alert -->
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>

<body class="crm_body_bg">
  <?php include 'menu.php'; ?>
  <section class="main_content dashboard_part large_header_bg">
    <?php include 'header.php'; ?>
    <?php include 'navigation.php'; ?>
    <div class="footer_part">
      <?php include 'footer.php'; ?>
    </div>
  </section>

  <div id="back-top" style="display: none">
    <a title="Go to Top" href="#">
      <i class="ti-angle-up"></i>
    </a>
  </div>
  <script src="../js/jquery1-3.4.1.min.js"></script>
  <script src="../js/popper1.min.js"></script>
  <script src="../js/bootstrap1.min.js"></script>
  <script src="../js/metisMenu.js"></script>
  <script src="../vendors/count_up/jquery.waypoints.min.js"></script>
  <script src="../vendors/chartlist/Chart.min.js"></script>
  <script src="../vendors/count_up/jquery.counterup.min.js"></script>
  <script src="../vendors/niceselect/js/jquery.nice-select.min.js"></script>
  <script src="../vendors/owl_carousel/js/owl.carousel.min.js"></script>
  <script src="../vendors/datatable/js/jquery.dataTables.min.js"></script>
  <script src="../vendors/datatable/js/dataTables.responsive.min.js"></script>
  <script src="../vendors/datatable/js/dataTables.buttons.min.js"></script>
  <script src="../vendors/datatable/js/buttons.flash.min.js"></script>
  <script src="../vendors/datatable/js/jszip.min.js"></script>
  <script src="../vendors/datatable/js/pdfmake.min.js"></script>
  <script src="../vendors/datatable/js/vfs_fonts.js"></script>
  <script src="../vendors/datatable/js/buttons.html5.min.js"></script>
  <script src="../vendors/datatable/js/buttons.print.min.js"></script>
  <script src="../js/chart.min.js"></script>
  <script src="../vendors/progressbar/jquery.barfiller.js"></script>
  <script src="../vendors/tagsinput/tagsinput.js"></script>
  <script src="../vendors/text_editor/summernote-bs4.js"></script>
  <script src="../vendors/am_chart/amcharts.js"></script>
  <script src="../vendors/scroll/perfect-scrollbar.min.js"></script>
  <script src="../vendors/scroll/scrollable-custom.js"></script>
  <script src="../vendors/chart_am/core.js"></script>
  <script src="../vendors/chart_am/charts.js"></script>
  <script src="../vendors/chart_am/animated.js"></script>
  <script src="../vendors/chart_am/kelly.js"></script>
  <script src="../vendors/chart_am/chart-custom.js"></script>
  <script src="../js/custom.js"></script>
  <script>
    var dataBarang, barangMasuk, barangKeluar;
    $(document).ready(function() {
      dataBarang = $('#dataBarang').DataTable({
        "ajax": "../datamodel.php?page=databarang",
        "columns": [{
            "data": "id"
          },
          {
            "data": "part_number"
          },
          {
            "data": "deskripsi"
          },
          {
            "data": "stok"
          },
          {
            "data": "kategori"
          },
          { // this is Actions Column 
            mRender: function(data, type, row) {
              var datacoba = "'" + row.id + "|" + row.part_number + "|" + row.deskripsi + "|" + row.stok + "'";

              var linkDetail = '<button type="button" class="btn btn-light" data-bs-toggle="modal" onclick="parseDataBarang(' + datacoba + ');" data-bs-target="#modalEditBarang"><i class="ti-pencil"></i> Detail</button><br><br>';

              var linkDelete = '<a href="#" onclick="deleteBarang(\'-1\')" class="btn btn-danger mb-3" style="color:white;"><i class="ti-trash" ></i> Delete &nbsp;</a>';
              linkDelete = linkDelete.replace("-1", row.id);

              return linkDetail + linkDelete;
            }
          }
        ]
      });
      barangMasuk = $('#barangMasuk').DataTable({
        "ajax": "../datamodel.php?page=barangmasuk",
        "columns": [{
            "data": "id"
          },
          {
            "data": "id_barang"
          },
          {
            "data": "tanggal"
          },
          {
            "data": "jumlah"
          },
          {
            "data": "user"
          }
        ]
      });
      barangKeluar = $('#barangKeluar').DataTable({
        "ajax": "../datamodel.php?page=barangkeluar",
        "columns": [{
            "data": "id"
          },
          {
            "data": "id_barang"
          },
          {
            "data": "tanggal"
          },
          {
            "data": "jumlah"
          },
          {
            "data": "user"
          }
        ]
      });
    });
    $('#formAddDataBarang').on('submit', function(e) {
      e.preventDefault();
      $.ajax({
        type: 'post',
        enctype: 'multipart/form-data',
        url: '../datamodel.php?page=addbarang',
        data: new FormData(this),
        processData: false,
        contentType: false,
        cache: false,
        timeout: 600000,
        success: function(pesan) {
          if (pesan == 'Data Barang Berhasil Ditambahkan !!!') {
            swal({
              title: "Sukses Menambahkan Data Barang",
              icon: "success",
              text: pesan,
            }).then((value) => {
              $('#modalTambahBarang').modal('hide');
            });
            document.getElementById("formAddDataBarang").reset();
            dataBarang.ajax.reload();
          } else if (pesan == 'Data Gagal Ditambahkan Silahkan Hubungi Admin/Developer !!!') {
            swal({
              title: "Gagal Menambahkan Barang",
              icon: "error",
              text: pesan,
            });
            dataBarang.ajax.reload();
          } else {
            swal({
              title: "Gagal !",
              icon: "error",
              text: pesan,
            });
            dataBarang.ajax.reload();
          }
        }
      });
    });
    $('#formBarangMasuk').on('submit', function(e) {
      e.preventDefault();
      var part_number = $('#part_number').val();
      var deskripsi = $('#deskripsi').val();
      var stok = $('#stok').val();
      var jumlah = $('#jumlah').val();
      var id = $('#id').val();
      if (part_number != "" && deskripsi != "" && stok != "" && jumlah != "" && id != "") {
        $.ajax({
          type: 'post',
          enctype: 'multipart/form-data',
          url: '../datamodel.php?page=addmasuk',
          data: new FormData(this),
          processData: false,
          contentType: false,
          cache: false,
          timeout: 600000,
          success: function(pesan) {
            if (pesan == 'Data Barang Masuk Berhasil Ditambahkan !!!') {
              swal({
                title: "Sukses Menambahkan Data Barang Masuk",
                icon: "success",
                text: pesan,
              }).then((value) => {
                $('#modalTambahBarangMasuk').modal('hide');
              });
              document.getElementById("formBarangMasuk").reset();
              barangMasuk.ajax.reload();
            } else if (pesan == 'Data Gagal Ditambahkan Silahkan Hubungi Admin/Developer !!!') {
              swal({
                title: "Gagal Menambahkan Barang Masuk",
                icon: "error",
                text: pesan,
              });
              barangMasuk.ajax.reload();
            } else {
              swal({
                title: "Gagal !",
                icon: "error",
                text: pesan,
              });
              barangMasuk.ajax.reload();
            }
          }
        });
      }
    });

    $('#formBarangKeluar').on('submit', function(e) {
      e.preventDefault();
      var part_number = $('#part_number').val();
      var deskripsi = $('#deskripsi').val();
      var stok = $('#stok').val();
      var jumlah = $('#jumlah').val();
      var id = $('#id').val();
      if (part_number != "" && deskripsi != "" && stok != "" && jumlah != "" && id != "") {
        if (stok < jumlah) {
          swal({
            title: "Gagal !",
            icon: "error",
            text: "Stok Tidak Mencukupi!!!",
          });
        } else {
          $.ajax({
            type: 'post',
            enctype: 'multipart/form-data',
            url: '../datamodel.php?page=addkeluar',
            data: new FormData(this),
            processData: false,
            contentType: false,
            cache: false,
            timeout: 600000,
            success: function(pesan) {
              if (pesan == 'Data Barang Keluar Berhasil Ditambahkan !!!') {
                swal({
                  title: "Sukses Menambahkan Data Barang Keluar",
                  icon: "success",
                  text: pesan,
                }).then((value) => {
                  $('#modalTambahBarangKeluar').modal('hide');
                });
                document.getElementById("formBarangKeluar").reset();
                barangKeluar.ajax.reload();
              } else if (pesan == 'Data Gagal Ditambahkan Silahkan Hubungi Admin/Developer !!!') {
                swal({
                  title: "Gagal Menambahkan Barang Keluar",
                  icon: "error",
                  text: pesan,
                });
                barangKeluar.ajax.reload();
              } else {
                swal({
                  title: "Gagal !",
                  icon: "error",
                  text: pesan,
                });
                barangKeluar.ajax.reload();
              }
            }
          });
        }
      }
    });

    function deleteBarang(id) {
      swal({
          title: "Apakah Anda Yakin?",
          text: "Anda Ingin Menghapus Data Barang Ini !?",
          icon: "warning",
          buttons: true,
          dangerMode: true,
        })
        .then((willDelete) => {
          if (willDelete) {
            var idx = id;
            // console.log(idx);
            $.ajax({
              url: '../datamodel.php?page=deletebarang',
              type: 'POST',
              data: {
                'id': idx,
              },
              success: function(pesan) {
                if (pesan == 'Data Berhasil Dihapus !!!') {
                  swal({
                    title: "Berhasil !",
                    icon: "success",
                    text: pesan
                  }).then(function() {
                    dataBarang.ajax.reload();
                  });
                } else if (pesan == 'Terjadi Kesalahan !!! Silahkan Hubungi Administrator') {
                  swal({
                    title: "WARNING !",
                    icon: "warning",
                    text: pesan
                  });
                } else {
                  swal({
                    title: "Gagal !",
                    icon: "error",
                    text: "Gagal Menghapus Data",
                  });
                }
              }
            });
          }
        });
    };

    function parseDataBahanBaku(data) {
      var res = data.split("|");
      // console.log(res);
      document.getElementById("textidbahanbaku2").value = res[0];
      document.getElementById("textnamabahanbaku2").value = res[1];
      document.getElementById("textberatbahanbaku2").value = res[2];
      document.getElementById("textstokbahanbaku2").value = res[3];
    }

    function barangkeluardetail(selectObject) {
      var value = selectObject.value;
      $.ajax({
        url: '../datamodel.php?page=keluardetail&partnumber=' + value,
        type: 'GET',
        success: function(data) {
          var obj = jQuery.parseJSON(data);
          document.getElementById("deskripsi").value = obj['deskripsi'];
          document.getElementById("stok").value = obj['stok'];
          document.getElementById("id").value = obj['id'];
        }
      });
    }

    function barangmasukdetail(selectObject) {
      var value = selectObject.value;
      $.ajax({
        url: '../datamodel.php?page=masukdetail&partnumber=' + value,
        type: 'GET',
        success: function(data) {
          var obj = jQuery.parseJSON(data);
          document.getElementById("deskripsi").value = obj['deskripsi'];
          document.getElementById("stok").value = obj['stok'];
          document.getElementById("id").value = obj['id'];
        }
      });
    }

    function parseDataBarang(data) {
      var res = data.split("|");
      document.getElementById("id1").value = res[0];
      document.getElementById("partnumber1").value = res[1];
      document.getElementById("deskripsi1").value = res[2];
      document.getElementById("stok1").value = res[3];
    }
  </script>
</body>

</html>