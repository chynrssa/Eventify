<?php
session_start();
session_unset();    
session_destroy();  


header("Location: ../../pengguna/login/login.php");
exit;
?>
