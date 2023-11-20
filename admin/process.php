<?php
include "admin.php";

$admin = new Admin();

$adminCount = $admin->count_admins();
$attendanceCount = $admin->count_attendance();
$instructorCount = $admin->count_instructors();
$studentCount = $admin->count_students();
$classCount = $admin->count_classes();
$courseCount = $admin->count_courses();
$sessionCount = $admin->count_sessions();

if (isset($_POST['addAdmin'])) {
    // Handle adding a new user
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $gender = $_POST['gender'];
    $dob = $_POST['dob'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $username = $_POST['username'];
    $password = md5($_POST['password']);

    // Call the add_user function
    $result = $admin->add_admin($firstName, $lastName, $gender, $dob, $email, $phone, $username, $password);

    if ($result) {
        echo "<script type = \"text/javascript\">
                    window.location = (\"addAdmin.php\")
              </script>";
    } else {
        $alertMessage = "<div class='alert alert-danger' style='margin-right:700px;'>An error occurred while adding user!</div>";
    }
} elseif (isset($_POST['removeInstructor'])) {
    // Handle removing a user
    $userId = $_POST['userId'];

    // Call the remove_user function
    $result = $admin->remove_instructor($userId);

    if ($result) {
        echo "User Removed";
        echo "<script type = \"text/javascript\">
                    window.location = (\"removeInstructor.php\")
              </script>";
    } else {
        $alertMessage = "<div class='alert alert-danger' style='margin-right:700px;'>An error occurred while deleting user!</div>";
    }
} elseif (isset($_POST['updateInstructor'])) {

    // Get the new user details from the form
    $instructorId = $_POST['instructorId'];
    $username = $_POST['username'];
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $dob = $_POST['dob'];

    // Call the update_user function
    $result = $admin->update_instructor($username, $firstName, $lastName, $email, $phone, $dob, $instructorId);

    if ($result) {
        echo "<script type = \"text/javascript\">
                    window.location = (\"updateInstructor.php\")
              </script>";
    } else {
        echo "<p>An error occurred while updating user.</p>";
    }
} elseif (isset($_POST['addStudent'])) {

    $studentId = $_POST['studentId'];
    $username = $_POST['username'];
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $dob = $_POST['dob'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $password = md5($_POST['password']);

    $result = $admin->add_student($studentId, $username, $firstName, $lastName, $email, $phone, $dob, $password);

    if ($result) {
        echo "<script type = \"text/javascript\">
                    window.location = (\"addStudent.php\")
              </script>";
    } else {
        echo "<p>An error occurred while updating user.</p>";
    }
} elseif (isset($_POST['addInstructor'])) {

    $username = $_POST['username'];
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $dob = $_POST['dob'];

    $result = $admin->add_instructor($username, $firstName, $lastName, $email, $phone, $dob);

    if ($result) {
        echo "<script type = \"text/javascript\">
                    window.location = (\"addInstructor.php\")
              </script>";
    } else {
        echo "<p>An error occurred while updating user.</p>";
    }
} elseif (isset($_POST['addSession'])) {

    $sessionName = $_POST['sessionName'];
    $year = $_POST['year'];
    $startDate = $_POST['startDate'];
    $endDate = $_POST['endDate'];

    $result = $admin->add_session($sessionName, $year, $startDate, $endDate);

    if ($result) {
        echo "<script type = \"text/javascript\">
                    window.location = (\"addSession.php\")
              </script>";
    } else {
        echo "<p>An error occurred while updating user.</p>";
    }
} elseif (isset($_POST['removeStudent'])) {

    $studentId = $_POST['studentId'];

    $result = $admin->remove_student($studentId);

    if ($result) {
        echo "<script type = \"text/javascript\">
                    window.location = (\"removeStudent.php\")
              </script>";
    } else {
        echo "<p>An error occurred while updating user.</p>";
    }
} elseif (isset($_POST['updateStudent'])) {

    // Get the new user details from the form
    $studentId = $_POST['studentId'];
    $username = $_POST['username'];
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $dob = $_POST['dob'];

    // Call the update_user function
    $result = $admin->update_student($username, $firstName, $lastName, $email, $phone, $dob, $studentId);

    if ($result) {
        echo "<script type = \"text/javascript\">
                    window.location = (\"updateStudent.php\")
              </script>";
    } else {
        echo "<p>An error occurred while updating user.</p>";
    }
} elseif (isset($_POST['updateAdmin'])) {

    // Get the new user details from the form
    $adminId = 101;
    $username = $_POST['username'];
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $gender = $_POST['gender'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $password = md5($_POST['password']);
    $dob = $_POST['dob'];

    // Call the update_admin function
    $result = $admin->update_admin($username, $firstName, $lastName, $email, $gender, $phone, $dob, $password, $adminId);

    if ($result) {
        echo "<script type = \"text/javascript\">
                    window.location = (\"updateAdmin.php\")
              </script>";
    } else {
        echo "<p>An error occurred while updating user.</p>";
    }
} elseif (isset($_POST['addCourse'])) {

    $courseName = $_POST['courseName'];
    $courseCode = $_POST['courseCode'];

    $result = $admin->add_course($courseName, $courseCode);

    if ($result) {
        echo "<script type = \"text/javascript\">
                    window.location = (\"addCourse.php\")
              </script>";
    } else {
        echo "<p>An error occurred while updating.</p>";
    }
} elseif (isset($_POST['addSchedule'])) {

    $scheduleId = $_POST['scheduleId'];
    $classId = $_POST['classId'];
    $instructorId = $_POST['instructorId'];
    $studentId = $_POST['studentId'];
    $schedule = $_POST['schedule'];
    $status = $_POST['status'];

    $result = $admin->add_schedule($scheduleId, $classId, $instructorId, $studentId, $schedule, $status);

    if ($result) {
        echo "<script type = \"text/javascript\">
                    window.location = (\"addSchedule.php\")
              </script>";
    } else {
        echo "<p>An error occurred while updating.</p>";
    }
} else {
    $alertMessage = "Invalid request.";
}
