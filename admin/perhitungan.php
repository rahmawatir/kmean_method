<div class="main_content_iner">
  <div class="container-fluid p-0">
    <div class="row justify-content-center">
      <div class="col-lg-12">
        <div class="white_card card_height_100 mb_30">
          <div class="white_card_header">
            <div class="box_header m-0">
              <div class="main-title">
                <h2 class="m-0">Hasil Perhitungan K-Means</h2>
              </div>
            </div>
          </div>
          <div class="white_card_body">
            <?php
            $dataawal = array();
            $x = 0;
            $query = mysqli_query($con, "SELECT * FROM tb_barang");
            while ($row = mysqli_fetch_assoc($query)) {
              $id = $row['id'];
              $result = mysqli_query($con, "SELECT SUM(masuk) AS masuk FROM tb_kmeans WHERE id_barang=$id");
              $rowmasuk = mysqli_fetch_assoc($result);
              $result = mysqli_query($con, "SELECT SUM(keluar) AS keluar FROM tb_kmeans WHERE id_barang=$id");
              $rowkeluar = mysqli_fetch_assoc($result);
              $dataawal[$x] = array($rowmasuk['masuk'], $rowkeluar['keluar']);
              $x++;
            }
            $center = array();
            // for ($i = 0; $i < 3; $i++) {
            //   $center[$i] = $random_keys = array_rand($dataawal);
            // }
            $center[0]=2;
            $center[1]=54;
            $center[2]=87;
            sort($center);
            $no = 1;
            foreach ($center as $key) {
              echo "Center : " . $key . " : X = " . $dataawal[$key][0] . ", Y = " . $dataawal[$key][1] . "<br>";
              $no++;
            }
            ?>
          </div>
        </div>
      </div>
      <div class="col-lg-4">
        <div class="white_card card_height_100 mb_30">
          <div class="white_card_body">
            <div class="table-responsive">
              <table class="table table-bordered">
                <thead class="table-dark">
                  <tr>
                    <th scope="col">X</th>
                    <th scope="col">Y</th>
                  </tr>
                </thead>
                <?php
                foreach ($dataawal as $item) { ?>
                  <tr>
                    <td><?php echo $item[0]; ?></td>
                    <td><?php echo $item[1]; ?></td>
                  </tr>
                <?php } ?>

              </table>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-8">
        <div class="white_card card_height_100 mb_30">
          <div class="white_card_body">
            <div class="table-responsive">
              <table class="table table-bordered">
                <thead class="table-dark">
                  <tr>
                    <th scope="col">DC1</th>
                    <th scope="col">DC2</th>
                    <th scope="col">DC3</th>
                  </tr>
                </thead>
                <?php
                $dc = array();
                foreach ($dataawal as $item) {
                  array_push($dc, [
                    round(sqrt(round(pow(($item[0] - $dataawal[$center[0]][0]), 2) + (pow(($item[1] - $dataawal[$center[0]][1]), 2)))), PHP_ROUND_HALF_UP),
                    round(sqrt(round(pow(($item[0] - $dataawal[$center[1]][0]), 2) + (pow(($item[1] - $dataawal[$center[1]][1]), 2)))), PHP_ROUND_HALF_UP),
                    round(sqrt(round(pow(($item[0] - $dataawal[$center[2]][0]), 2) + (pow(($item[1] - $dataawal[$center[2]][1]), 2)))), PHP_ROUND_HALF_UP)
                  ]);
                ?>
                <?php }
                $class = array();
                foreach ($dc as $item) { ?>
                  <tr>
                    <td><?php echo $item[0]; ?></td>
                    <td><?php echo $item[1]; ?></td>
                    <td><?php echo $item[2]; ?></td>
                  </tr>
                <?php
                  if ($item[0] == (min($item[0], $item[1], $item[2]))) {
                    array_push($class, 1);
                  } elseif ($item[1] == (min($item[0], $item[1], $item[2]))) {
                    array_push($class, 2);
                  } elseif ($item[2] == (min($item[0], $item[1], $item[2]))) {
                    array_push($class, 3);
                  }
                }
                ?>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="container-fluid p-0">
    <div class="row justify-content-center">
      <div class="col-lg-2">
        <div class="white_card card_height_100 mb_30">
          <div class="white_card_body">
            <div class="table-responsive">
              <table class="table table-bordered">
                <thead class="table-dark">
                  <tr>
                    <th scope="col">Class</th>
                  </tr>
                </thead>
                <?php
                $c1 = array();
                $c2 = array();
                $c3 = array();
                $noc = 0;
                foreach ($class as $item) {
                  if ($item == 1) {
                    array_push($c1, [
                      $dataawal[$noc][0],
                      $dataawal[$noc][1]
                    ]);
                  } else {
                    array_push($c1, [
                      0, 0
                    ]);
                  }
                  if ($item == 2) {
                    array_push($c2, [
                      $dataawal[$noc][0],
                      $dataawal[$noc][1]
                    ]);
                  } else {
                    array_push($c2, [
                      0, 0
                    ]);
                  }
                  if ($item == 3) {
                    array_push($c3, [
                      $dataawal[$noc][0],
                      $dataawal[$noc][1]
                    ]);
                  } else {
                    array_push($c3, [
                      0, 0
                    ]);
                  }
                  $noc++;
                ?>
                  <tr>
                    <td><?php echo $item;
                        ?></td>
                  </tr>
                <?php } ?>
              </table>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-10">
        <div class="white_card card_height_100 mb_30">
          <div class="white_card_body">
            <div class="table-responsive">
              <table class="table table-bordered">
                <thead class="table-dark">
                  <tr>
                    <th scope="col" colspan="2">C1</th>
                    <th scope="col" colspan="2">C2</th>
                    <th scope="col" colspan="2">C3</th>
                  </tr>
                </thead>
                <?php
                $newcenter[0][0] = 0;
                $newcenter[0][1] = 0;
                $newcenter[1][0] = 0;
                $newcenter[1][1] = 0;
                $newcenter[2][0] = 0;
                $newcenter[2][1] = 0;
                for ($i = 0; $i < count($dataawal); $i++) {
                ?>
                  <tr>
                    <td><?php echo $c1[$i][0];
                        ?></td>
                    <td><?php echo $c1[$i][1];
                        ?></td>
                    <td><?php echo $c2[$i][0];
                        ?></td>
                    <td><?php echo $c2[$i][1];
                        ?></td>
                    <td><?php echo $c3[$i][0];
                        ?></td>
                    <td><?php echo $c3[$i][1];
                        ?></td>
                  </tr>
                <?php
                  $newcenter[0][0] = $newcenter[0][0] + $c1[$i][0];
                  $newcenter[0][1] = $newcenter[0][1] + $c1[$i][1];
                  $newcenter[1][0] = $newcenter[1][0] + $c2[$i][0];
                  $newcenter[1][1] = $newcenter[1][1] + $c2[$i][1];
                  $newcenter[2][0] = $newcenter[2][0] + $c3[$i][0];
                  $newcenter[2][1] = $newcenter[2][1] + $c3[$i][1];
                } ?>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <?php
  $newcenter[0][0] = round($newcenter[0][0] / count($dataawal), 2);
  $newcenter[0][1] = round($newcenter[0][1] / count($dataawal), 2);
  $newcenter[1][0] = round($newcenter[1][0] / count($dataawal), 2);
  $newcenter[1][1] = round($newcenter[1][1] / count($dataawal), 2);
  $newcenter[2][0] = round($newcenter[2][0] / count($dataawal), 2);
  $newcenter[2][1] = round($newcenter[2][1] / count($dataawal), 2);
  $galat = 0;
  $pertama = true;
  $newcenter1[0][0] = 0;
  $newcenter1[0][1] = 0;
  $newcenter1[1][0] = 0;
  $newcenter1[1][1] = 0;
  $newcenter1[2][0] = 0;
  $newcenter1[2][1] = 0;
  $loop = 1;
  $class1 = array();
  //perulangan sampai mendapatkan nilai galat bernilai 0
  while ($galat <= 3) {
    $temp1 = 0;
    $temp2 = 0;
    $temp3 = 0;
    $temp4 = 0;
    $temp5 = 0;
    $temp6 = 0;
    $tempclass = 0;
  ?>
    <div class="col-lg-12">
      <div class="white_card card_height_100 mb_30">
        <div class="white_card_header">
          <div class="box_header m-0">
            <div class="main-title">
              <h3 class="m-0"><?php echo "PERULANGAN KE-" . $loop++; ?></h3>
            </div>
          </div>
        </div>
        <div class="white_card_body">
          <?php
            if ($pertama == true) {
              echo "Center 1 : ".$newcenter[0][0].",". $newcenter[0][1]."<br>";
              echo "Center 2 : ".$newcenter[1][0].",". $newcenter[1][1]."<br>";
              echo "Center 3 : ".$newcenter[2][0].",". $newcenter[2][1];
            } elseif ($pertama == false) {
              echo "Center 1 : ".$newcenter1[0][0].",". $newcenter1[0][1]."<br>";
              echo "Center 2 : ".$newcenter1[1][0].",". $newcenter1[1][1]."<br>";
              echo "Center 3 : ".$newcenter1[2][0].",". $newcenter1[2][1];
            }
          ?>
        </div>
      </div>
    </div>
    <div class="container-fluid p-0">
      <div class="row justify-content-center">
        <div class="col-lg-4">
          <div class="white_card card_height_100 mb_30">
            <div class="white_card_body">
              <div class="table-responsive">
                <table class="table table-bordered">
                  <thead class="table-dark">
                    <tr>
                      <th scope="col">X</th>
                      <th scope="col">Y</th>
                    </tr>
                  </thead>
                  <?php
                  foreach ($dataawal as $item) { ?>
                    <tr>
                      <td><?php echo $item[0]; ?></td>
                      <td><?php echo $item[1]; ?></td>
                    </tr>
                  <?php } ?>
                </table>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-8">
          <div class="white_card card_height_100 mb_30">
            <div class="white_card_body">
              <div class="table-responsive">
                <table class="table table-bordered">
                  <thead class="table-dark">
                    <tr>
                      <th scope="col">DC1</th>
                      <th scope="col">DC2</th>
                      <th scope="col">DC3</th>
                    </tr>
                  </thead>
                  <?php
                  $dc1 = array();
                  foreach ($dataawal as $item) {
                    if ($pertama == true) {
                      array_push($dc1, [
                        round(sqrt(round(pow(($item[0] - $newcenter[0][0]), 2) + (pow(($item[1] - $newcenter[0][1]), 2)))), PHP_ROUND_HALF_UP),
                        round(sqrt(round(pow(($item[0] - $newcenter[1][0]), 2) + (pow(($item[1] - $newcenter[1][1]), 2)))), PHP_ROUND_HALF_UP),
                        round(sqrt(round(pow(($item[0] - $newcenter[2][0]), 2) + (pow(($item[1] - $newcenter[2][1]), 2)))), PHP_ROUND_HALF_UP)
                      ]);
                    } elseif ($pertama == false) {
                      array_push($dc1, [
                        round(sqrt(round(pow(($item[0] - $newcenter1[0][0]), 2) + (pow(($item[1] - $newcenter1[0][1]), 2)))), PHP_ROUND_HALF_UP),
                        round(sqrt(round(pow(($item[0] - $newcenter1[1][0]), 2) + (pow(($item[1] - $newcenter1[1][1]), 2)))), PHP_ROUND_HALF_UP),
                        round(sqrt(round(pow(($item[0] - $newcenter1[2][0]), 2) + (pow(($item[1] - $newcenter1[2][1]), 2)))), PHP_ROUND_HALF_UP)
                      ]);
                    }
                  }
                  $tempclass = $class1;
                  $class1 = array();
                  foreach ($dc1 as $item) { ?>
                    <tr>
                      <td><?php echo $item[0];
                          ?></td>
                      <td><?php echo $item[1];
                          ?></td>
                      <td><?php echo $item[2];
                          ?></td>
                    </tr>
                  <?php
                    if ($item[0] == (min($item[0], $item[1], $item[2]))) {
                      array_push($class1, 1);
                    } elseif ($item[1] == (min($item[0], $item[1], $item[2]))) {
                      array_push($class1, 2);
                    } elseif ($item[2] == (min($item[0], $item[1], $item[2]))) {
                      array_push($class1, 3);
                    }
                  }
                  ?>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="container-fluid p-0">
        <div class="row justify-content-center">
          <div class="col-lg-2">
            <div class="white_card card_height_100 mb_30">
              <div class="white_card_body">
                <div class="table-responsive">
                  <table class="table table-bordered">
                    <thead class="table-dark">
                      <tr>
                        <th scope="col">Class</th>
                      </tr>
                    </thead>
                    <?php
                    $c11 = array();
                    $c21 = array();
                    $c31 = array();
                    $noc1 = 0;
                    $i1 = 1;
                    foreach ($class1 as $item) {
                      if ($item == 1) {
                        array_push($c11, [
                          $dataawal[$noc1][0],
                          $dataawal[$noc1][1]
                        ]);
                      } else {
                        array_push($c11, [
                          0, 0
                        ]);
                      }
                      if ($item == 2) {
                        array_push($c21, [
                          $dataawal[$noc1][0],
                          $dataawal[$noc1][1]
                        ]);
                      } else {
                        array_push($c21, [
                          0, 0
                        ]);
                      }
                      if ($item == 3) {
                        array_push($c31, [
                          $dataawal[$noc1][0],
                          $dataawal[$noc1][1]
                        ]);
                      } else {
                        array_push($c31, [
                          0, 0
                        ]);
                      }
                      $noc1++;
                    ?>
                      <tr>

                        <td><?php echo $item;
                            ?></td>
                      </tr>
                    <?php } ?>
                  </table>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-10">
            <div class="white_card card_height_100 mb_30">
              <div class="white_card_body">
                <div class="table-responsive">
                  <table class="table table-bordered">
                    <thead class="table-dark">
                      <tr>
                        <th scope="col" colspan="2">C1</th>
                        <th scope="col" colspan="2">C2</th>
                        <th scope="col" colspan="2">C3</th>
                      </tr>
                    </thead>
                    <?php
                    $nilaigalat = 0;
                    for ($i = 0; $i < count($dataawal); $i++) {
                    ?>
                      <tr>
                        <td><?php echo $c11[$i][0];
                            ?></td>
                        <td><?php echo $c11[$i][1];
                            ?></td>
                        <td><?php echo $c21[$i][0];
                            ?></td>
                        <td><?php echo $c21[$i][1];
                            ?></td>
                        <td><?php echo $c31[$i][0];
                            ?></td>
                        <td><?php echo $c31[$i][1];
                            ?></td>
                      </tr>
                    <?php
                      if ($pertama == true) {
                        $nilaigalat = $nilaigalat + (abs($class1[$i] - $class[$i]));
                      } else {
                        $nilaigalat = $nilaigalat + (abs($class1[$i] - $tempclass[$i]));
                      }
                      $temp1 = $temp1 + $c11[$i][0];
                      $temp2 = $temp2 + $c11[$i][1];
                      $temp3 = $temp3 + $c21[$i][0];
                      $temp4 = $temp4 + $c21[$i][1];
                      $temp5 = $temp5 + $c31[$i][0];
                      $temp6 = $temp6 + $c31[$i][1];
                    }
                    $newcenter1[0][0] = round($temp1 / count($dataawal), 2);
                    $newcenter1[0][1] = round($temp2 / count($dataawal), 2);
                    $newcenter1[1][0] = round($temp3 / count($dataawal), 2);
                    $newcenter1[1][1] = round($temp4 / count($dataawal), 2);
                    $newcenter1[2][0] = round($temp5 / count($dataawal), 2);
                    $newcenter1[2][1] = round($temp6 / count($dataawal), 2);
                    // echo "NILAI GALAT " . $nilaigalat; ?>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  <?php
    $pertama = false;

    if ($nilaigalat == 0) {
      $qbarang          = mysqli_query ($con, "SELECT * FROM tb_barang");
      $index=0;
      while($rowbarang = mysqli_fetch_assoc($qbarang)){
        $updatebarang     = mysqli_query($con, "UPDATE tb_barang SET kategori='$class1[$index]' WHERE id='$index'");
        $index++;
      }
      break;
    }
  } ?>
  </table>
</div>