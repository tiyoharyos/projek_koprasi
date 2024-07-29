<?php include_once('../../config/function.php'); ?>

<body>
    <?php
    if (isset($_POST["TblHapus"])) {
        $db = dbConnect();
        if ($db->connect_errno == 0) {
            $id_pegawai = $db->escape_string($_POST["id_pegawai"]);

            // hapus foto
            $query_foto_terkini = "select foto from tbl_pegawai where id_pegawai='$id_pegawai'";
            $data = $db->query($query_foto_terkini);
            $row = $data->fetch_assoc();
            $foto_terkini = $row['foto'];
            unlink("../../" . $foto_terkini);

            // Susun query delete
            $sql = "DELETE FROM tbl_pegawai WHERE id_pegawai='$id_pegawai'";
            // Eksekusi query delete
            $res = $db->query($sql);
            if ($res) {
                if ($db->affected_rows > 0) { 
                    header("Location:../../main.php?module=pegawai");
    ?>
                <?php
                }
            } else {
                ?>
                <div class="box">
                    <div style="color: black">Data gagal Dihapus</div><br>
                    <a href="javascript:history.back()"><button>Kembali</button></a>
                </div>

    <?php
            }
        } else
            echo "<div style='color: black'>Gagal koneksi" . (DEVELOPMENT ? " : " . $db->connect_error : "") . "<br></div>";
    }
    ?>
</body>