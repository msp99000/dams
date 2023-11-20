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
            <h1 class="h3 mb-0 text-gray-800">Leave Requests</h1>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="./">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Instructor Panel</li>
            </ol>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="card mb-4">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Pending Leave Requests</h6>
                    </div>
                    <div class="table-responsive p-3">
                        <?php
                        // Retrieve pending leave requests
                        $query = "SELECT leave_request_id, s.student_id, s.first_name, s.last_name, l.request_date, l.reason
                      FROM leaves l
                      INNER JOIN students s ON l.student_id = s.student_id
                      WHERE l.status = 'Pending' AND l.instructor_id = '" . $_SESSION['instructor_id'] . "'";

                        $result = $conn->query($query);

                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                echo "
                  <div>
                    <p>Student: {$row['first_name']} {$row['last_name']}</p>
                    <p>Request Date: {$row['request_date']}</p>
                    <p>Reason: {$row['reason']}</p>
                    <form method='post'>
                      <input type='hidden' name='leaveRequestId' value='{$row['leave_request_id']}'>
                      <button type='submit' name='approveLeave'>Approve</button>
                    </form>
                  </div>";
                            }
                        } else {
                            echo "<p>No pending leave requests</p>";
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php
    if (isset($_POST['approveLeave'])) {
        $leaveRequestId = $_POST['leaveRequestId'];

        // Update the status of the leave request to 'Approved'
        $updateQuery = "UPDATE leaves SET status = 'Approved', response_date = CURDATE() WHERE leave_request_id = '$leaveRequestId'";

        if ($conn->query($updateQuery) === TRUE) {
            echo "<div class='alert alert-success' role='alert'>
              Leave request approved successfully!
            </div>";
        } else {
            echo "<div class='alert alert-danger' role='alert'>
              Error approving leave request: " . $conn->error . "
            </div>";
        }
    }
    ?>

</body>

</html>