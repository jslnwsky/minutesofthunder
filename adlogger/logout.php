<?php
session_start();
session_destroy();
setcookie("adminglog_cookie", "", time()-31536000, "/");
header("Location: ./login.php");
exit;
?>