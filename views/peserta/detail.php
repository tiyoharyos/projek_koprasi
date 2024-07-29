<?php
$db = dbconnect();
$peserta = $_GET['id_peserta'];


$sql = "select peserta.id_peserta,peserta.nama_peserta,peserta.tempat_lahir,
peserta.tanggal_lahir,peserta.pendidikan,peserta.telepon,peserta.alamat,
peserta.foto,koprasi.id_koprasi,koprasi.nama_koprasi,pelatihan.id_jenis_pelatihan,pelatihan.nama_jenis_pelatihan from tbl_peserta peserta
inner join tbl_koprasi koprasi on peserta.id_koprasi = koprasi.id_koprasi
inner join tbl_jenis_pelatihan pelatihan on peserta.id_jenis_pelatihan = pelatihan.id_jenis_pelatihan
where peserta.id_peserta='$peserta'";
$res = $db->query($sql);
if ($res) {
  $data = $res->fetch_assoc();
  $id_peserta = $data['id_peserta'];
  $nama_peserta = $data['nama_peserta'];
  $tempat_lahir = $data['tempat_lahir'];
  $tanggal_lahir = $data['tanggal_lahir'];
  $pendidikan = $data['pendidikan'];
  $telepon = $data['telepon'];
  $alamat = $data['alamat'];
  $foto = $data['foto'];
  $nama_koprasi = $data['nama_koprasi'];
  $nama_jenis_pelatihan = $data['nama_jenis_pelatihan'];
  $id_koprasi = $data['id_koprasi'];
  $id_jenis_pelatihan = $data['id_jenis_pelatihan'];
  $formattanggal = date('d-m-Y', strtotime($tanggal_lahir));

  $tempat = $tempat_lahir . ", " . $formattanggal;
?>
  <div class="card mb-3" style="max-width: auto;">
    <div class="row g-0">
      <div class="col-md-4">
        <div class="text-center">
          <img src="<?= $foto ?>" width="300" height="300" class="fluid rounded-start" alt="...">
        </div>
      </div>
      <div class="col-md-8">
        <div class="card-body">
          <form method="post" action="" enctype="multipart/form-data">
            <input type="hidden" name="id_peserta" value="<?= $id_peserta ?>">
            <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">Nama peserta</label>
              <input type="textarea" class="form-control" id="exampleInputPassword1" name="nama" value="<?= $nama_peserta ?>" require readonly>
            </div>

            <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">Tempat Tanggal Lahir peserta</label>
              <input type="textarea" class="form-control" id="exampleInputPassword1" name="tempat_tanggal_lahir" value="<?= $tempat ?>" require readonly>
            </div>
            <?php
            if ($pendidikan == "SLTA") {
              $pendidikanbaru = "SLTA/SMA";
            } else {
              $pendidikanbaru = $pendidikan;
            }
            ?>
            <div class="mb-3">
              <label for="exampleInputPassword1" class="form-label">Pendidikan</label>
              <input type="textarea" class="form-control" id="exampleInputPassword1" name="pendidikan" value="<?= $pendidikanbaru ?>" require readonly>
            </div>
            <div class="mb-3">
              <label for="exampleInputPassword1" class="form-label">Telepon</label>
              <input type="number" class="form-control" id="exampleInputPassword1" name="telepon" value="<?= $telepon ?>" require readonly>
            </div>
            <div class="mb-3">
              <label for="exampleInputPassword1" class="form-label">Alamat peserta</label>
              <input type="textarea" class="form-control" id="exampleInputPassword1" name="alamat" value="<?= $alamat ?>" require readonly>
            </div>
            <div class="mb-3">
              <label for="exampleInputPassword1" class="form-label">Asal Koprasi</label>
              <input type="textarea" class="form-control" id="exampleInputPassword1" name="id_koprasi" value="<?= $nama_koprasi ?>" require readonly>
            </div>
            <div class="mb-3">
              <label for="exampleInputPassword1" class="form-label">Jenis Pelatihan</label>
              <input type="textarea" class="form-control" id="exampleInputPassword1" name="id_jenis_pelatihan" value="<?= $nama_jenis_pelatihan ?>" require readonly>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#edit-data<?= $id_peserta ?>">
                Edit Data
              </button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>


  <!-- Modal Edit Data-->

  <div class="modal fade" id="edit-data<?= $id_peserta ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Edit Data Angoota</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">

          <form method="post" action="views/peserta/updatedata.php" enctype="multipart/form-data">
            <input type="hidden" name="id_peserta" value="<?= $id_peserta ?>">
            <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">Nama peserta</label>
              <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="nama_peserta" value="<?= $nama_peserta ?>" require>
            </div>
            <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">Tempat Tanggal Lahir peserta</label>
              <div class="input-group">
                <input type="text" class="form-control" aria-describedby="emailHelp" name="tempat_lahir" value="<?= $tempat_lahir ?>" require>
                <input type="date" class="form-control" aria-describedby="emailHelp" name="tanggal_lahir" value="<?= $tanggal_lahir ?>" require>
              </div>
            </div>
            <div class="mb-3">
              <label for="exampleInputPassword1" class="form-label">Pendidikan</label>
              <select name="pendidikan" id="pendidikan" class="form-control">
                <option value="<?= $pendidikan ?>"><?= $pendidikan ?>(Default)</option>
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
              <input type="number" class="form-control" id="exampleInputPassword1" name="telepon" value="<?= $telepon ?>" require>
            </div>
            <div class="mb-3">
              <label for="exampleInputPassword1" class="form-label">Alamat peserta</label>
              <input type="textarea" class="form-control" id="exampleInputPassword1" name="alamat" value="<?= $alamat ?>" require>
            </div>
            <div class="mb-3">
              <label for="exampleInputPassword1" class="form-label">Asal Koprasi</label>
              <select name="id_koprasi" id="id_koprasi" class="form-control">
                <option value="<?= $id_koprasi ?>"><?= $nama_koprasi ?>(Default)</option>
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
              <select name="id_jenis_pelatihan" id="id_jenis_pelatihan" class="form-control">
                <option value="<?= $id_jenis_pelatihan ?>"><?= $nama_jenis_pelatihan ?>(Default)</option>
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
              <img src="<?= $foto ?>" id="preview" class="img-thumbnail">
              <input type="file" name="gambar" class="form-control" id="formFile">
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
<?php
} else {
  echo "database error";
}
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