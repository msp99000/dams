<?php

include "../config/connection.php";
include "authenticate.php";

$database = new Database();
$conn = $database->getConnection();

$userAuth = new UserAuth($conn);

if (isset($_POST['login-button'])) {
    $userType = $_POST['user-type'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    $result = $userAuth->login($userType, $username, $password);

    if ($result === true) {
        if ($userType == "Administrator") {
            header("Location: ../admin/index.php");
        } elseif ($userType == "Instructor") {
            header("Location: ../instructors/index.php");
        } elseif ($userType == "Student") {
            header("Location: ../students/index.php");
        }
    } else {
        $error_message = "fail";
        // echo "Invalid Username or Password";
        // echo "<script> alert('Invalid Username/Password') </script>";
        //header("Location: retry.php");
        header("Location: ../index.php?error=$error_message");
    }
}
