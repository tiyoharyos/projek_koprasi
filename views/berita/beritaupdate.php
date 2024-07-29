<?php include_once('../../config/function.php'); ?>

<body>
    <?php
    if (isset($_POST["TblUpdate"])) {
        $db = dbConnect();
        date_default_timezone_set('Asia/Jakarta');
        if ($db->connect_errno == 0) {

            $id = $db->escape_string($_POST["id"]);
            $judul    = $db->escape_string($_POST["judul"]);
            $deskripsi = $db->escape_string($_POST["deskripsi"]);
            $penulis = $db->escape_string($_POST["penulis"]);
            $tempat = $db->escape_string($_POST["tempat"]);
            $tanggal = date("Y-m-d");
            $jam = date("H:i");

            if ($_FILES["gambar"]["size"] != 0) {

                $file_name = $_FILES["gambar"]["name"];
                $tmp_name = $_FILES["gambar"]["tmp_name"];
                $new_name = md5(time()) . '.' . pathinfo($file_name, PATHINFO_EXTENSION);
                $folder = "../../assets/img/berita/" . $new_name;
                move_uploaded_file($tmp_name, $folder);
                $gambar = "assets/img/berita/" . $new_name;

                $query_gambar_terkini = "select gambar from tbl_berita where judul='$judul'";
                $data = $db->query($query_gambar_terkini);
                $row = $data->fetch_assoc();
                $gambar_terkini = $row['gambar'];
                unlink("../../" . $gambar_terkini);


                $sql = "update tbl_berita set judul='$judul',deskripsi='$deskripsi',penulis='$penulis',
                tempat='$tempat', tanggal='$tanggal',jam='$jam', gambar='$gambar' where id= $id"; // Eksekusi query update
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
                        <div style="color: black">Data gagal diupdate, Silahkan Cek Kembali</div><br>
                        <a href="../../main.php?module=berita"><button>Kembali</button></a>
                    </div>

                    <?php
                }
            } else {
                $sql = "update tbl_berita set judul='$judul',deskripsi='$deskripsi',penulis='$penulis',
                tempat='$tempat' where id= $id"; // Eksekusi query update
                $res = $db->query($sql);
                if ($res) {
                    if ($db->affected_rows > 0) {
                        header("Location: ../../main.php?module=berita");
                    ?>
                    <?php
                    } else {
                    ?>
                        <div class="box">
                            <div style="color: black">Data berhasil disimpan,namun tidak ada perubahan data yang berarti.</div><br>
                            <a href="../../main.php?module=berita"><button>Kembali</button></a>
                        </div>
                    <?php
                    }
                } else {
                    ?>
                    <div class="box">
                        <div style="color: black">Data gagal diupdate, Silahkan Cek Kembali</div><br>
                        <a href="../../main.php?module=berita"><button>Kembali</button></a>
                    </div>

    <?php
                }
            }
        } else
            echo "<div style='color: white'>Gagal koneksi" . (DEVELOPMENT ? " : " . $db->connect_error : "") . "<br></div>";
    }
    ?>
</body>