<?php
$db = dbConnect();
if ($db->connect_errno == 0) {
  $jumlahItemPerHalaman = 10;
  $halamanSaatIni = isset($_GET['halaman']) ? $_GET['halaman'] : 1;

  $offset = ($halamanSaatIni - 1) * $jumlahItemPerHalaman;

  $queryTotalItem = "SELECT COUNT(*) as total FROM tbl_peserta WHERE (status IS NULL OR status = '')";
  $resultTotalItem = mysqli_query($db, $queryTotalItem);
  $rowTotalItem = mysqli_fetch_assoc($resultTotalItem);
  $totalItem = $rowTotalItem['total'];
  $totalHalaman = ceil($totalItem / $jumlahItemPerHalaman);
?>
  <div class="d-flex flex-column flex-lg-row mb-4">
    <div class="flex-grow-1 d-flex align-items-center">
      <h3>Peserta</h3>
    </div>
  </div>
  <div class="bg-white rounded-4 shadow-sm p-4 mb-5">
    <div class="row  ">
      <!-- Modal Tambah Data-->
      <div class="modal fade" id="tambahdata" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Tambah Data peserta</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form method="post" action="views/peserta/datasimpanpeserta.php" enctype="multipart/form-data">
                <div class="mb-3">
                  <label for="exampleInputEmail1" class="form-label">Nama peserta</label>
                  <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="nama_peserta" require>
                </div>
                <div class="mb-3">
                  <label for="exampleInputEmail1" class="form-label">Tempat Tanggal Lahir peserta</label>
                  <div class="input-group">
                    <input type="text" class="form-control" aria-describedby="emailHelp" name="tempat_lahir" require>
                    <input type="date" class="form-control" aria-describedby="emailHelp" name="tanggal_lahir" require>
                  </div>
                </div>
                <div class="mb-3">
                  <label for="exampleInputPassword1" class="form-label">Pendidikan</label>
                  <select name="pendidikan" id="pendidikan" class="form-control">
                    <option value="SLTA">SLTA/SMA</option>
                    <option value="D3">D3</option>
                    <option value="D4">D4</option>
                    <option value="S1">S1</option>
                    <option value="S2">S2</option>
                    <option value="S3">S3</option>
                  </select>
                </div>
                <div class="mb-3">
                  <label for="exampleInputPassword1" class="form-label">Telepon</label>
                  <input type="number" class="form-control" id="exampleInputPassword1" name="telepon" require>
                </div>
                <div class="mb-3">
                  <label for="exampleInputPassword1" class="form-label">Alamat peserta</label>
                  <input type="textarea" class="form-control" id="exampleInputPassword1" name="alamat" require>
                </div>
                <div class="mb-3">
                  <label for="exampleInputPassword1" class="form-label">Asal Koprasi</label>
                  <select name=id_koprasi id="id_koprasi" class="form-control">
                    <?php
                    $sql = "SELECT id_koprasi,nama_koprasi FROM tbl_koprasi";
                    $res = $db->query($sql);
                    while ($data = $res->fetch_row()) {
                      echo "<option value='$data[0]'>$data[1]</option>";
                    }
                    ?>
                  </select>
                </div>
                <div class="mb-3">
                  <label for="exampleInputPassword1" class="form-label">Jenis Pelatihan</label>
                  <select name=id_jenis_pelatihan id="id_jenis_pelatihan" class="form-control">
                    <?php
                    $sql = "SELECT id_jenis_pelatihan,nama_jenis_pelatihan FROM tbl_jenis_pelatihan";
                    $res = $db->query($sql);
                    while ($data = $res->fetch_row()) {
                      echo "<option value='$data[0]'>$data[1]</option>";
                    }
                    ?>
                  </select>
                </div>


                <div id="imagePreview" class="mb-3">
                  <img src="https://cdn.discordapp.com/attachments/1077943381277298789/1101098067962376202/Empty_State.png" id="preview" class="img-thumbnail">
                  <input type="file" name="gambar" class="form-control" id="formFile">
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
      <?php
      $sql = "SELECT peserta.id_peserta,peserta.nama_peserta,peserta.telepon,peserta.foto,
      koprasi.nama_koprasi FROM tbl_peserta peserta
      INNER JOIN tbl_koprasi koprasi ON peserta.id_koprasi = koprasi.id_koprasi
WHERE (peserta.status IS NULL OR peserta.status = '')
        LIMIT $offset, $jumlahItemPerHalaman";
      $res = $db->query($sql);
      if ($res) {
        $data = $res->fetch_row();
        do {
          list($id_peserta, $nama_peserta, $telepon, $foto, $nama_koprasi) = $data;
      ?>

          <table class="table">
            <tbody>
              <tr>
                <td>
                  <img src="<?= $foto ?>" width="200" height="200" alt="">
                </td>
                <td>
                  <form method="post" name="frm" action="views/peserta/hapusdatapeserta.php">
                    <h5 scope="col">Nama perta: <?= $nama_peserta ?></h5>
                    <h5 scope="col">Asal Koperasi: <?= $nama_koprasi ?></h5>
                    <h5 scope="col">Nomor HP : <?= $telepon ?></h5>
                </td>
                <td>
                </td>
                </form>
                <td>
                  <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#diterima<?= $id_peserta ?>">
                      <i class="fas fa-check"></i>
                    </button>
                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#ditolak<?= $id_peserta ?>">
                      <i class="fas fa-times"></i>
                    </button>
                  </div>
                  <br>


                </td>
              </tr>
            </tbody>
          </table>
          <!-- modal diterima -->
          <div class="modal fade" id="diterima<?= $id_peserta ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="staticBackdropLabel">Konfirmasi Data</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  anda yakkin untuk menerima peserta ini ?
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Tidak</button>
                  <a href="views/peserta/persetujuan.php?id_peserta=<?= $id_peserta ?>&status=diterima" type="button" class="btn btn-success">YA</a>
                </div>

              </div>
            </div>
          </div>
          <!-- Modal ditolak -->
          <div class="modal fade" id="ditolak<?= $id_peserta ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="staticBackdropLabel">Konfirmasi Data</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  anda yakkin untuk menolak peserta ini ?
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Tidak</button>
                  <a href="views/peserta/persetujuan.php?id_peserta=<?= $id_peserta ?>&status=ditolak" type="button" class="btn btn-success">YA</a>
                </div>

              </div>
            </div>
          </div>
      <?php
        } while ($data = $res->fetch_row());
      } else {
        echo "<div style='color: white'>Gagal Eksekusi SQL" . (DEVELOPMENT ? " : " . $db->error : "") . "<br></div>";
      }

      ?>
      <div class="row">
        <nav aria-label="Page navigation example">
          <ul class="pagination justify-content-center">
            <?php for ($i = 1; $i <= $totalHalaman; $i++) { ?>
              <li class="page-item"><a class="page-link" href="?module=status&halaman=<?php echo $i; ?>"><?php echo $i; ?></a></li>
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
  echo "<div style='color: white'>Gagal koneksi" . (DEVELOPMENT ? " : " . $db->connect_error : "") . "<br></div>";

?>
<script>
  function konfirmasi() {
    konfirmasi = confirm("Apakah anda yakin ingin menghapus gambar ini?")
    document.writeln(konfirmasi)
  }
  document.getElementById('formFile').addEventListener('change', function(event) {
    var file = event.target.files[0];
    var reader = new FileReader();

    reader.onload = function(e) {
      document.getElementById("preview").src = e.target.result;
    };

    reader.readAsDataURL(file);
  });
</script>