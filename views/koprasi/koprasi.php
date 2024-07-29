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
    <div class="flex-grow-1 d-flex align-items-center">
      <h3>Koprasi</h3>
    </div>
    <!-- breadcrumbs -->
    <div class="ms-5 ms-lg-0 pt-lg-2">
      <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
        <ol class="breadcrumb">
          <div class="d-grid gap-2 d-md-flex justify-content-md-start">
            <a href="" target="_blank" class="btn btn-outline-brand" data-toggle="modal" data-target="#tambahdata"><i class="fas fa-plus-circle" &nbsp></i> Tambah Data</a>
          </div>
        </ol>
      </nav>
    </div>
  </div>

  <div class="bg-white rounded-4 shadow-sm p-4 mb-5">
    <div class="row  ">
      <!-- Modal Tambah Data-->
      <div class="modal fade" id="tambahdata" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Tambah Data Koprasi</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form method="post" action="views/koprasi/datakoprasisimpan.php">
                <div class="mb-3">
                  <label for="exampleInputEmail1" class="form-label">Nama Koprasi</label>
                  <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="nama_koprasi" require>
                </div>
                <div class="mb-3">
                  <label for="exampleInputPassword1" class="form-label">Alamat Koprasi</label>
                  <input type="text" class="form-control" id="exampleInputPassword1" name="alamat" require>
                </div>
                <div class="mb-3">
                  <label for="exampleInputPassword1" class="form-label">Nomor Badan Hukum</label>
                  <input type="text" class="form-control" id="exampleInputPassword1" name="badan_hukum" require>
                </div>
                <div class="mb-3">
                  <label for="exampleInputPassword1" class="form-label">Telepon Koprasi</label>
                  <input type="number" class="form-control" id="exampleInputPassword1" name="telepon" require>
                </div>
                <div class="mb-3">
                  <label for="exampleInputPassword1" class="form-label">Jenis Usaha Koprasi</label>
                  <select name="jenis_usaha" id="jenis_usaha" class="form-control">
                    <option value="Usaha Simpan Pinjam">Usaha Simpan Pinjam</option>
                    <option value="Usaha Perdagangan Umum">Usaha Perdagangan Umum</option>
                    <option value="Usaha Jasa">Usaha Jasa</option>
                  </select>
                </div>
                <div class="mb-3">
                  <label for="exampleInputPassword1" class="form-label">Jadwal Pelatihan</label>
                  <input type="date" class="form-control" id="exampleInputPassword1" name="jadwal_pelatihan" require>
                </div>
                <div class="mb-3">
                  <label for="exampleInputPassword1" class="form-label">Email</label>
                  <input type="text" class="form-control" id="exampleInputPassword1" name="email" require>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                    Close
                  </button>
                  <input type="submit" class="btn btn-primary" name="TblSimpan" value="Tambah Data"></input>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <!-- akhir modal -->
    </div>
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
            <th scope="col">Jadwal Pelatihan</th>
            <th scope="col">Email</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $sql = "SELECT * FROM tbl_koprasi LIMIT $offset, $jumlahItemPerHalaman";
          $res = $db->query($sql);

          if ($res) {

            $data = $res->fetch_row();
            do {
              list($id_koprasi, $nama_koprasi, $alamat, $badan_hukum, $telepon, $jenis_usaha, $email, $jadwal_pelatihan) = $data;
              $date = date_create($jadwal_pelatihan);
          ?>
              <tr>
                <td><?= $nama_koprasi ?></td>
                <td><?= $alamat ?></td>
                <td><?= $badan_hukum ?></td>
                <td><?= $telepon ?></td>
                <td><?= $jenis_usaha ?></td>
                <td><?= date_format($date, "d-m-Y") ?></td>
                <td><?= $email ?></td>
                <td>


                  <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#edit<?= $id_koprasi ?>">
                    <i class="fas fa-pen-square"></i>
                  </button>


                  <button id="hapus-<?= $id_koprasi ?>" type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal<?= $id_koprasi ?>">
                    <i class="fas fa-trash"></i>
                  </button>
                  <!-- Modal Hapus -->
                  <div class="modal fade" id="exampleModal<?= $id_koprasi ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Konfirmasi Hapus data</h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                          <form method="post" action="views/koprasi/hapusdatakoprasi.php">
                            <input type="hidden" name="id_koprasi" value="<?php echo $id_koprasi ?>">
                            <div class="modal-body">
                              anda yakin untuk hapus data?
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Tidak</button>
                              <input type="submit" name="TblHapus" class="btn btn-danger" value="Hapus" />
                          </form>
                        </div>
                      </div>
                    </div>
                  </div>
    </div>
    </td>
    </tr>

    <!-- Modal edit data-->
    <div class="modal fade" id="edit<?= $id_koprasi ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Edit Data</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form method="post" action="views/koprasi/updatedatakoprasi.php">
              <input type="hidden" name="id_koprasi" value="<?= $id_koprasi ?>" id="id_koperasi">
              <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Nama Koprasi</label>
                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="nama_koprasi" value="<?= $nama_koprasi ?>" require>
              </div>
              <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Alamat Koprasi</label>
                <input type="text" class="form-control" id="exampleInputPassword1" name="alamat" value="<?= $alamat ?>" require>
              </div>
              <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Nomor Badan Hukum</label>
                <input type="text" class="form-control" id="exampleInputPassword1" name="badan_hukum" value="<?= $badan_hukum ?>" require>
              </div>
              <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Telepon Koprasi</label>
                <input type="number" class="form-control" id="exampleInputPassword1" name="telepon" value="<?= $telepon ?>" require>
              </div>
              <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Jenis Usaha Koprasi</label>
                <select name="jenis_usaha" id="jenis_usaha" class="form-control">
                  <option value="<?= $jenis_usaha ?>"><?= $jenis_usaha ?>(Default)</option>
                  <option value="Usaha Simpan Pinjam">Usaha Simpan Pinjam</option>
                  <option value="Usaha Perdagangan Umum">Usaha Perdagangan Umum</option>
                  <option value="Usaha Jasa">Usaha Jasa</option>
                </select>
              </div>
              <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Jadwal Pelatihan</label>
                <input type="date" class="form-control" id="exampleInputPassword1" name="jadwal_pelatihan" value="<?= $jadwal_pelatihan ?>" required>
              </div>
              <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Email</label>
                <input type="text" class="form-control" id="exampleInputPassword1" name="email" value="<?= $email ?>" require>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                  Close
                </button>
                <input type="submit" class="btn btn-primary" name="TblUpdate" value="Update Data"></input>
              </div>
            </form>
          </div>
          </tbody>

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