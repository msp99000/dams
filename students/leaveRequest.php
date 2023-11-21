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
            <h1 class="h3 mb-0 text-gray-800">Leave Request</h1>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="./">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Student Panel</li>
            </ol>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="card mb-4">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Submit Leave Request</h6>
                    </div>
                    <div class="card-body">
                        <form method="post" action="process.php">
                            <div class="form-group row mb-3">
                                <div class="col-xl-6">
                                    <label for="reason">Reason for Leave:</label>
                                    <textarea class="form-control" id="reason" name="reason" rows="4" required></textarea>
                                </div>
                                <div class="col-xl-6">
                                    <!-- empty  -->
                                </div>
                            </div>
                            <div class="form-group row mb-3">
                                <div class="col-xl-6">
                                    <label class="form-control-label">Instructor ID<span class="text-danger ml-2">*</span></label>
                                    <select class="form-control mb-3" id="class" name="instructorId" required>
                                        <option value="" disabled selected>-- Select --</option>
                                        <?php
                                        // Include the class file
                                        require_once('../options.php');

                                        // Create an instance of the DatabaseHandler class
                                        $users = new Options();

                                        // Get class options
                                        $classOptions = $users->instructorId_options();

                                        // Populate select options
                                        foreach ($classOptions as $option) {
                                            echo "<option value='" . $option . "'>" . $option . "</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                                <!-- <div class="col-xl-6">
                                    <label class="form-control-label">Class ID<span class="text-danger ml-2">*</span></label>
                                    <select class="form-control mb-3" id="class" name="classId" required>
                                        <option value="" disabled selected>-- Select --</option>
                                        <?php
                                        // Include the class file
                                        require_once('../options.php');

                                        // Create an instance of the DatabaseHandler class
                                        $users = new Options();

                                        // Get class options
                                        $classOptions = $users->classId_options();

                                        // Populate select options
                                        foreach ($classOptions as $option) {
                                            echo "<option value='" . $option . "'>" . $option . "</option>";
                                        }
                                        ?>
                                    </select>
                                </div> -->
                            </div>
                            <button type="submit" name="addAdmin" class="btn btn-primary">Add</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php
    if (isset($_POST['submitLeave'])) {
        $studentId = $_SESSION['student_id'];
        $reason = $_POST['reason'];
        $instructorId = $_POST['instructorId'];
        $classId = $_POST['classId'];

        // Insert leave request into the database
        $insertQuery = "INSERT INTO leaves (student_id, instructor_id, class_id, reason, request_date, `status`) 
                    VALUES ('$studentId', '$instructorId', '$classId', '$reason', CURDATE(), 'Pending')";

        if ($conn->query($insertQuery) === TRUE) {
            echo "<div class='alert alert-success' role='alert'>
              Leave request submitted successfully! Your request is pending approval.
            </div>";
        } else {
            echo "<div class='alert alert-danger' role='alert'>
              Error submitting leave request: " . $conn->error . "
            </div>";
        }
    }
    ?>

</body>

</html>