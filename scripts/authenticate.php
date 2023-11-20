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
                // Fetch instructor ID using the new method
                $_SESSION['student_id'] = $this->getstudentId($username);
            }

            return true; // Successful login
        } else {
            return "Invalid Username/Password!";
        }
    }
}
