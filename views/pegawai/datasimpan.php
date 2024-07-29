<?php include_once('../../config/function.php'); ?>

<body>
    <?php
    if (isset($_POST["TblSimpan"])) {
        $db = dbConnect();
        if ($db->connect_errno == 0) {
            $nama_pegawai     = $db->escape_string($_POST["nama_pegawai"]);
            $tempat_lahir = $db->escape_string($_POST["tempat_lahir"]);
            $tanggal_lahir = $db->escape_string($_POST["tanggal_lahir"]);
            $nomer_telepon = $db->escape_string($_POST["nomer_telepon"]);
            $alamat = $db->escape_string($_POST["alamat"]);
            $query = $db->query("select max(id_pegawai) as maxKode from tbl_pegawai");
            $data = $query->fetch_array(MYSQLI_ASSOC);
            $id_pegawai = $data['maxKode'];
            $tambahIdpeserta = (int) $id_pegawai + 1;

            if ($_FILES["gambar"]["size"] == 0) {
                $file_name = "default photo.png";
                $new_name = md5(time()) . '.' . pathinfo($file_name, PATHINFO_EXTENSION);
                $sourceFilePath = "../../assets/img/" . $file_name;
                $destinationFilePath = "../../assets/img/pegawai/" . $new_name;

                if (copy($sourceFilePath, $destinationFilePath)) {
                    $folder = "../../assets/img/pegawai/" . $new_name;
                    $foto = "assets/img/pegawai/" . $new_name;
                } else {
                    echo "Failed to copy file.";
                }
            } else {
                $file_name = $_FILES["gambar"]["name"];
                $tmp_name = $_FILES["gambar"]["tmp_name"];
                $new_name = md5(time()) . '.' . pathinfo($file_name, PATHINFO_EXTENSION);
                $folder = "../../assets/img/pegawai/" . $new_name;
                move_uploaded_file($tmp_name, $folder);
                $foto = "assets/img/pegawai/" . $new_name;
            }
        }
        // Susun query insert
        $sql = "INSERT INTO tbl_pegawai(id_pegawai,nama_pegawai,tempat_lahir, tanggal_lahir,  nomer_telepon, alamat, foto) 
        VALUES($tambahIdpeserta,'$nama_pegawai','$tempat_lahir', '$tanggal_lahir', '$nomer_telepon', '$alamat', '$foto')";
        // Eksekusi query insert
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
                <div style="color: white">Data gagal disimpan karena adanya kesalahan dalam memasukan data. Silahkan Cek Kembali</div><br>
                <a href="javascript:history.back()"><button>Kembali</button></a>
            </div>

    <?php
        }
    } else
        echo "<div style='color: white'>Gagal koneksi" . (DEVELOPMENT ? " : " . $db->connect_error : "") . "<br></div>";

    ?>
</body>