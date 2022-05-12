<?php
session_start();
$_SESSION = array(); // empty array
session_destroy();
header("location:index.php");
//header("Location:".$_GET['page'].".php");
exit();
