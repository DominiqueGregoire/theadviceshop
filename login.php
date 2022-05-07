<?php include("dbconnect.php")?>

<?php
error_reporting(E_ALL);
session_start();
$_SESSION['username'] = $_REQUEST['username'];
$_SESSION['password'] = $_REQUEST['password'];

//echo $_GET['page'];
//header("Location: " . $_GET['page'] . ".php");
//exit();
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>The Advice Shop - Sample Advice</title>
    <link href="styles/mainstyles.css" rel="stylesheet" type="text/css" media="screen">
</head>

<body>

<?php include("inc_header.php");include("inc_nav.php");?>

<div id="box">
    <form action="login.php"
          method="post">
        Username : <input type="text" name="username"><br><br>
        Password : <input type="text" name="password"><br><br>

       <input type="button" value="login"><br><br>

        <a href="register.php">Signup</a><br><br>
    </form>
</div>

<?php //include("inc_footer.php"); ?>
</body>
<!--        action="--><?php //echo htmlspecialchars($_SERVER["PHP_SELF"]);?><!--"-->

