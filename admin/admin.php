<?php
include "../config/connection.php";

$database = new Database();
$conn = $database->getConnection();

class Admin
{

    public function count_admins()
    {
        global $conn;

        $query = "SELECT COUNT(*) as total FROM admins"; // Use an alias for the count

        $result = $conn->query($query);

        if ($result) {
            $row = $result->fetch_assoc();
            return $row['total']; // Return the count
        } else {
            return 0; // Return 0 if an error occurs
        }
    }

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

    public function count_users()
    {
        global $conn;

        $query = "SELECT COUNT(*) as total FROM users"; // Use an alias for the count

        $result = $conn->query($query);

        if ($result) {
            $row = $result->fetch_assoc();
            return $row['total']; // Return the count
        } else {
            return 0; // Return 0 if an error occurs
        }
    }

    public function count_instructors()
    {
        global $conn;

        $query = "SELECT COUNT(*) as total FROM instructors"; // Use an alias for the count

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

    public function list_admins()
    {
        global $conn;

        $query = "SELECT * FROM admins";
        $rs = $conn->query($query);
        $users = array(); // Create an array to store all user rows

        while ($row = $rs->fetch_assoc()) {
            $users[] = $row; // Add each user row to the array
        }

        return $users;
    }

    public function add_admin($firstName, $lastName, $gender, $dob, $email, $phone, $username, $password)
    {
        global $conn;

        // Prepare the SQL statement with placeholders
        $query = "INSERT INTO admins (first_name, last_name, gender, dob, email, phone, username, password) 
                  VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

        // Create a prepared statement
        $stmt = $conn->prepare($query);

        // Bind parameters to the prepared statement
        $stmt->bind_param("sssssiss", $firstName, $lastName, $gender, $dob, $email, $phone, $username, $password);

        // Execute the prepared statement
        if ($stmt->execute()) {
            return true; // User added successfully
        } else {
            return false; // Error occurred
        }
    }

    public function remove_user($userId)
    {
        global $conn;

        // Prepare the SQL statement with a placeholder
        $query = "DELETE FROM users WHERE user_id = ?";

        // Create a prepared statement
        $stmt = $conn->prepare($query);

        // Bind the parameter to the prepared statement
        $stmt->bind_param("i", $userId);

        // Execute the prepared statement
        if ($stmt->execute()) {
            return true; // User removed successfully
        } else {
            return false; // Error occurred
        }
    }

    public function list_instructors()
    {
        global $conn;

        $query = "SELECT * FROM instructors";
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

    public function add_instructor($username, $firstName, $lastName, $email, $phone, $dob)
    {
        global $conn;

        // Prepare the SQL statement with placeholders
        $query = "INSERT INTO instructors (username, first_name, last_name, email, phone, dob) 
                  VALUES (?, ?, ?, ?, ?, ?)";

        // Create a prepared statement
        $stmt = $conn->prepare($query);

        // Bind parameters to the prepared statement
        $stmt->bind_param("ssssis", $username, $firstName, $lastName, $email, $phone, $dob);

        // Execute the prepared statement
        if ($stmt->execute()) {
            return true; // User added successfully
        } else {
            return false; // Error occurred
        }
    }

    public function add_session($sessionName, $year, $startDate, $endDate)
    {
        global $conn;

        // Prepare the SQL statement with placeholders
        $query = "INSERT INTO `sessions` (`session_name`, `year`, `start_date`, `end_date`) 
                  VALUES (?, ?, ?, ?)";

        // Create a prepared statement
        $stmt = $conn->prepare($query);

        // Bind parameters to the prepared statement
        $stmt->bind_param("ssss", $sessionName, $year, $startDate, $endDate);

        // Execute the prepared statement
        if ($stmt->execute()) {
            return true; // User added successfully
        } else {
            return false; // Error occurred
        }
    }

    public function remove_instructor($instructorId)
    {
        global $conn;

        // Prepare the SQL statement with a placeholder
        $query = "DELETE FROM instructors WHERE instructor_id = ?";

        // Create a prepared statement
        $stmt = $conn->prepare($query);

        // Bind the parameter to the prepared statement
        $stmt->bind_param("i", $instructorId);

        // Execute the prepared statement
        if ($stmt->execute()) {
            return true; // User removed successfully
        } else {
            return false; // Error occurred
        }
    }

    public function update_instructor($username, $firstName, $lastName, $email, $phone, $dob, $instructorId)
    {
        global $conn;

        // Prepare the SQL statement with placeholders
        $query = "UPDATE instructors SET username = ?, first_name = ?, last_name = ?, email = ?, phone = ?, dob = ? WHERE instructor_id = ?";

        // Create a prepared statement
        $stmt = $conn->prepare($query);

        // Bind parameters to the prepared statement
        $stmt->bind_param("ssssisi", $username, $firstName, $lastName, $email, $phone, $dob, $instructorId);

        // Execute the prepared statement
        if ($stmt->execute()) {
            return true; // Instructor updated successfully
        } else {
            return false; // Error occurred
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

    public function add_student($studentId, $username, $firstName, $lastName, $email, $phone, $dob, $password)
    {
        global $conn;

        // Prepare the SQL statement with placeholders
        $query = "INSERT INTO students (`student_id`, `username`, `first_name`, `last_name`, `email`, `phone`, `dob`, `password`) 
                  VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

        // Create a prepared statement
        $stmt = $conn->prepare($query);

        // Bind parameters to the prepared statement
        $stmt->bind_param("issssiss", $studentId, $username, $firstName, $lastName, $email, $phone, $dob, $password);

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
        $query = "DELETE FROM students WHERE student_id = ?";

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

    public function update_student($username, $firstName, $lastName, $email, $phone, $dob, $studentId)
    {
        global $conn;

        // Prepare the SQL statement with placeholders
        $query = "UPDATE students SET username = ?, first_name = ?, last_name = ?, email = ?, phone = ?, dob = ? WHERE student_id = ?";

        // Create a prepared statement
        $stmt = $conn->prepare($query);

        // Bind parameters to the prepared statement
        $stmt->bind_param("ssssisi", $username, $firstName, $lastName, $email, $phone, $dob, $studentId);

        // Execute the prepared statement
        if ($stmt->execute()) {
            return true; // Instructor updated successfully
        } else {
            return false; // Error occurred
        }
    }

    public function update_admin($username, $firstName, $lastName, $email, $gender, $phone, $dob, $password, $adminId)
    {
        global $conn;

        // Prepare the SQL statement with placeholders
        $query = "UPDATE admins SET username = ?, first_name = ?, last_name = ?, email = ?, gender = ?, phone = ?, dob = ?, `password` = ? WHERE admin_id = ?";

        // Create a prepared statement
        $stmt = $conn->prepare($query);

        // Bind parameters to the prepared statement
        $stmt->bind_param("sssssissi", $username, $firstName, $lastName, $email, $gender, $phone, $dob, $password, $adminId);

        // Execute the prepared statement
        if ($stmt->execute()) {
            return true; // Admin updated successfully
        } else {
            return false; // Error occurred
        }
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

    public function list_sessions()
    {
        global $conn;

        $query = "SELECT * FROM sessions";
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
}
