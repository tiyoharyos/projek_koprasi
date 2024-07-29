<?php
// panggil file "database.php" untuk koneksi ke database
require_once "config/function.php";



// pemanggilan file halaman konten sesuai "module" yang dipilih

if ($_GET['module'] == 'login') {
    include "views/login/login.php";
} elseif ($_GET['module'] == 'dashboard') {
    // panggil file tampil data dashboard
    include "views/dsahboard/dashboard.php";
}
// jika module yang dipilih "koprasi"
elseif ($_GET['module'] == 'koprasi') {
    // panggil file tampil data koprasi
    include "views/koprasi/koprasi.php";
} elseif ($_GET['module'] == 'Peserta') {
    // panggil file tampil data peserta
    include "views/peserta/peserta.php";
} elseif ($_GET['module'] == 'detail' && $_GET['id_peserta'] != '') {
    // panggil file tampil detail data peserta
    include "views/peserta/detail.php";
} elseif ($_GET['module'] == 'pegawai') {
    // panggil file tampil detail data peserta
    include "views/pegawai/pegawai.php";
} elseif ($_GET['module'] == 'status') {
    // panggil file tampil detail data peserta
    include "views/persetujuan/data_persetujuan.php";
} elseif ($_GET['module'] == 'berita') {
    include "views/berita/berita.php";
}
