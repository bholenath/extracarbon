<?php
session_start();
session_unset();
//$_SESSION = array();
session_destroy();
mysql_close($conn);
header("location:index.php");
exit();
?>