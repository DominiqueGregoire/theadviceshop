<?php include("dbconnect.php"); ?>

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
// define variables and set to empty values
$usernameErr = $emailErr = $passwordErr = "";
$username = $email = $password = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // check the username
    if (empty($_POST["username"])) {
        $usernameErr = "Username is required";
    } else {
        $username = test_input($_POST["username"]);
// check if username only contains letters and numbers
        if (!preg_match("/^[a-zA-Z-\d)]*$/", $username)) {
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

    //check the password
    if (empty($_POST["password"])) {
        $passwordErr = "Password is required";
    } else {
        $password = test_input($_POST["password"]);
// check if password has 8 characters and contains at least 1 uppercase, 1 lowercase, 1 number
        if (!preg_match("/^[a-zA-Z\d]*$/", $password) || strlen($password) < 9) {
            $passwordErr = "Password must have 8 characters and contain one number, one uppercase and 
        one lowercase letter.";
        } else {
            echo "You have successfully signed up, Click on login to login";
        }
    }
} //end else

// create the test input function
function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
} //end test-input
?>

<h2 id="h2signup">Sign Up Form</h2>
<div id="box">
    <p><span class="error">* required fields</span></p>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <div id="container">
            <form action="register.php" method="post">
                Username : <input type="text" name="username" value="<?php echo $username; ?>">
                <span class="error">*<?php echo $usernameErr; ?></span> <br><br>
                Email: <input type="text" name="email" value="<?php echo $email; ?>">
                <span class="error">*<?php echo $emailErr; ?></span> <br><br>
                Password : <input type="text" name="password" value="<?php echo $password; ?>">
                <span class="error">*<?php echo $passwordErr; ?></span> <br><br>
                <input class="signupbutton" type="submit" name="submit" value="Sign up"><br><br>
                <a href="login.php">Click to log in</a><br><br>
            </form>
        </div>
    </form>
</div>
<?php include("inc_footer.php"); ?>
</body>
