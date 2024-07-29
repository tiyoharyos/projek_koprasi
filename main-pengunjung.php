<!DOCTYPE html>
<html lang="en">

<head>

  <title>Aplikasi Koprasi</title>
  <!--

DIGITAL TREND

https://templatemo.com/tm-538-digital-trend

-->
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=Edge">
  <meta name="description" content="">
  <meta name="keywords" content="">
  <meta name="author" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

  <link rel="stylesheet" href="assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/css/font-awesome.min.css">
  <link rel="stylesheet" href="assets/css/aos.css">
  <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
  <link rel="stylesheet" href="assets/css/owl.theme.default.min.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> <!-- Our Custom CSS -->
  <link rel="shortcut icon" href="assets/img/favicon.png" type="image/x-icon">

  <!-- MAIN CSS -->
  <link rel="stylesheet" href="assets/css/templatemo-digital-trend.css">
  <link rel="stylesheet" type="text/css" href="assets/sweetalert2/sweetalert2.css">
  <script type="text/javascript" charset="utf8" src="assets/sweetalert2/sweetalert2.js"></script>

</head>
<style>
  .kustom-btn {
    background: transparent;
    border: 2px solid var(--dark-color);
    border-radius: var(--border-radius-large);
    padding: 12px 26px 14px 26px;
    color: var(--dark-color);
    font-family: var(--title-font-family);
    font-size: var(--p-font-size);
    white-space: nowrap;
  }

  .kustom-btn.btn-bg {
    background: var(--primary-color);
    color: var(--white-color);
    border-color: transparent;
    transition: all .3s ease;
  }

  .kustom-btn:hover,
  .kustom-btn:focus {
    background: var(--balck-color);
    color: var(--primary-color);
    border-color: transparent;
  }
</style>

<body>
  <!-- Modal exit -->
  <div class="modal fade" id="exitpage" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Konfirmasi Login</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          Apakah Anda yakin untuk masuk ke sebagai admin ?
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
          <a href="views/login/login.php" type="button" class="btn btn-primary">Ya</a>
        </div>
      </div>
    </div>
  </div>
  <!-- MENU BAR -->
  <nav class="navbar fixed-top navbar-expand-lg">
    <div class="container">
      <a class="navbar-brand" href="#">
        <img src="https://cdn.discordapp.com/attachments/1086877082870616145/1113408262004551730/favicon.png" alt="" width="50" height="50" class="d-inline-block align-text-top">
        LAPENKOP
      </a>

      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a href="?module=dashboard" class="nav-link smoothScroll">Beranda</a>
          </li>
          <li class="nav-item">
            <a href="?module=dashboard" class="nav-link smoothScroll">Tentang Koprasi</a>
          </li>
          <li class="nav-item">
            <a href="?module=berita" class="nav-link smoothScroll">Berita</a>
          </li>
          <li class="nav-item">
            <a href="main-pengunjung.php?module=koprasi" class="nav-link smoothScroll">Data Koprasi</a>
          </li>
          <li class="nav-item">
            <a href="main-pengunjung.php?module=peserta" class="nav-link">Data Peserta</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="modal" data-target="#exitpage" href="">Masuk Sebagai Admin</a>
          </li>

        </ul>
      </div>
    </div>
  </nav>
  <br>
  <br>
  <?php include "content-pengunjung.php"; ?>

  <footer class="site-footer">
    <div class="container">
      <div class="row">

        <div class="col-lg-5 mx-lg-auto col-md-8 col-10">
          <h1 class="text-white" data-aos="fade-up" data-aos-delay="100"> koperasi kuat, <strong>ekonomi</strong> rakyat berdaulat.</h1>
        </div>
        <div class="col-lg-3 col-md-6 col-12" data-aos="fade-up" data-aos-delay="200">
          <h4 class="my-4">Contact Info</h4>

          <p class="mb-1">
            <i class="fa fa-phone mr-2 footer-icon"></i>
            (0234) 271502
          </p>

          <p class="mb-1">
            <i class="fa fa-phone mr-2 footer-icon"></i>
            082124429565
          </p>

          <p>
            <a href="#">
              <i class="fa fa-envelope mr-2 footer-icon"></i>
              lapenkopdaindramayu@gmail.com
            </a>
          </p>
        </div>

        <div class="col-lg-3 col-md-6 col-12" data-aos="fade-up" data-aos-delay="300">
          <h4 class="my-4">Alamat Kami</h4>

          <p class="mb-1">
            <i class="fa fa-home mr-2 footer-icon"></i>
            Indramayu , jl. Soekarno - Hatta no. 11 Indramayu
          </p>
        </div>

        <div class="col-lg-4 mx-lg-auto text-center col-md-8 col-12" data-aos="fade-up" data-aos-delay="400">
          <p class="copyright-text">Copyright &copy; 2023 LAPENKOP
            <br>
        </div>

        <div class="col-lg-4 mx-lg-auto col-md-6 col-12" data-aos="fade-up" data-aos-delay="500">

          <ul class="footer-link">
            <li><a href="#">Stories</a></li>
            <li><a href="#">Work with us</a></li>
            <li><a href="#">Privacy</a></li>
          </ul>
        </div>

        <div class="col-lg-3 mx-lg-auto col-md-6 col-12" data-aos="fade-up" data-aos-delay="600">
          <ul class="social-icon">
            <li><a href="#" class="fa fa-instagram"></a></li>
            <li><a href="#" class="fa fa-twitter"></a></li>
            <li><a href="#" class="fa fa-dribbble"></a></li>
            <li><a href="#" class="fa fa-behance"></a></li>
          </ul>
        </div>

      </div>
    </div>
  </footer>


  <!-- Modal Tambah Data-->
  <div class="modal fade" id="tambahdata" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Daftar Peserta</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form method="post" action="views/peserta/datasimpanpeserta.php" enctype="multipart/form-data">
            <div class="mb-3">
              <label for="nama_peserta" class="form-label">Nama Peserta</label>
              <input type="text" class="form-control" id="nama_peserta" aria-describedby="emailHelp" name="nama_peserta" require>
            </div>
            <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">Tempat Tanggal Lahir Peserta</label>
              <div class="input-group">
                <input type="text" class="form-control" aria-describedby="emailHelp" id="tempat_lahir" name="tempat_lahir" require>
                <input type="date" class="form-control" aria-describedby="emailHelp" id="tanggal_lahir" name="tanggal_lahir" require>
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
              <input type="number" class="form-control" id="telepon" name="telepon" require>
            </div>
            <div class="mb-3">
              <label for="exampleInputPassword1" class="form-label">Alamat peserta</label>
              <input type="textarea" class="form-control" id="alamat" name="alamat" require>
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
              <input type="file" id="gambar" name="gambar" class="form-control" id="formFile">
            </div>

            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                Close
              </button>

              <!-- <a class="btn btn-primary"ame="TblSimpan" id="TblSimpan" onclick="doSave()">Selesai</a> -->

              <input type="submit" class="btn btn-primary" name="TblSimpan" id="TblSimpan" value="Daftar" onclick="simpan()"></input>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  <!-- VISI -->
  <div class="modal fade" id="visi" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog  modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Visi</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <strong>LAPENKOP</strong> menjadi mitra terpecaya menuju gerakan koprasi yang mandiri
        </div>
      </div>
    </div>
  </div>
  <!-- Misi -->
  <div class="modal fade" id="misi" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog  modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Misi</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <strong>LAPENKOP</strong> meningkatkan keperdayan koprasi melalui pendidikan dan pelatihan
        </div>
      </div>
    </div>
  </div>
  <!-- Tujuan -->
  <div class="modal fade" id="tujuan" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog  modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Tujuan</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <ul class="list-group">
            <li class="list-group-item">Meningkatnya Partisipasi peserta dalam berbagai aspek, seperti: Kontribusi modal, pemanfaatan pelayanan usaha, keikutsertaan dalam pengambilan keputusan, pengawasan terhada koprasi, keikutsertaan dalam menanggung resiko</li>
            <li class="list-group-item">Meningkatkan profesionalisme kinerja pengurus, pengawas, manager dan karyawan dalam menjalankan tugasnya</li>
            <li class="list-group-item">Menyebarluaskan pendidikan dan pelatihan perkoprasian sampai lapis terbawah melalui peran pemandu dan pelatih yang terampil dan siap pakai</li>
          </ul>
        </div>
      </div>
    </div>
  </div>
  <!-- Strategi -->
  <div class="modal fade" id="strattegi" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog  modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Strategi</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <ul class="list-group">
            <li class="list-group-item">Merancang Metode dan teknik belajar yang sesuai dengan karakteristik orang dewasa, mudah dipahami, mudah dilaksanakan dan berbiaya murah</li>
            <li class="list-group-item">Menggunakan jaringan gerakan koprasi Indoensia secara optimal dan mandiri untuk menyebarluaskan program pendidikan dan pelatihan perkoprasian.</li>
          </ul>
        </div>
      </div>
    </div>
  </div>

  <!-- SCRIPTS -->
  <script src="assets/js/jquery.min.js"></script>
  <script src="assets/js/bootstrap.min.js"></script>
  <script src="assets/js/aos.js"></script>
  <script src="assets/js/owl.carousel.min.js"></script>
  <script src="assets/js/smoothscroll.js"></script>
  <script src="assets/js/custom.js"></script>
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

  <script>
    function doSave() {
      let nama_peserta = "nama_peserta";
      let tempat_lahir = "tempat_lahir";
      let tanggal_lahir = "tanggal_lahir";
      let pendidikan = "pendidikan";
      let telepon = "telepon";
      let alamat = "total_harga";
      let id_koprasi = "id_koprasi";
      let id_jenis_pelatihan = "id_jenis_pelatihan";
      let gambar = "gambar";
      $.ajax({
        data: "nama_peserta" + nama_peserta + "tempat_lahir" + tempat_lahir + "tanggal_lahir" + tanggal_lahir + "pendidikan" + pendidikan + "telepon" + telepon + "alamat" + alamat + "id_koprasi" + id_koprasi +
          "id_jenis_pelatihan" + id_jenis_pelatihan + "gambar" + gambar,
        url: "views/peserta/datasimpanpeserta.php",
        type: "POST",
        enctype: 'multipart/form-data',
        success: function(response) {
          if (response == 1) {
            swal.fire({
                title: "Sukses di update!",
                text: "Sukses data diubah",
                icon: "success",
                button: "OK!",
              })
              .then((value) => {
                location.reload();
              });

          } else {
            swal.fire({
                title: "Gagal di update!",
                text: "Data gagal diubah",
                icon: "error",
                button: "OK!",
              })
              .then((value) => {
                location.reload();
              });
          }
        }
      })

    }

    function showInformation() {
      swal.fire({
        icon: "info",
        title: "Information",
        text: "Tekan tombol selesai apabila pesanan sudah dibuat.",
        showConfirmButton: true,
        confirmButtonColor: "#3085d6",
        confirmButtonText: "Alright!",
      });
    }
  </script>
  <script>
    function simpan() {
      alert("This is a message")
    }
  </script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>

</html>