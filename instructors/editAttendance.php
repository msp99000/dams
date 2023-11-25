<!DOCTYPE html>
<html lang="en">

<head>
    <?php include "heads.php"; ?>
</head>

<body>
    <?php include "topbar.php"; ?>
    <?php include "process.php"; ?>

    <div class="container-fluid" id="container-wrapper">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Edit Attendance (Today's Date : <?php echo date("m-d-Y"); ?>)</h1>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="./">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Instructor Panel</li>
            </ol>
        </div>
        <form method="post">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card mb-4">
                        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                            <h6 class="m-0 font-weight-bold text-primary">All Students in (<?php echo $rrw['classId'] . ' - ' . $rrw['classArmName']; ?>) Class</h6>
                            <h6 class="m-0 font-weight-bold text-danger">Note: <i>Select from the dropdown menu to edit student attendance!</i></h6>
                        </div>
                        <div class="table-responsive p-3">
                            <?php echo $statusMsg; ?>
                            <table class="table align-items-center table-flush table-hover">
                                <thead class="thead-light">
                                    <tr>
                                        <th>S. no.</th>
                                        <th>Student ID</th>
                                        <th>First Name</th>
                                        <th>Last Name</th>
                                        <th>Course ID</th>
                                        <th>Class ID</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php
                                    $query = "SELECT s.student_id, s.first_name, s.last_name, course_id, class_id 
                                                FROM students s  
                                                INNER JOIN schedules sc USING (student_id) 
                                                INNER JOIN classes cl USING (class_id) 
                                                INNER JOIN courses c USING (course_id) 
                                                WHERE instructor_id = '" . $_SESSION['instructor_id'] . "' ";

                                    $rs = $conn->query($query);
                                    $sn = 0;
                                    $status = "";
                                    $class_id = '';
                                    $course_id = '';

                                    if ($rs->num_rows > 0) {
                                        while ($rows = $rs->fetch_assoc()) {
                                            $sn++;
                                            $class_id = $rows['class_id'];
                                            $course_id = $rows['course_id'];

                                            echo "
                                                <tr>
                                                    <td>" . $sn . "</td>
                                                    <td>" . $rows['student_id'] . "</td>
                                                    <td>" . $rows['first_name'] . "</td>
                                                    <td>" . $rows['last_name'] . "</td>
                                                    <td>" . $rows['course_id'] . "</td>
                                                    <td>" . $rows['class_id'] . "</td>
                                                    <!-- Removed the checkbox column -->
                                                    <td>
                                                        <select name='status[]' class='form-control'>
                                                            <option value='Present'>Present</option>
                                                            <option value='Absent'>Absent</option>
                                                        </select>
                                                    </td>
                                                </tr>";
                                        }
                                    } else {
                                        echo "<div class='alert alert-danger' role='alert'>
                                                No Record Found!
                                            </div>";
                                    }
                                    ?>
                                </tbody>
                            </table>
                            <br>
                            <button type="submit" name="editAttendance" class="btn btn-primary">Edit Attendance</button>
                            <?php
                            if (isset($_POST['editAttendance'])) {
                                $statusArray = isset($_POST['status']) ? $_POST['status'] : [];

                                foreach ($statusArray as $key => $attendanceStatus) {
                                    // Retrieve class_id from the initial fetch loop
                                    $instructor_id = $_SESSION['instructor_id'];
                                    $date = date("Y-m-d"); // Current date

                                    // Insert or update the attendance record
                                    $insertQuery = "INSERT INTO attendance (class_id, course_id, instructor_id, student_id, `date`, `status`) 
                                                    VALUES ('$class_id', $course_id, '$instructor_id', '" . $rows['student_id'] . "', '$date', '$attendanceStatus')
                                                    ON DUPLICATE KEY UPDATE status = '$attendanceStatus'";

                                    $conn->query($insertQuery);
                                }

                                echo "<div class='alert alert-success' role='alert'>
                                            Attendance has been edited successfully!
                                        </div>";
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <?php include "../components/footer.php"; ?>
</body>

</html>