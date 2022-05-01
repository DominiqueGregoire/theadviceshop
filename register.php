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

<h1>Sign Up Form</h1>

<div id="content">
    <form action="success.php" method="post">
        First Name : <input type="text" name="fname"><br>
        Last Name : <input type="text" name="lname"><br>
        Email :      <input type="text" name="email"><br>
        UserName :   <input type="text" name="uname"><br>
        Password :   <input type="text" name="pword"><br>
        <input type="submit">
    </form>
</div>

<?php include("inc_footer.php"); ?>
</body>
