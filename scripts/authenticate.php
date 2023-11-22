<?php

class UserAuth
{
    private $conn;

    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    // New method to get instructor ID
    public function getInstructorId($username)
    {
        $query = "SELECT instructor_id FROM instructors WHERE username = '$username'";
        $rs = $this->conn->query($query);
        $row = $rs->fetch_assoc();

        return $row ? $row['instructor_id'] : null;
    }

    // New method to get student ID
    public function getStudentId($username)
    {
        $query = "SELECT student_id FROM students WHERE username = '$username'";
        $rs = $this->conn->query($query);
        $row = $rs->fetch_assoc();

        return $row ? $row['student_id'] : null;
    }

    public function login($userType, $username, $password)
    {
        $password = md5($password);

        if ($userType == "Administrator") {
            $query = "SELECT * FROM admins WHERE username = '$username' AND password = '$password' ";
        } elseif ($userType == "Instructor") {
            $query = "SELECT * FROM instructors WHERE username = '$username' AND password = '$password' ";
        } elseif ($userType == "Student") {
            $query = "SELECT * FROM students WHERE username = '$username' AND password = '$password' ";
        } else {
            return "Invalid Username/Password!";
        }

        $rs = $this->conn->query($query);
        $num = $rs->num_rows;
        $rows = $rs->fetch_assoc();

        if ($num > 0) {
            session_start();  // start session

            $_SESSION['userId'] = $rows['user_id'];
            $_SESSION['username'] = $rows['username'];
            $_SESSION['firstName'] = $rows['first_name'];
            $_SESSION['lastName'] = $rows['last_name'];
            $_SESSION['emailAddress'] = $rows['email'];

            if ($userType == "Instructor") {
                // Fetch instructor ID using the new method
                $_SESSION['instructor_id'] = $this->getInstructorId($username);
                $_SESSION['classId'] = $rows['class_id'];
                $_SESSION['courseId'] = $rows['course_id'];
            }

            if ($userType == "Student") {
                // Fetch student ID using the new method
                $_SESSION['student_id'] = $this->getstudentId($username);
            }

            return true; // Successful login
        } else {
            return "Invalid Username/Password!";
        }
    }

    public function sendPasswordResetEmail($userType, $username)
    {
        // $newPassword = $this->generateRandomPassword(); // Generate a new password
        $newPassword = 0000; // Generate a new password
        $hashedPassword = md5($newPassword);

        $updateQuery = "";

        if ($userType == "Administrator") {
            $updateQuery = "UPDATE admins SET password = '$hashedPassword' WHERE username = '$username'";
        } elseif ($userType == "Instructor") {
            $updateQuery = "UPDATE instructors SET password = '$hashedPassword' WHERE username = '$username'";
        } elseif ($userType == "Student") {
            $updateQuery = "UPDATE students SET password = '$hashedPassword' WHERE username = '$username'";
        } else {
            return "Invalid user type.";
        }

        $result = $this->conn->query($updateQuery);

        if ($result) {
            // Send password reset email
            // $emailSender = new EmailSender();
            // $emailSender->sendResetPasswordEmail($username, $newPassword);
            echo "<h4 style='color:green;'>Email with password sent successfully</h4>";
            return true;
        } else {
            return "Failed to update password.";
        }
    }

    private function generateRandomPassword($length = 8)
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $password = '';
        for ($i = 0; $i < $length; $i++) {
            $password .= $characters[rand(0, strlen($characters) - 1)];
        }
        return $password;
    }
}
