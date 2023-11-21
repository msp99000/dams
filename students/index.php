<!DOCTYPE html>
<html lang="en">

<head>
    <link href="../assets/images/favicon.png" rel="icon">
    <title>DAMS</title>
    <link rel="stylesheet" href="../css/navbar.css">
    <link rel="stylesheet" href="../css/cards.css">
    <script src="../js/script.js"></script>
</head>

<body>
    <?php include "topbar.php"; ?>
    <?php include "process.php"; ?>
    <div class="welcome-text">
        <img style="color:blue; max-width: 60px;" src="../assets/images/studentblue.svg">
        <div>
            Welcome <?php echo $_SESSION['firstName']; ?>
        </div>
    </div>

    <div class="card-container">

        <a href="myAttendance.php">
            <div class="card">
                <div class="card-header">
                    <img src="../assets/images/attendance.png">
                </div>
                <div class="card-body">
                    <p id="totalAttendance" class="card-value">My Attendance</p>
                </div>
            </div>
        </a>

        <a href="viewClasses.php">
            <div class="card">
                <div class="card-header">
                    <img src="../assets/images/classes.png">
                </div>
                <div class="card-body">
                    <p id="totalClasses" class="card-value">My Classes</p>
                </div>
            </div>
        </a>

        <a href="myCourses.php">
            <div class="card">
                <div class="card-header">
                    <img src="../assets/images/courses.png">
                </div>
                <div class="card-body">
                    <p id="totalClasses" class="card-value">My Courses</p>
                </div>
            </div>
        </a>

        <a href="classSchedules.php">
            <div class="card">
                <div class="card-header">
                    <img src="../assets/images/schedules.png">
                </div>
                <div class="card-body">
                    <p id="totalTerms" class="card-value">Class Schedules</p>
                </div>
            </div>
        </a>

        <a href="viewLeaves.php">
            <div class="card">
                <div class="card-header">
                    <img src="../assets/images/leaves.png">
                </div>
                <div class="card-body">
                    <p id="totalTerms" class="card-value">My Leave Requests</p>
                </div>
            </div>
        </a>
    </div>
    <?php include "../components/footer.php"; ?>
</body>

</html>