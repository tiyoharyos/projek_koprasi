<?php include_once('../../config/function.php'); ?>

<body>
    <?php
    if (isset($_POST["TblSimpan"])) {
        $db = dbConnect();
        if ($db->connect_errno == 0) {
            $nama_koprasi     = $db->escape_string($_POST["nama_koprasi"]);
            $alamat = $db->escape_string($_POST["alamat"]);
            $badan_hukum = $db->escape_string($_POST["badan_hukum"]);
            $telepon = $db->escape_string($_POST["telepon"]);
            $jenis_usaha = $db->escape_string($_POST["jenis_usaha"]);
            $jadwal_pelatihan = $db->escape_string($_POST["jadwal_pelatihan"]);
            $email = $db->escape_string($_POST["email"]);
        }
        // Susun query insert
        $sql = "INSERT INTO tbl_koprasi(nama_koprasi,badan_hukum,alamat,jenis_usaha,telepon,email,jadwal_pelatihan)
                VALUES('$nama_koprasi','$badan_hukum', '$alamat' , '$jenis_usaha', '$telepon', '$email','$jadwal_pelatihan')";
        // Eksekusi query insert
        $res = $db->query($sql);
        if ($res) {
            if ($db->affected_rows > 0) {
                header("Location: ../../main.php?module=koprasi");
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