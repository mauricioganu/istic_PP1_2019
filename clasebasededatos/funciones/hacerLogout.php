<?php
session_start();
$_SESSION=null;
session_destroy();
header("Location: /clasebasededatos/index.php");
?>