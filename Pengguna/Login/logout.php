<?php
session_start();

$_SESSION = array();

session_destroy();

header("location: /eventify/body/index.php");
exit;
?>
