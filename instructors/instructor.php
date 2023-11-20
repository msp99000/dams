<?php
include "../config/connection.php";

$database = new Database();
$conn = $database->getConnection();

class Instructor
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

    public function count_sessions()
    {
        global $conn;

        $query = "SELECT COUNT(*) as total FROM `sessions`"; // Use an alias for the count

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

    public function list_attendance()
    {
        global $conn;

        $query = "SELECT * FROM attendance";
        $rs = $conn->query($query);
        $users = array(); // Create an array to store all user rows

        while ($row = $rs->fetch_assoc()) {
            $users[] = $row; // Add each user row to the array
        }

        return $users;
    }

    public function list_schedules()
    {
        global $conn;

        $query = "SELECT * FROM schedules";
        $rs = $conn->query($query);
        $users = array(); // Create an array to store all user rows

        while ($row = $rs->fetch_assoc()) {
            $users[] = $row; // Add each user row to the array
        }

        return $users;
    }

    public function list_courses()
    {
        global $conn;

        $query = "SELECT * FROM courses";
        $rs = $conn->query($query);
        $users = array(); // Create an array to store all user rows

        while ($row = $rs->fetch_assoc()) {
            $users[] = $row; // Add each user row to the array
        }

        return $users;
    }

    public function list_classes()
    {
        global $conn;

        $query = "SELECT * FROM classes";
        $rs = $conn->query($query);
        $users = array(); // Create an array to store all user rows

        while ($row = $rs->fetch_assoc()) {
            $users[] = $row; // Add each user row to the array
        }

        return $users;
    }

    public function list_leaves()
    {
        global $conn;

        $query = "SELECT * FROM leaves";
        $rs = $conn->query($query);
        $users = array(); // Create an array to store all user rows

        while ($row = $rs->fetch_assoc()) {
            $users[] = $row; // Add each user row to the array
        }

        return $users;
    }

    public function list_sessions()
    {
        global $conn;

        $query = "SELECT * FROM `sessions`";
        $rs = $conn->query($query);
        $users = array(); // Create an array to store all user rows

        while ($row = $rs->fetch_assoc()) {
            $users[] = $row; // Add each user row to the array
        }

        return $users;
    }

    public function add_student($firstName, $lastName, $dob, $email, $phone)
    {
        global $conn;

        // Prepare the SQL statement with placeholders
        $query = "INSERT INTO students (first_name, last_name, dob, email, phone) 
                  VALUES (?, ?, ?, ?, ?)";

        // Create a prepared statement
        $stmt = $conn->prepare($query);

        // Bind parameters to the prepared statement
        $stmt->bind_param("ssssi", $firstName, $lastName, $dob, $email, $phone);

        // Execute the prepared statement
        if ($stmt->execute()) {
            return true; // User added successfully
        } else {
            return false; // Error occurred
        }
    }

    public function remove_student($studentId)
    {
        global $conn;

        // Prepare the SQL statement with a placeholder
        $query = "DELETE FROM studentss WHERE student_id = ?";

        // Create a prepared statement
        $stmt = $conn->prepare($query);

        // Bind the parameter to the prepared statement
        $stmt->bind_param("i", $studentId);

        // Execute the prepared statement
        if ($stmt->execute()) {
            return true; // User removed successfully
        } else {
            return false; // Error occurred
        }
    }

    public function update_student($studentId, $firstName, $lastName, $gender, $dob, $email, $phone)
    {
        global $conn;

        // Prepare the SQL statement with placeholders
        $query = "UPDATE students SET first_name = ?, last_name = ?, gender = ?, dob = ?, email = ?, phone = ? WHERE student_id = ?";

        // Create a prepared statement
        $stmt = $conn->prepare($query);

        // Bind parameters to the prepared statement
        $stmt->bind_param("sssssii", $firstName, $lastName, $gender, $dob, $email, $phone, $studentId);

        // Execute the prepared statement
        if ($stmt->execute()) {
            return true; // User updated successfully
        } else {
            return false; // Error occurred
        }
    }

    // public function getInstructorId($username)
    // {
    //     $query = "SELECT instructor_id FROM instructors WHERE username = '$username'";
    //     $rs = $this->conn->query($query);
    //     $row = $rs->fetch_assoc();

    //     return $row ? $row['instructor_id'] : null;
    // }
}
