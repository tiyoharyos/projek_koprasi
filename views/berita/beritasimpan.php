<?php include_once('../../config/function.php'); ?>

<body>
    <?php
    if (isset($_POST["TblSimpan"])) {
        $db = dbConnect();
        date_default_timezone_set('Asia/Jakarta');
        if ($db->connect_errno == 0) {
            $judul    = $db->escape_string($_POST["judul"]);
            $deskripsi = $db->escape_string($_POST["deskripsi"]);
            $penulis = $db->escape_string($_POST["penulis"]);
            $tempat = $db->escape_string($_POST["tempat"]);
            $tanggal = date("Y-m-d");
            $jam = date("H:i");

            $file_name = $_FILES["gambar"]["name"];
            $tmp_name = $_FILES["gambar"]["tmp_name"];
            $new_name = md5(time()) . '.' . pathinfo($file_name, PATHINFO_EXTENSION);
            $folder = "../../assets/img/berita/" . $new_name;
            move_uploaded_file($tmp_name, $folder);
            $gambar = "assets/img/berita/" . $new_name;
        }
        // Susun query insert
        $sql = "INSERT INTO tbl_berita(judul,deskripsi,gambar,penulis,tanggal,tempat,jam)
                VALUES('$judul','$deskripsi','$gambar', '$penulis' , '$tanggal', '$tempat' , '$jam')";
        // Eksekusi query insert
        $res = $db->query($sql);
        if ($res) {
            if ($db->affected_rows > 0) {
                header("Location: ../../main.php?module=berita");
    ?>
            <?php
            }
        } else {
            ?>
            <div class="box">
                <div style="color: white">Data gagal disimpan karena adanya kesalahan dalam memasukan data. Silahkan Cek Kembali</div><br>
                <a href="javascript:history.back()"><button>Kembali</button></a>
            </div>

    <?php
        }
    } else
        echo "<div style='color: white'>Gagal koneksi" . (DEVELOPMENT ? " : " . $db->connect_error : "") . "<br></div>";

    ?>
</body>