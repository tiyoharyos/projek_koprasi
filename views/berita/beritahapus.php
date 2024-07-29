<?php include_once('../../config/function.php'); ?>

<body>
    <?php
    if (isset($_POST["TblHapus"])) {
        $db = dbConnect();
        if ($db->connect_errno == 0) {
            $id = $db->escape_string($_POST["id"]);

            // hapus foto
            $query_gambar_terkini = "select gambar from tbl_berita where id='$id'";
            $data = $db->query($query_gambar_terkini);
            $row = $data->fetch_assoc();
            $gambar_terkini = $row['gambar'];
            unlink("../../" . $gambar_terkini);

            // Susun query delete
            $sql = "DELETE FROM tbl_berita WHERE id='$id'";
            // Eksekusi query delete
            $res = $db->query($sql);
            if ($res) {
                if ($db->affected_rows > 0) {
                    header("Location:../../main.php?module=berita");
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