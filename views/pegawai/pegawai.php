<?php
$db = dbConnect();
if ($db->connect_errno == 0) {
  $jumlahItemPerHalaman = 15;
  $halamanSaatIni = isset($_GET['halaman']) ? $_GET['halaman'] : 1;

  $offset = ($halamanSaatIni - 1) * $jumlahItemPerHalaman;

  $queryTotalItem = "SELECT COUNT(*) as total FROM tbl_pegawai";
  $resultTotalItem = mysqli_query($db, $queryTotalItem);
  $rowTotalItem = mysqli_fetch_assoc($resultTotalItem);
  $totalItem = $rowTotalItem['total'];
  $totalHalaman = ceil($totalItem / $jumlahItemPerHalaman);
?>
  <div class="d-flex flex-column flex-lg-row mb-4">
    <div class="flex-grow-1 d-flex align-items-center">
      <h3>Pegawai</h3>
    </div>

    <div class="row  ">
      <div class="ms-5 ms-lg-0 pt-lg-2">


        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
          <a href="" target="_blank" class="btn btn-outline-brand" data-toggle="modal" data-target="#tambahdata"><i class="fas fa-plus-circle" &nbsp></i> Tambah Data</a>
        </div>

        </nav>
      </div>
    </div>
    <!-- Modal Tambah Data-->
    <div class="modal fade" id="tambahdata" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Tambah Data Pegawai</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form method="post" action="views/pegawai/datasimpan.php" enctype="multipart/form-data">
              <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Nama Pegawai</label>
                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="nama_pegawai" required>
              </div>
              <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Tempat Tanggal Lahir Pegawai</label>
                <div class="input-group">
                  <input type="text" class="form-control" aria-describedby="emailHelp" name="tempat_lahir" required>
                  <input type="date" class="form-control" aria-describedby="emailHelp" name="tanggal_lahir" required>
                </div>
              </div>
              <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Telepon</label>
                <input type="number" class="form-control" id="exampleInputPassword1" name="nomer_telepon" required>
              </div>
              <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Alamat Pegawai</label>
                <input type="textarea" class="form-control" id="exampleInputPassword1" name="alamat" required>
              </div>
              <div id="imagePreview" class="mb-3">
                <img src="https://cdn.discordapp.com/attachments/1077943381277298789/1101098067962376202/Empty_State.png" id="preview" class="img-thumbnail">
                <input type="file" name="gambar" class="form-control" id="formFile" onchange="updatePreview('formFile', 'preview')">
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
  <div class="bg-white rounded-4 shadow-sm p-4 mb-5">
    <div class="container">
      <?php
      $sql = "SELECT * FROM tbl_pegawai
        LIMIT $offset, $jumlahItemPerHalaman";
      $res = $db->query($sql);
      if ($res) {
        $data = $res->fetch_row();
        do {
          list($id_pegawai, $nama_pegawai, $nomer_telepon, $tempat_lahir, $tanggal_lahir, $alamat,  $foto,) = $data;
      ?>

          <table class="table">
            <tbody>
              <tr>
                <td>
                  <img src="<?= $foto ?>" width="200" height="200" alt="">
                </td>
                <td>
                  <form method="post" name="frm" action="views/peserta/hapusdatapeserta.php">
                    <h5 scope="col">Nama Pegawai: <?= $nama_pegawai ?></h5>
                    <h5 scope="col">Nomor HP : <?= $nomer_telepon ?></h5>
                    <h5 scope="col">Alamat : <?= $alamat ?></h5>
                </td>
                <td>
                </td>
                </form>
                <td>
                  <div class="d-grid gap-2 d-md-flex justify-content-md-end">

                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#edit-data<?= $id_pegawai ?>"> <i class="fas fa-user-edit"></i></button>
                    <button id="hapus-<?= $id_pegawai ?>" type="button" class="btn btn-danger" data-toggle="modal" data-target="#hapus_data<?= $id_pegawai ?>">
                      <i class="fas fa-trash"></i></buttom>
                  </div>
                  <br>
                </td>
              </tr>
            </tbody>
          </table>


          <!-- modal edit data -->
          <div class="modal fade" id="edit-data<?= $id_pegawai ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Edit Data Pegawai</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">

                  <form method="post" action="views/pegawai/updateData.php" enctype="multipart/form-data">
                    <input type="hidden" name="id_pegawai" value="<?= $id_pegawai ?>">
                    <div class="mb-3">
                      <label for="exampleInputEmail1" class="form-label">Nama Pegawai</label>
                      <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="nama_pegawai" value="<?= $nama_pegawai ?>" require>
                    </div>
                    <div class="mb-3">
                      <label for="exampleInputEmail1" class="form-label">Tempat Tanggal Lahir peserta</label>
                      <div class="input-group">
                        <input type="text" class="form-control" aria-describedby="emailHelp" name="tempat_lahir" value="<?= $tempat_lahir ?>" require>
                        <input type="date" class="form-control" aria-describedby="emailHelp" name="tanggal_lahir" value="<?= $tanggal_lahir ?>" require>
                      </div>
                    </div>
                    <div class="mb-3">
                      <label for="exampleInputPassword1" class="form-label">Telepon</label>
                      <input type="number" class="form-control" id="exampleInputPassword1" name="nomer_telepon" value="<?= $nomer_telepon ?>" require>
                    </div>
                    <div class="mb-3">
                      <label for="exampleInputPassword1" class="form-label">Alamat peserta</label>
                      <input type="textarea" class="form-control" id="exampleInputPassword1" name="alamat" value="<?= $alamat ?>" require>
                    </div>
                    <div id="imagePreviewEdit<?= $id_pegawai ?>" class="mb-3">
                      <img src="<?= $foto ?>" id="previewEdit<?= $id_pegawai ?>" class="img-thumbnail">
                      <input type="file" name="gambar" class="form-control" id="formFileEdit<?= $id_pegawai ?>" onchange="updatePreview('formFileEdit<?= $id_pegawai ?>', 'previewEdit<?= $id_pegawai ?>')">
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                        Close
                      </button>
                      <input type="submit" class="btn btn-primary" name="TblUpdate" value="Edit Data"></input>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
          <!-- Modal hapus -->
          <div class="modal fade" id="hapus_data<?= $id_pegawai ?>" tabindex="-1" aria-labelledby="hapusLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="hapusLaber">konfirmasi Hapus Data</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <form method="post" action="views/pegawai/hapusdata.php">
                  <input type="hidden" name="id_pegawai" value="<?php echo $id_pegawai ?>">
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
    <!-- akhir modal hapus -->
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
        <li class="page-item"><a class="page-link" href="?module=peserta&halaman=<?php echo $i; ?>"><?php echo $i; ?></a></li>
      <?php } ?>
    </ul>
  </nav>
</div>
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
  function updatePreview(elementId, previewId) {
    var fileInput = document.getElementById(elementId);
    var previewImage = document.getElementById(previewId);

    var file = fileInput.files[0];
    var reader = new FileReader();

    reader.onload = function(e) {
      previewImage.src = e.target.result;
    };

    if (file) {
      reader.readAsDataURL(file);
    }
  }
</script>