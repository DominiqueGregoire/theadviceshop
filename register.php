<?php include("dbconnect.php");
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>The Advice Shop - Sample Advice</title>
    <link href="styles/mainstyles.css" rel="stylesheet" type="text/css" media="screen">
</head>

<body>
<?php include("inc_header.php");include("inc_nav.php"); ?>

<?php
// define variables and set to empty values
$usernameErr = $emailErr = $passwordErr = "";
$username = $email = $password = "";

//if the form is submitted validate it else skip and display a blank form
// check the username
/**
 * @param string $usernameErr
 * @param string $username
 * @param string $emailErr
 * @param string $email
 * @return array
 */
function extracted(string $usernameErr, string $username, string $emailErr, string $email): array
{
    if (empty($_POST["username"])) {
        $usernameErr = "Username is required";
    } else {
        $username = test_input($_POST["username"]);
// check if username only contains letters and numbers
        if (!preg_match("/^[a-zA-Z-\d) ]*$/", $username)) {
            $usernameErr = "No spaces,only letters and numbers allowed";
        }
    }

//check the email
    if (empty($_POST["email"])) {
        $emailErr = "Email is required";
    } else {
        $email = test_input($_POST["email"]);
// check if e-mail address is well-formed
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Invalid email format";
        }
    }
    return array($usernameErr, $username, $emailErr, $email);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    list($usernameErr, $username, $emailErr, $email) = extracted($usernameErr, $username, $emailErr, $email);

//check the password
if (empty($_POST["password"])) {
$passwordErr = "Password is required";
} else {
$password = test_input($_POST["password"]);
// check if password has 8 characters and contains at least 1 uppercase, 1 lowercase, 1 number
    if (!preg_match("/^[a-zA-Z\d]*$/", $password) || strlen($password) < 9)  {
        $passwordErr = "Password must have 8 characters and contain one number, one uppercase and 
        one lowercase letter.";
    }
} //end else

// create the test input function
function test_input($data)  {
$data = trim($data);
$data = stripslashes($data);
$data = htmlspecialchars($data);
return $data;
} //end test-input
}
?>

<h1>Sign Up Form</h1>

<div class="register">
    <p><span class="error">required field</span></p>

    <form  action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"
           method="post">

        Username : <label>
            <input type="text" name="username" value="<?php echo $username;?>">
            </label>
        <span class="error">* <?php echo $usernameErr;?></span>
        <br><br>

        Email : <label>
            <input type="text" name="email" value="<?php echo $email;?>">
            </label>
        <span class="error">* <?php echo $emailErr;?></span>
        <br><br>

        Password : <label>
            <input type="text" name="password" value="<?php echo $password;?>">
            </label>
        <span class="error">* <?php echo $passwordErr;?></span>
        <br><br>
        <span><input type="submit" name="submit" value="Submit"></span>
        <br><br>
    </form>

</div>


<?php include("inc_footer.php"); ?>
</body>
