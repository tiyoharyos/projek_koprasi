<?php include_once('../../config/function.php'); ?>
<body>
    <?php
    if (isset($_POST["TblUpdate"])) {
        $db = dbConnect();
        if ($db->connect_errno == 0) {

            $id_pegawai = $db->escape_string($_POST["id_pegawai"]);
            $nama_pegawai    = $db->escape_string($_POST["nama_pegawai"]);
            $tempat_lahir = $db->escape_string($_POST["tempat_lahir"]);
            $tanggal_lahir = $db->escape_string($_POST["tanggal_lahir"]);
            $nomer_telepon = $db->escape_string($_POST["nomer_telepon"]);
            $alamat = $db->escape_string($_POST["alamat"]);

            if ($_FILES["gambar"]["size"] != 0) {

                $file_name = $_FILES["gambar"]["name"];
                $tmp_name = $_FILES["gambar"]["tmp_name"];
                $new_name = md5(time()) . '.' . pathinfo($file_name, PATHINFO_EXTENSION);
                $folder = "../../assets/img/pegawai/" . $new_name;
                move_uploaded_file($tmp_name, $folder);
                $foto = "assets/img/pegawai/" . $new_name;

                $query_foto_terkini = "select foto from tbl_pegawai where nama_pegawai='$nama_pegawai'";
                $data = $db->query($query_foto_terkini);
                $row = $data->fetch_assoc();
                $foto_terkini = $row['foto'];
                unlink("../../" . $foto_terkini);


                $sql = "update tbl_pegawai set nama_pegawai='$nama_pegawai',tempat_lahir='$tempat_lahir',tanggal_lahir='$tanggal_lahir',
                nomer_telepon='$nomer_telepon', alamat='$alamat', foto='$foto' where id_pegawai= $id_pegawai"; // Eksekusi query update
                $res = $db->query($sql);
                if ($res) {
                    if ($db->affected_rows > 0) { 
                        header("Location: ../../main.php?module=pegawai");
    ?>
                    <?php
                    }
                } else {
                    ?>
                    <div class="box">
                        <div style="color: black">Data gagal diupdate, Silahkan Cek Kembali</div><br>
                        <a href="../../main.php?module=pegawai"><button>Kembali</button></a>
                    </div>

                    <?php
                }
            } else {
                $sql = "update tbl_pegawai set nama_pegawai='$nama_pegawai',tempat_lahir='$tempat_lahir',tanggal_lahir='$tanggal_lahir',
                nomer_telepon='$nomer_telepon', alamat='$alamat' where id_pegawai= $id_pegawai"; // Eksekusi query update
                $res = $db->query($sql);
                if ($res) {
                    if ($db->affected_rows > 0) {
                        header("Location: ../../main.php?module=pegawai");
                    ?>
                    <?php
                    } else {
                    ?>
                        <div class="box">
                            <div style="color: black">Data berhasil disimpan,namun tidak ada perubahan data yang berarti.</div><br>
                            <a href="../../main.php?module=pegawai"><button>Kembali</button></a>
                        </div>
                    <?php
                    }
                } else {
                    ?>
                    <div class="box">
                        <div style="color: black">Data gagal diupdate, Silahkan Cek Kembali</div><br>
                        <a href="../../main.php?module=pegawai"><button>Kembali</button></a>
                    </div>

    <?php
                }
            }
        } else
            echo "<div style='color: white'>Gagal koneksi" . (DEVELOPMENT ? " : " . $db->connect_error : "") . "<br></div>";
    }
    ?>
</body>