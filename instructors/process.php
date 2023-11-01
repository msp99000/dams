<?php
include "instructor.php";

$instructor = new Instructor();

$attendanceCount = $instructor->count_attendance();
$studentCount = $instructor->count_students();
$classCount = $instructor->count_classes();
$courseCount = $instructor->count_courses();
$sessionCount = $instructor->count_sessions();
$leavesCount = $instructor->count_leaves();
$schedulesCount = $instructor->count_schedules();

if (isset($_POST['addUser'])) {
    // Handle adding a new user
    $userId = $_POST['userId'];
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $gender = $_POST['gender'];
    $dob = $_POST['dob'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $username = $_POST['username'];
    $password = md5($_POST['password']);
    $role = $_POST['role'];

    // Call the add_user function
    $result = $admin->add_user($firstName, $lastName, $gender, $dob, $email, $phone, $username, $password, $role);

    if ($result) {
        echo "<script type = \"text/javascript\">
                    window.location = (\"addUser.php\")
              </script>";
    } else {
        $alertMessage = "<div class='alert alert-danger' style='margin-right:700px;'>An error occurred while adding user!</div>";
    }    
} elseif (isset($_POST['removeUser'])) {
    // Handle removing a user
    $userId = $_POST['userId'];

    // Call the remove_user function
    $result = $admin->remove_user($userId);

    if ($result) {
        echo "User Removed";
        echo "<script type = \"text/javascript\">
                    window.location = (\"removeUser.php\")
              </script>";
    } else {
        $alertMessage = "<div class='alert alert-danger' style='margin-right:700px;'>An error occurred while deleting user!</div>";
    } 
} elseif (isset($_POST['updateUser'])) {
    // Get the user ID from the form
    $userId = $_POST['userId'];

    // Get the new user details from the form
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $gender = $_POST['gender'];
    $dob = $_POST['dob'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $username = $_POST['username'];

    // Call the update_user function
    $result = $admin->update_user($userId, $firstName, $lastName, $gender, $dob, $email, $phone, $username);

    if ($result) {
        echo "<script type = \"text/javascript\">
                    window.location = (\"updateUser.php\")
              </script>";
    } else {
        echo "<p>An error occurred while updating user.</p>";
    }
} 


else {
    $alertMessage = "Invalid request.";
}
?>
