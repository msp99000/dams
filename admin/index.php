<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
        <img style="color:blue; max-width: 60px;" src="../assets/images/adminblue.svg" >
        <div> 
            Welcome <?php echo $_SESSION['firstName']; ?>
        </div>
    </div>
    
    <div class="card-container">

        <a href="viewAdmins.php">
            <div class="card">
                <div class="card-header">
                    <img src="../assets/images/admin.png" >
                    <!-- <h4 class="card-title"><?php echo $adminCount ?></h4> -->
                </div>
                <div class="card-body">
                    <p id="totalAttendance" class="card-value">Admins</p>
                </div>
            </div>
        </a>

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

        <a href="viewInstructors.php">
            <div class="card">
                <div class="card-header">
                    <img src="../assets/images/teacher.png" >
                    <!-- <h4 class="card-title"><?php echo $instructorCount ?></h4> -->
                </div>
                <div class="card-body">
                    <p id="totalAttendance" class="card-value">Instructors</p>
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
    </div>
    <?php include "../components/footer.php"; ?>
</body>
</html>
