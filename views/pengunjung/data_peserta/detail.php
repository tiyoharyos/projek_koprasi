<section class="hero hero-bg d-flex justify-content-center align-items-center">
  <div class="container">
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
              <img src="<?= $foto ?>" width="300" height="450" class="fluid rounded-start" alt="...">
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
  </div>
</section>