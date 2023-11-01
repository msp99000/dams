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
        <img style="color:blue; max-width: 60px;" src="../assets/images/teacherblue.svg" >
        <div> 
            Welcome <?php echo $_SESSION['firstName']; ?>
        </div>
    </div>
    <div class="card-container">

        <a href="viewAttendance.php">
            <div class="card">
                <div class="card-header">
                    <img src="../assets/images/attendance.png" >
                    <!-- <h4 class="card-title"><?php echo $attendanceCount ?></h4> -->
                </div>
                <div class="card-body">
                    <p id="totalAttendance" class="card-value">Attendance</p>
                </div>
            </div>
        </a>

        <a href="viewStudents.php">
            <div class="card">
                <div class="card-header">
                    <img src="../assets/images/student.png" >
                    <!-- <h4 class="card-title"><?php echo $studentCount ?></h4> -->
                </div>
                <div class="card-body">
                    <p id="totalStudents" class="card-value">Students</p>
                </div>
            </div>
        </a>

        <a href="viewClasses.php">
            <div class="card">
                <div class="card-header">
                    <img src="../assets/images/classes.png" >
                    <!-- <h4 class="card-title"><?php echo $classCount ?></h4> -->
                </div>
                <div class="card-body">
                    <p id="totalClasses" class="card-value">Classes</p>
                </div>
            </div> 
        </a>

        <a href="viewCourses.php">
            <div class="card">
                <div class="card-header">
                    <img src="../assets/images/courses.png" >
                    <!-- <h4 class="card-title"><?php echo $courseCount ?></h4> -->
                </div>
                <div class="card-body">
                    <p id="totalClasses" class="card-value">Courses</p>
                </div>
            </div> 
        </a>

        <a href="viewSchedules.php">
            <div class="card">
                <div class="card-header">
                    <img src="../assets/images/schedules.png" >
                    <!-- <h4 class="card-title"><?php echo $schedulesCount ?></h4> -->
                </div>
                <div class="card-body">
                    <p id="totalTerms" class="card-value">Schedules</p>
                </div>
            </div> 
        </a>

        <a href="viewSessions.php">
            <div class="card">
                <div class="card-header">
                    <img src="../assets/images/sessions.png" >
                    <!-- <h4 class="card-title"><?php echo $sessionCount ?></h4> -->
                </div>
                <div class="card-body">
                    <p id="totalTerms" class="card-value">Sessions</p>
                </div>
            </div> 
        </a>
        
        <a href="viewLeaves.php">
            <div class="card">
                <div class="card-header">
                    <img src="../assets/images/leaves.png" >
                    <!-- <h4 class="card-title"><?php echo $leavesCount ?></h4> -->
                </div>
                <div class="card-body">
                    <p id="totalTerms" class="card-value">Leaves</p>
                </div>
            </div> 
        </a>
    </div>
    <?php include "../components/footer.php"; ?>
</body>
</html>