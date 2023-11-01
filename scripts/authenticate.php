<?php

class UserAuth {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function login($userType, $username, $password) {
       
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
                $_SESSION['classId'] = $rows['class_id'];
                $_SESSION['courseId'] = $rows['course_id'];
            } 
            return true; // Successful login
        } else {
            return "Invalid Username/Password!";
        }
    }
}

?>
