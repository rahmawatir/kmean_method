<?php
    if(file_exists('koneksi.php')){
        include 'koneksi.php';
        session_start();
        if(isset($_GET['page'])){
            if($_GET['page']=="proseslogin"){
                $username = $_POST['username'];
                $password = $_POST['password'];
                $query = mysqli_query ($con, "SELECT * FROM tb_user WHERE username='$username' AND password='$password'");
                if(mysqli_num_rows($query)==1){//jika berhasil akan bernilai 1
                    $c = mysqli_fetch_array($query);
                    if($c['level']=="Administrator"){
                        $_SESSION['username'] = $c['username'];
                        $_SESSION['level'] = $c['level'];
                        $_SESSION['id'] = $c['id'];
                        echo "Berhasil Login Sebagai Administrator Baznas";
                    }
                    else if($c['level']=="Staff"){
                          echo "Berhasil Login Sebagai User Baznas";
                    }else{
                        echo "Akun Anda Tidak Terdaftar";
                    }
                }else{
                    echo "Username Password Salah";
                    exit();
                }
            }else if($_GET['page']=="databarang"){
                $jsonArray =array();
                $x=0;
                $query = mysqli_query ($con, "SELECT * FROM tb_barang");
                while($row = mysqli_fetch_assoc($query)){
                    $jsonArray['data'][$x]=$row;
                    if($row['kategori']==1){
                        $jsonArray['data'][$x]['kategori']="Sangat Laris";
                    }elseif($row['kategori']==2){
                        $jsonArray['data'][$x]['kategori']="Laris";
                    }elseif($row['kategori']==3){
                        $jsonArray['data'][$x]['kategori']="Tidak Laris";
                    }else{
                        $jsonArray['data'][$x]['kategori']="Belum Diproses";
                    }
                    $x++;
                }
                echo json_encode($jsonArray);
            }else if($_GET['page']=="masukdetail"){
                $partnumber=$_GET['partnumber'];
                $jsonArray=array();
                $x=0;
                $query = mysqli_query ($con, "SELECT * FROM tb_barang WHERE part_number='$partnumber'");
                while($row = mysqli_fetch_assoc($query)){
                    $jsonArray=$row;
                    $x++;
                }
                echo json_encode($jsonArray);
            }else if($_GET['page']=="keluardetail"){
                $partnumber=$_GET['partnumber'];
                $jsonArray=array();
                $x=0;
                $query = mysqli_query ($con, "SELECT * FROM tb_barang WHERE part_number='$partnumber'");
                while($row = mysqli_fetch_assoc($query)){
                    $jsonArray=$row;
                    $x++;
                }
                echo json_encode($jsonArray);
            }else if($_GET['page']=="barangmasuk"){
                $jsonArray =array();
                $x=0;
                $query = mysqli_query ($con, "SELECT * FROM tb_transaksi WHERE jenis='Masuk'");
                while($row = mysqli_fetch_assoc($query)){
                    $jsonArray['data'][$x]=$row;
                    $x++;
                }
                echo json_encode($jsonArray);
            }else if($_GET['page']=="barangkeluar"){
                $jsonArray =array();
                $x=0;
                $query = mysqli_query ($con, "SELECT * FROM tb_transaksi WHERE jenis='Keluar'");
                while($row = mysqli_fetch_assoc($query)){
                    $jsonArray['data'][$x]=$row;
                    $x++;
                }
                echo json_encode($jsonArray);
            }else if($_GET['page']=="addbarang"){
                $partnumber       = $_POST["partnumber"];
                $deskripsi        = $_POST["deskripsi"];
                $stok             = $_POST["stok"];
                $tambahbarang   = mysqli_query($con, "INSERT INTO tb_barang VALUES('','$partnumber ','$deskripsi','$stok','')");
                if($tambahbarang){
                  echo "Data Barang Berhasil Ditambahkan !!!";
                }else{
                  echo "Data Barang Gagal Ditambahkan Silahkan Hubungi Admin/Developer !!!";
                  echo mysqli_error($con);
                  exit();
                }
            }else if($_GET['page']=="addmasuk"){
                $partnumber       = $_POST["partnumber"];
                $jenis            = "Masuk";
                $jumlah           = $_POST["jumlah"];
                $id               = $_POST["id"];
                $tanggalsekarang  = date("Y-m-d H:i:s");
                $user             = $_SESSION['id'];
                $qbarang          = mysqli_query ($con, "SELECT * FROM tb_barang WHERE id='$id'");
                $rowbarang        = mysqli_fetch_assoc($qbarang);
                $stokakhir        = $rowbarang['stok']+$jumlah;
                $tambahbarang     = mysqli_query($con, "INSERT INTO tb_transaksi VALUES('','$id ','$tanggalsekarang','$jenis','$jumlah','$user')");
                $qcekkmeans       = mysqli_query ($con, "SELECT * FROM tb_kmeans WHERE id='$id'");
                $lanjut           = false;
                $bulan = date('n');
                if (mysqli_num_rows($qcekkmeans)!=0){
                    while($rowkmeans    = mysqli_fetch_assoc($qcekkmeans)){
                        if($rowkmeans['bulan'] == $bulan){
                            $jumlahmasuk = $rowkmeans['masuk']+$jumlah;
                            $updatekmeans     = mysqli_query($con, "UPDATE tb_kmeans SET masuk='$jumlahmasuk' WHERE id_barang='$id'");
                            if($updatekmeans){
                                $lanjut = true;
                            }
                        }else{
                            $updatekmeans     = mysqli_query($con, "INSERT INTO tb_kmeans VALUES('','$id ','$bulan','$jumlah',0)");
                            if($updatekmeans){
                                $lanjut = true;
                            }
                        }
                    }
                    
                }else{
                    $updatekmeans     = mysqli_query($con, "INSERT INTO tb_kmeans VALUES('','$id ','$bulan','$jumlah',0)");
                    if($updatekmeans){
                        $lanjut = true;
                    }
                }
                $updatebarang     = mysqli_query($con, "UPDATE tb_barang SET stok='$stokakhir' WHERE id='$id'");
                if($tambahbarang && $updatebarang && ($lanjut == true)){
                  echo "Data Barang Masuk Berhasil Ditambahkan !!!";
                }else{
                  echo "Data Barang Masuk Gagal Ditambahkan Silahkan Hubungi Admin/Developer !!!";
                  echo mysqli_error($con);
                  exit();
                }
            }else if($_GET['page']=="addkeluar"){
                $partnumber       = $_POST["partnumber"];
                $jenis            = "Keluar";
                $jumlah           = $_POST["jumlah"];
                $id               = $_POST["id"];
                $tanggalsekarang  = date("Y-m-d H:i:s");
                $user             = $_SESSION['id'];
                $qbarang          = mysqli_query ($con, "SELECT * FROM tb_barang WHERE id='$id'");
                $rowbarang        = mysqli_fetch_assoc($qbarang);
                $stokakhir        = $rowbarang['stok']-$jumlah;
                $tambahbarang     = mysqli_query($con, "INSERT INTO tb_transaksi VALUES('','$id ','$tanggalsekarang','$jenis','$jumlah','$user')");
                $qcekkmeans       = mysqli_query ($con, "SELECT * FROM tb_kmeans WHERE id='$id'");
                $lanjut           = false;
                $bulan = date('n');
                if (mysqli_num_rows($qcekkmeans)!=0){
                    while($rowkmeans    = mysqli_fetch_assoc($qcekkmeans)){
                        if($rowkmeans['bulan'] == $bulan){
                            $jumlahkeluar = $rowkmeans['keluar']+$jumlah;
                            $updatekmeans     = mysqli_query($con, "UPDATE tb_kmeans SET keluar='$jumlahkeluar' WHERE id_barang='$id'");
                            if($updatekmeans){
                                $lanjut = true;
                            }
                        }else{
                            $updatekmeans     = mysqli_query($con, "INSERT INTO tb_kmeans VALUES('','$id ','$bulan','$jumlah',0)");
                            if($updatekmeans){
                                $lanjut = true;
                            }
                        }
                    }
                    
                }else{
                    $updatekmeans     = mysqli_query($con, "INSERT INTO tb_kmeans VALUES('','$id ','$bulan',0,'$jumlah')");
                    if($updatekmeans){
                        $lanjut = true;
                    }
                }
                $updatebarang     = mysqli_query($con, "UPDATE tb_barang SET stok='$stokakhir' WHERE id='$id'");
                if($tambahbarang && $updatebarang && ($lanjut == true)){
                  echo "Data Barang Keluar Berhasil Ditambahkan !!!";
                }else{
                  echo "Data Barang Keluar Gagal Ditambahkan Silahkan Hubungi Admin/Developer !!!";
                  echo mysqli_error($con);
                  exit();
                }
            }else if($_GET['page']=="deletebarang"){
                $id=$_POST['id'];
                $query = mysqli_query ($con, "DELETE FROM tb_barang WHERE id='$id'");
                if($query){
                    echo "Data Berhasil Dihapus !!!";
                }else{
                    echo "Terjadi Kesalahan !!! Silahkan Hubungi Administrator";
                }
            }
        }
    }
?>