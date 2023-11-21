<?php
include "../config/connection.php";

$database = new Database();
$conn = $database->getConnection();

class Student
{

    public function count_attendance()
    {
        global $conn;

        $query = "SELECT COUNT(*) as total FROM attendance"; // Use an alias for the count

        $result = $conn->query($query);

        if ($result) {
            $row = $result->fetch_assoc();
            return $row['total']; // Return the count
        } else {
            return 0; // Return 0 if an error occurs
        }
    }

    public function view_classes()
    {
        global $conn;

        $query = "SELECT * FROM `classes`";
        $rs = $conn->query($query);
        $users = array(); // Create an array to store all user rows

        while ($row = $rs->fetch_assoc()) {
            $users[] = $row; // Add each user row to the array
        }

        return $users;
    }

    public function my_attendance()
    {
        global $conn;

        $studentId = $_SESSION['student_id'];
        $query = "SELECT * FROM attendance WHERE student_id='$studentId'";
        $rs = $conn->query($query);
        $users = array(); // Create an array to store all user rows

        while ($row = $rs->fetch_assoc()) {
            $users[] = $row; // Add each user row to the array
        }

        return $users;
    }

    public function my_courses()
    {
        global $conn;

        $studentId = $_SESSION['student_id'];
        $query = "SELECT course_id, course_name, course_code FROM schedules  
        INNER JOIN classes USING (class_id) 
        INNER JOIN courses USING (course_id) 
        WHERE student_id='$studentId'";
        $rs = $conn->query($query);
        $users = array(); // Create an array to store all user rows

        while ($row = $rs->fetch_assoc()) {
            $users[] = $row; // Add each user row to the array
        }

        return $users;
    }

    public function my_schedules()
    {
        global $conn;

        $studentId = $_SESSION['student_id'];
        $query = "SELECT * FROM schedules WHERE student_id='$studentId'";
        $rs = $conn->query($query);
        $users = array(); // Create an array to store all user rows

        while ($row = $rs->fetch_assoc()) {
            $users[] = $row; // Add each user row to the array
        }

        return $users;
    }

    public function count_students()
    {
        global $conn;

        $query = "SELECT COUNT(*) as total FROM students"; // Use an alias for the count

        $result = $conn->query($query);

        if ($result) {
            $row = $result->fetch_assoc();
            return $row['total']; // Return the count
        } else {
            return 0; // Return 0 if an error occurs
        }
    }

    public function count_classes()
    {
        global $conn;

        $query = "SELECT COUNT(*) as total FROM classes"; // Use an alias for the count

        $result = $conn->query($query);

        if ($result) {
            $row = $result->fetch_assoc();
            return $row['total']; // Return the count
        } else {
            return 0; // Return 0 if an error occurs
        }
    }

    public function count_courses()
    {
        global $conn;

        $query = "SELECT COUNT(*) as total FROM courses"; // Use an alias for the count

        $result = $conn->query($query);

        if ($result) {
            $row = $result->fetch_assoc();
            return $row['total']; // Return the count
        } else {
            return 0; // Return 0 if an error occurs
        }
    }

    public function count_sessions()
    {
        global $conn;

        $query = "SELECT COUNT(*) as total FROM sessions"; // Use an alias for the count

        $result = $conn->query($query);

        if ($result) {
            $row = $result->fetch_assoc();
            return $row['total']; // Return the count
        } else {
            return 0; // Return 0 if an error occurs
        }
    }

    public function count_terms()
    {
        global $conn;

        $query = "SELECT COUNT(*) as total FROM terms"; // Use an alias for the count

        $result = $conn->query($query);

        if ($result) {
            $row = $result->fetch_assoc();
            return $row['total']; // Return the count
        } else {
            return 0; // Return 0 if an error occurs
        }
    }

    public function count_leaves()
    {
        global $conn;

        $query = "SELECT COUNT(*) as total FROM leaves"; // Use an alias for the count

        $result = $conn->query($query);

        if ($result) {
            $row = $result->fetch_assoc();
            return $row['total']; // Return the count
        } else {
            return 0; // Return 0 if an error occurs
        }
    }

    public function count_schedules()
    {
        global $conn;

        $query = "SELECT COUNT(*) as total FROM schedules"; // Use an alias for the count

        $result = $conn->query($query);

        if ($result) {
            $row = $result->fetch_assoc();
            return $row['total']; // Return the count
        } else {
            return 0; // Return 0 if an error occurs
        }
    }

    public function list_students()
    {
        global $conn;

        $query = "SELECT * FROM students";
        $rs = $conn->query($query);
        $users = array(); // Create an array to store all user rows

        while ($row = $rs->fetch_assoc()) {
            $users[] = $row; // Add each user row to the array
        }

        return $users;
    }

    public function my_leave_requests($user)
    {
        global $conn;

        // Use prepared statement to prevent SQL injection
        $query = "SELECT * FROM leaves WHERE student_id = ?";

        // Prepare the statement
        $stmt = $conn->prepare($query);

        // Bind the parameter
        $stmt->bind_param("i", $user);

        // Execute the statement
        $stmt->execute();

        // Get the result
        $result = $stmt->get_result();

        // Create an array to store all user rows
        $users = array();

        // Fetch each row
        while ($row = $result->fetch_assoc()) {
            $users[] = $row; // Add each user row to the array
        }

        // Close the statement
        $stmt->close();

        return $users;
    }
}
