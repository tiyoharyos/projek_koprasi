 <?php
  require_once " ../../config/function.php";
  $db = dbConnect();
  $data_koprasi = mysqli_query($db, "SELECT * FROM tbl_koprasi");
  $jumlah_koprasi = mysqli_num_rows($data_koprasi);

  $data_peserta = mysqli_query($db, "SELECT peserta.id_peserta, peserta.nama_peserta, peserta.telepon, peserta.foto, peserta.status,
  koprasi.nama_koprasi FROM tbl_peserta peserta
  INNER JOIN tbl_koprasi koprasi ON peserta.id_koprasi = koprasi.id_koprasi
  WHERE status = 'diterima'");
  $jumlah_peserta = mysqli_num_rows($data_peserta);
  ?>

 <div class="d-flex flex-column flex-lg-row mb-4">
   <!-- judul halaman -->
   <div class="flex-grow-1 d-flex align-items-center">
     <h3>Dashboard</h3>
   </div>

 </div>

 <!-- tampilkan pesan selamat datang -->
 <div class="bg-white rounded-4 shadow-sm p-4 mb-5">
   <div class="row align-items-center justify-content-between">
     <div class="col-lg-3 d-block mt-xxl-n4">
       <img class="img-fluid px-xl-4 mt-xxl-n5" src="assets/img/bg-dashboard.jpg">
     </div>
     <div class="col-lg-9">
       <h4 class="mt-3 mt-lg-0 mb-2">Selamat datang di <strong>LAPENKOPDA</strong>!</h4>
       <p class="text-muted fw-light mb-4">Meningkatkan keberdayaan gerakan koperasi melalui pendidikan dan pelatihan.</p>
     </div>
   </div>
 </div>
 <div class="row">
   <div class="col-sm-6">
     <div class="card">
       <div class="card-body">
         <h5 class="card-title">Total Koprasi Yang Mengikuti Pelatihan</h5>
         <p class="card-text">Jumlah Koprasi : <?= $jumlah_koprasi; ?></p>
         <a href="?module=koprasi" class="btn btn-primary">Lihat Data</a>
       </div>
     </div>
   </div>
   <div class="col-sm-6">
     <div class="card">
       <div class="card-body">
         <h5 class="card-title">Total Peserta Yang Mengikuti Pelatihan</h5>
         <p class="card-text">Jumlah Peserta : <?= $jumlah_peserta; ?></p>
         <a href="?module=Peserta" class="btn btn-primary">Lihat Data</a>
       </div>
     </div>
   </div>
 </div>