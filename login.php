<?php
error_reporting(E_ALL);
session_start();
$_SESSION['uname'] = $_REQUEST['username'];
$_SESSION['pword'] = $_REQUEST['password'];

echo $_GET['page'];
header("Location: ".$_GET['page'].".php");
exit();