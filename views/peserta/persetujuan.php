<?php include_once('../../config/function.php'); ?>

<?php

$db = dbConnect();

if ($db->connect_errno == 0) {

    $id_peserta = $_GET['id_peserta'];
    $status = $_GET['status'];

    $sql = "update tbl_peserta set status='$status' where id_peserta=$id_peserta";
    $res = $db->query($sql);
    if ($res) {
        if ($db->affected_rows > 0) {
            header("Location: ../../main.php?module=Peserta");
?>
        <?php
        }
    } else {
        ?>
        <div class="box">
            <div style="color: black">Data gagal diupdate, Silahkan Cek Kembali</div><br>
            <a href="../../main.php?module=status"><button>Kembali</button></a>
        </div>

<?php
    }
} else
    echo "<div style='color: white'>Gagal koneksi" . (DEVELOPMENT ? " : " . $db->connect_error : "") . "<br></div>";

?>