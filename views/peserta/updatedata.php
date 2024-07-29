<?php include_once('../../config/function.php'); ?>

<body>
    <?php
    if (isset($_POST["TblUpdate"])) {
        $db = dbConnect();
        if ($db->connect_errno == 0) {

            $id_peserta = $db->escape_string($_POST["id_peserta"]);
            $nama_peserta     = $db->escape_string($_POST["nama_peserta"]);
            $tempat_lahir = $db->escape_string($_POST["tempat_lahir"]);
            $tanggal_lahir = $db->escape_string($_POST["tanggal_lahir"]);
            $pendidikan = $db->escape_string($_POST["pendidikan"]);
            $telepon = $db->escape_string($_POST["telepon"]);
            $alamat = $db->escape_string($_POST["alamat"]);
            $id_koprasi = $db->escape_string($_POST["id_koprasi"]);
            $id_jenis_pelatihan = $db->escape_string($_POST["id_jenis_pelatihan"]);

            if ($_FILES["gambar"]["size"] != 0) {

                $file_name = $_FILES["gambar"]["name"];
                $tmp_name = $_FILES["gambar"]["tmp_name"];
                $new_name = md5(time()) . '.' . pathinfo($file_name, PATHINFO_EXTENSION);
                $folder = "../../assets/img/peserta/" . $new_name;
                move_uploaded_file($tmp_name, $folder);
                $foto = "assets/img/peserta/" . $new_name;

                $query_foto_terkini = "select foto from tbl_peserta where id_peserta='$id_peserta'";
                $data = $db->query($query_foto_terkini);
                $row = $data->fetch_assoc();
                $foto_terkini = $row['foto'];
                unlink("../../" . $foto_terkini);


                $sql = "update tbl_peserta set nama_peserta='$nama_peserta',tempat_lahir='$tempat_lahir',tanggal_lahir='$tanggal_lahir',
                pendidikan='$pendidikan',telepon='$telepon', 
                alamat='$alamat',id_koprasi='$id_koprasi',id_jenis_pelatihan='$id_jenis_pelatihan', foto='$foto' where id_peserta='$id_peserta'"; // Eksekusi query update
                $res = $db->query($sql);
                if ($res) {
                    if ($db->affected_rows > 0) {
                        header("Location: ../../main.php?module=Peserta");
    ?>
                    <?php
                    } else {
                    ?>
                        <div class="box">
                            <div style="color: black">Data berhasil disimpan, namun hanya foto saja yang berubah.</div><br>
                            <a href=" ../../main.php?module=Peserta"><button>Kembali</button></a>
                        </div>
                    <?php
                    }
                } else {
                    ?>
                    <div class="box">
                        <div style="color: black">Data gagal diupdate, Silahkan Cek Kembali</div><br>
                        <a href="../../main.php?module=Peserta"><button>Kembali</button></a>
                    </div>

                    <?php
                }
            } else {
                $sql = "update tbl_peserta set nama_peserta='$nama_peserta',tempat_lahir='$tempat_lahir',tanggal_lahir='$tanggal_lahir',
                pendidikan='$pendidikan',telepon='$telepon', 
                alamat='$alamat',id_koprasi='$id_koprasi',id_jenis_pelatihan='$id_jenis_pelatihan' where id_peserta='$id_peserta'"; // Eksekusi query insert
                $res = $db->query($sql);
                if ($res) {
                    if ($db->affected_rows > 0) {
                        header("Location: ../../main.php?module=Peserta");
                    ?>
                    <?php
                    } else {
                    ?>
                        <div class="box">
                            <div style="color: black">Data berhasil disimpan,namun tidak ada perubahan data yang berarti.</div><br>
                            <a href="../../main.php?module=Peserta"><button>Kembali</button></a>
                        </div>
                    <?php
                    }
                } else {
                    ?>
                    <div class="box">
                        <div style="color: black">Data gagal diupdate, Silahkan Cek Kembali</div><br>
                        <a href="../../main.php?module=Peserta"><button>Kembali</button></a>
                    </div>

    <?php
                }
            }
        } else
            echo "<div style='color: white'>Gagal koneksi" . (DEVELOPMENT ? " : " . $db->connect_error : "") . "<br></div>";
    }
    ?>
</body>