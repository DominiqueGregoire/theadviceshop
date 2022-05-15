<?php include("dbconnect.php") ?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>The Advice Shop - Sample Advice</title>
    <!--    <link href="styles/css/mainstyles.css" rel="stylesheet" type="text/css" media="screen">-->
    <link href="/css/index.css" rel="stylesheet" type="text/css" media="screen">
</head>

<body>

<?php include("inc_header.php");
include("inc_nav.php"); ?>

<?php
//error_reporting(E_ALL);
session_start();
$_SESSION['username'] = $_REQUEST['username'];
$_SESSION['password'] = $_REQUEST['password'];

// define variables and set to empty values
$username = $password = "";
$usernameErr = $passwordErr = "";

// check that the username and password are correct
// there is an issue here that if wrong username or password is entered, no error message is displayed
$msg = '';
if (isset($_POST['login']) && !empty($_POST['username'])
    && !empty($_POST['password'])) {
    if (($_POST['username'] == $_SESSION['username']) &&
        $_POST['password'] == $_SESSION['password']) {
        $_SESSION['valid'] = true;
        $_SESSION['timeout'] = time();
        $_SESSION['username'] = $username;
        echo 'You have entered valid username and password';
    } else {
        echo 'Username and password are incorrect';
    }
}
?>

<h2 id="h2login">Login</h2>
<div id="box">
    <div id="container">
        <form action="login.php<?php htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            Username : <input type="text" name="username" value="<?php echo $username; ?>">
            <span class="error">*<?php echo $usernameErr; ?></span> <br><br>
            Password : <input type="text" name="password" value="<?php echo $password; ?>">
            <span class="error">*<?php echo $passwordErr; ?></span> <br><br>
            <input class="loginbutton" type="submit" name="submit" value="Login"><br><br>

            <a href="register.php">Signup</a><br><br>
        </form>
    </div>
</div>
<?php include("inc_footer.php"); ?>
</body>

