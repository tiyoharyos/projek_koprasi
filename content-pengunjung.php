
<?php
// panggil file "database.php" untuk koneksi ke database
require_once "config/function.php";



// pemanggilan file halaman konten sesuai "module" yang dipilih

if ($_GET['module'] == 'dashboard') {
    // panggil file tampil login dashboard
    include "views/pengunjung/dashboard/dashboard.php";
}
if ($_GET['module'] == 'index') {
    // panggil file tampil login dashboard
    include "index.php";
} elseif ($_GET['module'] == 'peserta') {
    // panggil file tampil login dashboard
    include "views/pengunjung/data_peserta/peserta.php";
} elseif ($_GET['module'] == 'detail' && $_GET['id_peserta'] != '') {
    // panggil file tampil detail data peserta
    include "views/pengunjung/data_peserta/detail.php";
} elseif ($_GET['module'] == 'koprasi') {
    // panggil file tampil login dashboard
    include "views/pengunjung/data_koprasi/koprasi.php";
}
elseif ($_GET['module'] == 'berita') {
    // panggil file tampil login dashboard
    include "views/pengunjung/berita/berit-pengunjung.php";
}
