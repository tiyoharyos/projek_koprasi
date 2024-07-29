<section class="hero hero-bg d-flex justify-content-center align-items-center">
  <div class="container">
    <?php
    $db = dbConnect();
    if ($db->connect_errno == 0) {
      $jumlahItemPerHalaman = 10;
      $halamanSaatIni = isset($_GET['halaman']) ? $_GET['halaman'] : 1;

      $offset = ($halamanSaatIni - 1) * $jumlahItemPerHalaman;

      $queryTotalItem = "SELECT COUNT(*) as total FROM tbl_peserta";
      $resultTotalItem = mysqli_query($db, $queryTotalItem);
      $rowTotalItem = mysqli_fetch_assoc($resultTotalItem);
      $totalItem = $rowTotalItem['total'];
      $totalHalaman = ceil($totalItem / $jumlahItemPerHalaman);
    ?>
      <div class="d-flex flex-column flex-lg-row mb-4">
        <div class="flex-grow-1 d-flex align-items-center">
          <h3>Persetujuan Peserta</h3>
        </div>
      </div>

      <div class="bg-white rounded-4 shadow-sm p-4 mb-5">
        <div class="row">
          <div class="col-sm-6">
            <div class="card">
              <div class="card-body">
                <?php
                $sql = "SELECT peserta.id_peserta, peserta.nama_peserta, peserta.telepon, peserta.foto, peserta.status,
          koprasi.nama_koprasi FROM tbl_peserta peserta
          INNER JOIN tbl_koprasi koprasi ON peserta.id_koprasi = koprasi.id_koprasi
          WHERE status = 'diterima'";
                $res = $db->query($sql);
                if ($res) {
                  $data = $res->fetch_row();
                  do {
                    list($id_peserta, $nama_peserta, $telepon, $foto, $status, $nama_koprasi) = $data;
                ?>
                    <table class="table">
                      <tbody>
                        <tr>
                          <td>
                            <img src="<?= $foto ?>" width="200" height="200" alt="">
                          </td>
                          <td>
                            <form method="post" name="frm" action="views/peserta/hapusdatapeserta.php">
                              <h5 scope="col">Nama peserta: <?= $nama_peserta ?></h5>
                              <h5 scope="col">Asal Koperasi: <?= $nama_koprasi ?></h5>
                              <h5 scope="col">Nomor HP : <?= $telepon ?></h5>
                          </td>
                          <td>
                          </td>
                          </form>
                          <td>
                            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                              <a href="?module=detail&id_peserta=<?= $id_peserta ?>" type="button" class="btn btn-primary" value="detail data"><i class="fa fa-info-circle"></i></a>
                            </div>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                <?php
                  } while ($data = $res->fetch_row());
                } else {
                  echo "<div style='color: white'>Gagal Eksekusi SQL" . (DEVELOPMENT ? " : " . $db->error : "") . "<br></div>";
                }

                ?>
              </div>
            </div>
          </div>
          <div class="col-sm-6">
            <div class="card">
              <div class="card-body">
                <?php
                $sql = "SELECT peserta.id_peserta, peserta.nama_peserta, peserta.telepon, peserta.foto, peserta.status,
       koprasi.nama_koprasi FROM tbl_peserta peserta
       INNER JOIN tbl_koprasi koprasi ON peserta.id_koprasi = koprasi.id_koprasi
       WHERE status = 'ditolak'";
                $res = $db->query($sql);
                if ($res) {
                  $data = $res->fetch_row();
                  do {
                    list($id_peserta, $nama_peserta, $telepon, $foto, $status, $nama_koprasi) = $data;
                ?>

                    <table class="table">
                      <tbody>
                        <tr>
                          <td>
                            <img src="<?= $foto ?>" width="200" height="200" alt="">
                          </td>
                          <td>
                            <form method="post" name="frm" action="views/peserta/hapusdatapeserta.php">
                              <h5 scope="col">Nama peserta: <?= $nama_peserta ?></h5>
                              <h5 scope="col">Asal Koperasi: <?= $nama_koprasi ?></h5>
                              <h5 scope="col">Nomor HP : <?= $telepon ?></h5>
                          </td>
                          <td>
                          </td>
                          </form>
                          <td>
                            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                              <a href="?module=detail&id_peserta=<?= $id_peserta ?>" type="button" class="btn btn-primary" value="detail data"><i class="fa fa-info-circle"></i></a>
                            </div>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                <?php
                  } while ($data = $res->fetch_row());
                } else {
                  echo "<div style='color: white'>Gagal Eksekusi SQL" . (DEVELOPMENT ? " : " . $db->error : "") . "<br></div>";
                }

                ?>
              </div>
            </div>
          </div>
        </div>




        <?php echo $db->error; ?>
      <?php
      $res->free();
    } else
      echo "<div style='color: white'>Gagal koneksi" . (DEVELOPMENT ? " : " . $db->connect_error : "") . "<br></div>";

      ?>
      </div>
</section>