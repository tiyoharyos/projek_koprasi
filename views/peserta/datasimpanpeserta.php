<?php include_once('../../config/function.php'); ?>
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
                    <h5 class="modal-title" id="exampleModalLabel">Konfirmasi Logout</h5>
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

    <body>
        <?php

        $db = dbConnect();
        $nama_peserta     = $db->escape_string($_POST["nama_peserta"]);
        $tempat_lahir = $db->escape_string($_POST["tempat_lahir"]);
        $tanggal_lahir = $db->escape_string($_POST["tanggal_lahir"]);
        $pendidikan = $db->escape_string($_POST["pendidikan"]);
        $telepon = $db->escape_string($_POST["telepon"]);
        $alamat = $db->escape_string($_POST["alamat"]);
        $id_koprasi = $db->escape_string($_POST["id_koprasi"]);
        $id_jenis_pelatihan = $db->escape_string($_POST["id_jenis_pelatihan"]);

        $query = $db->query("select max(id_peserta) as maxKode from tbl_peserta");
        $data = $query->fetch_array(MYSQLI_ASSOC);
        $id_peserta = $data['maxKode'];
        $tambahIdpeserta = (int) $id_peserta + 1;

        if ($_FILES["gambar"]["size"] == 0) {
            $file_name = "default photo.png";
            $new_name = md5(time()) . '.' . pathinfo($file_name, PATHINFO_EXTENSION);
            $sourceFilePath = "../../assets/img/" . $file_name;
            $destinationFilePath = "../../assets/img/peserta/" . $new_name;

            if (copy($sourceFilePath, $destinationFilePath)) {
                $folder = "../../assets/img/peserta/" . $new_name;
                $foto = "assets/img/peserta/" . $new_name;
            } else {
                echo "Failed to copy file.";
            }
        } else {
            $file_name = $_FILES["gambar"]["name"];
            $tmp_name = $_FILES["gambar"]["tmp_name"];
            $new_name = md5(time()) . '.' . pathinfo($file_name, PATHINFO_EXTENSION);
            $folder = "../../assets/img/peserta/" . $new_name;
            move_uploaded_file($tmp_name, $folder);
            $foto = "assets/img/peserta/" . $new_name;
        }


        // Susun query insert
        $sql = "INSERT INTO tbl_peserta(id_peserta,nama_peserta,tempat_lahir, tanggal_lahir, pendidikan, telepon, alamat, id_koprasi, id_jenis_pelatihan, foto) 
        VALUES($tambahIdpeserta,'$nama_peserta','$tempat_lahir', '$tanggal_lahir', '$pendidikan', '$telepon', '$alamat', '$id_koprasi', '$id_jenis_pelatihan', '$foto')";
        // Eksekusi query insert
        $res = $db->query($sql);
        if ($db->affected_rows > 0) {
            echo '<div class="alert alert-success" role="alert" align="center">
                        <h4 class="alert-heading">Well done!</h4>
                        <p>Berhasil Tambah Menu</p>
                        <a href="javascript:history.back()"><button>Kembali</button></a>
                    </div>';
        } else {

            echo '<div class="alert alert-danger" role="alert" align="center">
                    <h4 class="alert-heading">Warning!</h4>
                    <p>Gagal Tambah Menu, Cek Kembali ID Menu</p>
                    <a href="javascript:history.back()" class="btn btn-danger">Kembali</a>
                   </div>';
        }
        ?>
    </body>

    <!-- SCRIPTS -->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/aos.js"></script>
    <script src="assets/js/owl.carousel.min.js"></script>
    <script src="assets/js/smoothscroll.js"></script>
    <script src="assets/js/custom.js"></script>
    <script>