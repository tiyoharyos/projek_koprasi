<?php include_once('../../config/function.php'); ?>
<?php
$db = dbConnect();
if ($db->connect_errno == 0) {
    if (isset($_POST["signin"])) {
        $username = $db->escape_string($_POST['username']);
        $pass = $db->escape_string($_POST['your_pass']);
        $sql = "SELECT * FROM tbl_admin WHERE username='$username' AND password='$pass'";
        $res = $db->query($sql);
        if ($res) {
            if ($res->num_rows == 1) {
                $data = $res->fetch_assoc();
                session_start();
                $_SESSION["id"] = $data["id"];
                $_SESSION["passphrase"] = openssl_random_pseudo_bytes(16);
                $_SESSION["iv"] = openssl_random_pseudo_bytes(16);
                header("Location:../../main.php?module=dashboard");
            } else
                header("Location: login.php?error=1");
        }
    } else
        header("Location: login.php?error=2");
} else
    header("Location: login.php?error=3");
