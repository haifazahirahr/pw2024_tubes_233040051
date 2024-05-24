<?php
session_start();
$_SESSION = [];
session_unset();
session_destroy();

setcookie('id', NULL, time() - 3600);
setcookie('key', NULL, time() - 3600);


header("Location: login.php");
exit;
