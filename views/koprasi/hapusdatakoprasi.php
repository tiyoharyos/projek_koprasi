<?php include_once('../../config/function.php'); ?>

<body>
    <?php
    if (isset($_POST["TblHapus"])) {
        $db = dbConnect();
        if ($db->connect_errno == 0) {
            $id_koprasi = $db->escape_string($_POST["id_koprasi"]);
            // Susun query delete
            $sql = "DELETE FROM tbl_koprasi WHERE id_koprasi='$id_koprasi'";
            // Eksekusi query delete
            $res = $db->query($sql);
            if ($res) {
                if ($db->affected_rows > 0) { 
                    header("Location:../../main.php?module=koprasi");
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