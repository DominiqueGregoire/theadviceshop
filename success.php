<?php include("dbconnect.php"); ?>

<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>The Advice Shop - Sample Advice</title>
<link href="styles/mainstyles.css" rel="stylesheet" type="text/css" media="screen">
</head>

<body>

<?php include("inc_header.php");
include("inc_nav.php"); ?>

Welcome <?php echo $_POST["fname"]; ?><br>
You have successfully signed up. <br>
Please return to login page

<?php include("inc_footer.php"); ?>

</body>


