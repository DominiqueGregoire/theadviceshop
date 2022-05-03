<?php include("dbconnect.php"); ?>

// define variables and set to empty values
$fnameErr = $emailErr = $pwordErr = "";
$fname = $email = $pword = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
if (empty($_POST["fname"])) {
$nameErr = "First Name is required";
} else {
$fname = test_input($_POST["fname"]);
// check if first name only contains letters and whitespace
if (!preg_match("/^[a-zA-Z-' ]*$/",$fname)) {
$fnameErr = "Only letters and white space allowed";
}
}

if (empty($_POST["lname"])) {
$nameErr = "Last Name is required";
} else {
$lname = test_input($_POST["lname"]);
// check if first name only contains letters and whitespace
if (!preg_match("/^[a-zA-Z-' ]*$/",$lname)) {
$lnameErr = "Only letters and white space allowed";
}
}

if (empty($_POST["email"])) {
$emailErr = "Email is required";
} else {
$email = test_input($_POST["email"]);
// check if e-mail address is well-formed
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
$emailErr = "Invalid email format";
}
}

if (empty($_POST["pword"])) {
$pwordErr = "Password is required";
} else {
$pword = test_input($_POST["pword"]);

// check if password has 8 characters and contains at least 1 uppercase, 1 lowercase, 1 number
if (!preg_match("/^[a-zA-Z-o=0-9]*$/",$pword) || strlen(&pword) < 9)  {
$lnameErr = "Password must have 8 characters and contain one number, one uppercase and one lowercase letter.";
}
}

function test_input($data) {
$data = trim($data);
$data = stripslashes($data);
$data = htmlspecialchars($data);
return $data;
}
?>


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
<p>Please note that your email address will become your username for this site</p>
<p><span class="error">* required fields</span></p>

<form  action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"
       method="post">
    First Name : <label>
        <input type="text" name="fname">
    </label><br>
    Last Name : <label>
        <input type="text" name="lname">
    </label><br>
    Email : <label>
        <input type="text" name="email">
    </label><br>
    Password : <label>
        <input type="text" name="pword">
    </label><br>
    <input type="submit">
</form>

<?php //include("inc_footer.php"); ?>
</body>
