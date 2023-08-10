<!DOCTYPE html>
<html lang="zxx">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <title>Marketing</title>
  <link rel="icon" href="img/logo-unitama.png" type="image/png" />
  <link rel="stylesheet" href="css/bootstrap1.min.css" />
  <link rel="stylesheet" href="vendors/themefy_icon/themify-icons.css" />
  <link rel="stylesheet" href="vendors/font_awesome/css/all.min.css" />
  <link rel="stylesheet" href="vendors/scroll/scrollable.css" />
  <link rel="stylesheet" href="css/metisMenu.css" />
  <link rel="stylesheet" href="css/style1.css" />
  <link rel="stylesheet" href="css/colors/default.css" id="colorSkinCSS" />
  <!-- Sweet Alert -->
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>

<body class="crm_body_bg">
  <div class="main_content_iner">
    <div class="container-fluid p-0">
      <div class="row justify-content-center">
        <div class="col-lg-12">
          <br>
          <div class="white_box mb_30">
            <div class="row justify-content-center">
              <div class="col-lg-4">
                <center><img src="img/logo-unitama.png" style="max-width: 200px;" /></center>
                <br><br>
                <div class="modal-content cs_modal">
                  <div class="modal-header justify-content-center theme_bg_1">
                    <h5 class="modal-title text_white">Log in</h5>
                  </div>
                  <div class="modal-body">
                    <form action="" id="formlogin">
                      <div class>
                        <input type="text" class="form-control" placeholder="Username" id="txt_username" name="username" required/>
                      </div>
                      <div class>
                        <input type="password" class="form-control" placeholder="Password" id="txt_password" name="password" required/>
                      </div>
                      <button type="submit" class="btn_1 full_width text-center">Log in</button>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <div class="footer_iner text-center">
          <p>
            2023 © Rezki Misbahuddin - Universitas Teknologi Akba Makassasr
          </p>
        </div>
      </div>
    </div>
  </div>

  <script src="js/jquery1-3.4.1.min.js"></script>
  <script src="js/popper1.min.js"></script>
  <script src="js/bootstrap1.min.js"></script>
  <script src="js/metisMenu.js"></script>
  <script src="vendors/scroll/perfect-scrollbar.min.js"></script>
  <script src="vendors/scroll/scrollable-custom.js"></script>
  <script src="js/custom.js"></script>
  <script>
    $('#formlogin').on('submit', function(e) {
      e.preventDefault();
      var username = $('#txt_username').val();
      var password = $('#txt_password').val();
      if (username != "" && password != "") {
        $.ajax({
          type: 'post',
          url: 'datamodel.php?page=proseslogin',
          data: $('form').serialize(),
          success: function(pesan) {
            if (pesan == 'Berhasil Login Sebagai Administrator Baznas') {
              //Arahkan ke halaman admin jika script pemroses mencetak kata ok
              window.location = 'admin/';
            } else if (pesan == 'Berhasil Login Sebagai User Baznas') {
              //Arahkan ke halaman admin jika script pemroses mencetak kata ok
              window.location = 'user/';
            } else {
              //Cetak peringatan untuk username & password salah
              swal({
                title: "Gagal !",
                icon: "error",
                text: pesan,
              });
            }
          }
        });
      }else{
        swal({
          title: "Gagal !",
          icon: "error",
          text: " Silahkan Isi Form Terlebih Dahulu!!!",
        });
      }
    });
  </script>
</body>

</html>