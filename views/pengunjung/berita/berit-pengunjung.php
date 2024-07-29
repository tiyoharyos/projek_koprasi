<section class="hero hero-bg d-flex justify-content-center align-items-center">
  <div class="container">
    <?php
    $db = dbConnect();
    if ($db->connect_errno == 0) {
      $jumlahItemPerHalaman = 10;
      $halamanSaatIni = isset($_GET['halaman']) ? $_GET['halaman'] : 1;
  
      $offset = ($halamanSaatIni - 1) * $jumlahItemPerHalaman;
  
      $queryTotalItem = "SELECT COUNT(*) as total FROM tbl_berita";
      $resultTotalItem = mysqli_query($db, $queryTotalItem);
      $rowTotalItem = mysqli_fetch_assoc($resultTotalItem);
      $totalItem = $rowTotalItem['total'];
      $totalHalaman = ceil($totalItem / $jumlahItemPerHalaman);
    ?>

      <div class="d-flex flex-column flex-lg-row mb-4">
        <!-- judul halaman -->
        <div class="flex-grow-1 d-flex align-items-center">
          <h3 class="text-white">Berita Terkini</h3>
        </div>
      </div>

      <div class="bg-white rounded-4 shadow-sm p-4 mb-5">

        <br>

        <div class="container">
        <table class="table">
                <thead>
                    <tr>
                       
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sql = "SELECT * FROM tbl_berita LIMIT $offset, $jumlahItemPerHalaman";
                    $res = $db->query($sql);

                    if ($res) {

                        $data = $res->fetch_row();
                        do {
                            list($id, $judul, $deskripsi, $penulis, $tempat, $tanggal, $jam, $gambar) = $data;
                            $date = date_create($tanggal);
                            $waktu = date("H:i", strtotime($jam));
                    ?>
                            <tr>
                                <td><?= $judul ?></td>
                                <td><?= $deskripsi ?></td>
                                <td><?= $penulis ?></td>
                                <td><?= $tempat ?></td>
                                <td><?= date_format($date, "d-m-Y") ?></td>
                                <td><?= $waktu ?></td>
                                <td><img src="<?= $gambar ?>" width="200" height="200" alt=""></td>
                                <td>




                <?php
                        } while ($data = $res->fetch_row());
                ?>
                </table>
          <div class="row">
            <nav aria-label="Page navigation example">
              <ul class="pagination justify-content-center">
                <?php for ($i = 1; $i <= $totalHalaman; $i++) { ?>
                  <li class="page-item"><a class="page-link" href="?module=koprasi&halaman=<?php echo $i; ?>"><?php echo $i; ?></a></li>
                <?php } ?>
              </ul>
            </nav>
          </div>


        </div>
      </div>
  </div>
  </div>
  <?php echo $db->error; ?>
<?php
                $res->free();
              } else
                echo "<div style='color: white'>Gagal Eksekusi SQL" . (DEVELOPMENT ? " : " . $db->error : "") . "<br></div>";
            } else
              echo "<div style='color: white'>Gagal koneksi" . (DEVELOPMENT ? " : " . $db->connect_error : "") . "<br></div>";

?>
</div>
</section>