<nav class="navbar">
  <div class="navbar-container">
    <div class="brand">
      <img src="../assets/images/brand.png" style="max-width: 60px; margin-right:24px">
      <a href="index.php" style="color: white; text-decoration: none;">D A M S</a>
    </div>
    <div class="mobile-menu-button">
      <div class="bar"></div>
      <div class="bar"></div>
      <div class="bar"></div>
    </div>
    <ul class="nav-list">
      <li class="expander" id="students-expander">
        <a class="nav-list" href="#">Attendance</a>
        <ul class="sub-list" id="students-submenu">
          <li><a href="viewAttendance.php">View Attedance</a></li>
          <li><a href="markAttendance.php">Mark Attedance</a></li>
          <li><a href="editAttendance.php">Edit Attedance</a></li>
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
      <li class="expander" id="students-expander">
        <a class="nav-list" href="#">Students</a>
        <ul class="sub-list" id="students-submenu">
          <li><a href="viewStudents.php">View Students</a></li>
        </ul>
      </li>
      <li class="expander" id="instructors-expander">
        <a class="nav-list" href="#">Leaves</a>
        <ul class="sub-list" id="instructors-submenu">
          <li><a href="viewLeaves.php">View Leave Requests</a></li>
          <li><a href="manageLeaves.php">Manage Leave Requests</a></li>
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
      <li class="expander" id="students-expander">
        <a class="nav-list" href="#">
          <img src="../assets/images/teacher.svg" style="max-width: 35px">
        </a>
        <ul class="sub-list" id="students-submenu">
          <li style="width: auto;"><a href="../scripts/logout.php">Logout</a></li>
        </ul>
      </li>
    </ul>
  </div>
</nav>