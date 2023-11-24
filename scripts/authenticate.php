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
                $_SESSION['student_id'] = $this->getStudentId($username);
            }

            return true; // Successful login
        } else {
            return "Invalid Username/Password!";
        }
    }

    public function sendPasswordResetEmail($userType, $username, $email)
    {
        if ($userType == "Administrator") {
            $query = "SELECT * FROM admins WHERE username = '$username' AND email = '$email' ";
        } elseif ($userType == "Instructor") {
            $query = "SELECT * FROM instructors WHERE username = '$username' AND email = '$email' ";
        } elseif ($userType == "Student") {
            $query = "SELECT * FROM students WHERE username = '$username' AND email = '$email' ";
        } else {
            return "Invalid Username/Email!";
        }

        $rs = $this->conn->query($query);
        $num = $rs->num_rows;
        $rows = $rs->fetch_assoc();

        if ($num > 0) {
            // Generate a random password
            // $randomPassword = $this->generateRandomPassword();
            $randomPassword = 0000;

            // Send the random password to the user's email
            $subject = "Password Reset";
            $message = "Your new password is: $randomPassword";

            $headers = "From: webmaster@example.com";

            // Send the email (you should handle errors and use a proper email sending library)
            if (mail($email, $subject, $message, $headers)) {
                $newPassword = md5($randomPassword);

                $updateQuery = "";

                if ($userType == "Administrator") {
                    $updateQuery = "UPDATE admins SET password = '$newPassword' WHERE username = '$username' and email = '$email'";
                } elseif ($userType == "Instructor") {
                    $updateQuery = "UPDATE instructors SET password = '$newPassword' WHERE username = '$username' and email = '$email'";
                } elseif ($userType == "Student") {
                    $updateQuery = "UPDATE students SET password = '$newPassword' WHERE username = '$username' and email = '$email'";
                } else {
                    return "Invalid user type.";
                }

                $result = $this->conn->query($updateQuery);

                if ($result) {
                    return "Password sent to your email!";
                } else {
                    return "Invalid Username/Email!";
                }
            } else {
                return "Failed to send email.";
            }
        } else {
            return "Invalid Username/Email!";
        }
    }

    private function generateRandomPassword()
    {
        // Generate a random password (you may customize the length and characters)
        $characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
        $password = '';
        $length = 10;

        for ($i = 0; $i < $length; $i++) {
            $password .= $characters[rand(0, strlen($characters) - 1)];
        }

        return $password;
    }
}
