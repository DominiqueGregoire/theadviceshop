<?php include("dbconnect.php");
include("inc_nav.php");

// define variables and set to empty values
$usernameErr = $emailErr = $passwordErr = "";
$username = $email = $password = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    list($usernameErr, $username, $emailErr, $email) = extracted($usernameErr, $username, $emailErr, $email);

    if (empty($_POST["password"])) {
        $passwordErr = "Password is required";
    } else {
        $password = test_input($_POST["password"]);

// check if password has 8 characters and contains at least 1 uppercase, 1 lowercase, 1 number
        if (!preg_match("/^[a-zA-Z\d]*$/", $password) || strlen($password) < 9)  {
            $passwordErr = "Password must have 8 characters and contain one number, one uppercase and one lowercase letter.";
        } //endiff
    } //end else

    function test_input($data)  {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    } //end test-input
}?>