<?php

// check whether a user is logged in
function check_login() {

    // check if username exists
    if(isset($_SESSION['username'])) {
        $username = $_SESSION['username'];

        if ($username) {
            $user_data = $_GET($username);
            return $username;
        }
    }

    // redirect to login
    header("Location: login.php");
}
