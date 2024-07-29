<section class="hero hero-bg d-flex justify-content-center align-items-center">
  <div class="container">
    <?php
    $db = dbConnect();
    if ($db->connect_errno == 0) {
      $jumlahItemPerHalaman = 10; 
      $halamanSaatIni = isset($_GET['halaman']) ? $_GET['halaman'] : 1;

      $offset = ($halamanSaatIni - 1) * $jumlahItemPerHalaman;

      $queryTotalItem = "SELECT COUNT(*) as total FROM tbl_koprasi";
      $resultTotalItem = mysqli_query($db, $queryTotalItem);
      $rowTotalItem = mysqli_fetch_assoc($resultTotalItem);
      $totalItem = $rowTotalItem['total'];
      $totalHalaman = ceil($totalItem / $jumlahItemPerHalaman);
    ?>

      <div class="d-flex flex-column flex-lg-row mb-4">
        <!-- judul halaman -->
        <div class="flex-grow-1 d-flex align-items-center">
          <h3 class="text-white">Koprasi</h3>
        </div>
      </div>

      <div class="bg-white rounded-4 shadow-sm p-4 mb-5">

        <br>

        <div class="container">
          <table class="table">
            <thead>
              <tr>
                <th scope="col">Nama Koprasi</th>
                <th scope="col">Alamat Koprasi</th>
                <th scope="col">Nomor Badan Hukum</th>
                <th scope="col">Telepon</th>
                <th scope="col">Jenis Usaha</th>
                <th scope="col">Email</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $sql = "select * from tbl_koprasi LIMIT $offset, $jumlahItemPerHalaman";
              $res = $db->query($sql);

              if ($res) {
                $data = $res->fetch_row();
                do {
                  list($id_koprasi, $nama_koprasi, $alamat, $badan_hukum, $telepon, $jenis_usaha, $email) = $data;
              ?>
                  <tr>
                    <td><?= $nama_koprasi ?></td>
                    <td><?= $alamat ?></td>
                    <td><?= $badan_hukum ?></td>
                    <td><?= $telepon ?></td>
                    <td><?= $jenis_usaha ?></td>
                    <td><?= $email ?></td>
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