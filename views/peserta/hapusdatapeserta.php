<?php include_once('../../config/function.php'); ?>

<body>
    <?php
    if (isset($_POST["TblHapus"])) {
        $db = dbConnect();
        if ($db->connect_errno == 0) {
            $id_peserta = $db->escape_string($_POST["id_peserta"]);

            // hapus foto
            $query_foto_terkini = "select foto from tbl_peserta where id_peserta='$id_peserta'";
            $data = $db->query($query_foto_terkini);
            $row = $data->fetch_assoc();
            $foto_terkini = $row['foto'];
            unlink("../../" . $foto_terkini);

            // Susun query delete
            $sql = "DELETE FROM tbl_peserta WHERE id_peserta='$id_peserta'";
            // Eksekusi query delete
            $res = $db->query($sql);
            if ($res) {
                if ($db->affected_rows > 0) {
                    header("Location:../../main.php?module=Peserta");
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
    }
    ?>
</body>