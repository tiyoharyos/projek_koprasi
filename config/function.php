<?php
define("DEVELOPMENT", TRUE);
function dbConnect()
{
  $db = mysqli_connect("localhost", "root", "", "koprasi");
  return $db;
}

function showError($message)
{
?>
  <div style="background-color:#FAEBD7;padding:10px;border:1px solid red;margin:15px 0px">
    <?php echo $message; ?>
  </div>
<?php
}
