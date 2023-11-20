<nav class="navbar">
  <div class="navbar-container">
    <div class="brand">
      <img src="../assets/images/brand.png" style="max-width: 60px; margin-right:20px">
      <a href="index.php" style="color: white; text-decoration: none;">D A M S</a>
    </div>
    <div class="mobile-menu-button">
      <div class="bar"></div>
      <div class="bar"></div>
      <div class="bar"></div>
    </div>
    <ul class="nav-list">
      <li class="expander" id="admins-expander">
        <a class="nav-list" href="#">Attendance</a>
        <ul class="sub-list" id="admins-submenu">
          <li><a href="viewAttendance.php">View Attendance</a></li>
          <li><a href="addAdmin.php">Mark Attendance</a></li>
        </ul>
      </li>
      <li class="expander" id="instructors-expander">
        <a class="nav-list" href="#">Instructors</a>
        <ul class="sub-list" id="instructors-submenu">
          <li><a href="viewInstructors.php">View Instructors</a></li>
          <li><a href="addInstructor.php">Add Instructor</a></li>
          <li><a href="removeInstructor.php">Remove Instructor</a></li>
          <li><a href="updateInstructor.php">Update Instructor</a></li>
        </ul>
      </li>
      <li class="expander" id="students-expander">
        <a class="nav-list" href="#">Students</a>
        <ul class="sub-list" id="students-submenu">
          <li><a href="viewStudents.php">View Students</a></li>
          <li><a href="addStudent.php">Add Student</a></li>
          <li><a href="removeStudent.php">Remove Student</a></li>
          <li><a href="updateStudent.php">Update Student</a></li>
        </ul>
      </li>
      <li class="expander" id="students-expander">
        <a class="nav-list" href="#">Courses</a>
        <ul class="sub-list" id="students-submenu">
          <li><a href="viewCourses.php">All Courses</a></li>
          <li><a href="addCourse.php">Add Course</a></li>
          <li><a href="removeCourse.php">Remove Course</a></li>
        </ul>
      </li>
      <li class="expander" id="users-expander">
        <a class="nav-list" href="#">Classes</a>
        <ul class="sub-list" id="users-submenu">
          <li><a href="viewClasses.php">View Classes</a></li>
          <li><a href="addClass.php">Add New Class</a></li>
          <li><a href="removeClass.php">Remove Class</a></li>
          <li><a href="updateClass.php">Update Class</a></li>
        </ul>
      </li>
      <li class="expander" id="instructors-expander">
        <a class="nav-list" href="#">Schedules</a>
        <ul class="sub-list" id="instructors-submenu">
          <li><a href="viewSchedules.php">View Schedules</a></li>
          <li><a href="addSchedule.php">Add New Schedule</a></li>
          <li><a href="deleteSchedule.php">Delete Schedule</a></li>
        </ul>
      </li>
      <li class="expander" id="sessions-expander">
        <a class="nav-list" href="#">Sessions</a>
        <ul class="sub-list" id="sessions-submenu">
          <li><a href="viewSessions.php">View Sessions</a></li>
          <li><a href="addSession.php">Add New Session</a></li>
        </ul>
      </li>
      <li class="expander" id="sessions-expander">
        <a class="nav-list" href="#">Reports</a>
        <ul class="sub-list" id="sessions-submenu">
          <li><a href="viewReports.php">View Reports</a></li>
        </ul>
      </li>
      <li class="expander" id="students-expander">
        <a class="nav-list" href="#">
          <img src="../assets/images/admin.svg" style="max-width: 35px;">
        </a>
        <ul class="sub-list" id="students-submenu">
          <li style="width: auto;"><a href="../scripts/logout.php">Logout</a></li>
          <li style="width: auto;"><a href="updateAdmin.php">Update Profile</a></li>
          <li style="width: auto;"><a href="viewProfile.php">View Profile</a></li>
        </ul>
      </li>
    </ul>
  </div>
</nav>