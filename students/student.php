<?php
include "../config/connection.php";

$database = new Database();
$conn = $database->getConnection();

class Student {

    public function count_attendance(){
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

    public function count_students(){
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

    public function count_classes(){
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

    public function count_courses(){
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

    public function count_sessions(){
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

    public function count_terms(){
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

    public function list_students() {
        global $conn;
        
        $query = "SELECT * FROM students";
        $rs = $conn->query($query);
        $users = array(); // Create an array to store all user rows

        while ($row = $rs->fetch_assoc()) {
            $users[] = $row; // Add each user row to the array
        }

        return $users;
    }
}
?>
