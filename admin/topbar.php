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
      <li class="expander" id="instructors-expander">
        <a class="nav-list" href="#">Instructors</a>
        <ul class="sub-list" id="instructors-submenu">
          <li><a href="../pages/viewInstructors.php">View Instructors</a></li>
          <li><a href="../pages/addInstructor.php">Add Instructor</a></li>
          <li><a href="../pages/removeInstructor.php">Remove Instructor</a></li>
          <li><a href="../pages/updateInstructor.php">Update Instructor</a></li>
        </ul>
      </li>
      <li class="expander" id="students-expander">
        <a class="nav-list" href="#">Students</a>
        <ul class="sub-list" id="students-submenu">
          <li><a href="../pages/viewStudents.php">View Students</a></li>
          <li><a href="../pages/addStudent.php">Add Student</a></li>
          <li><a href="../pages/removeStudent.php">Remove Student</a></li>
          <li><a href="../pages/updateStudent.php">Update Student</a></li>
        </ul>
      </li>
      <li class="expander" id="sessions-expander">
        <a class="nav-list" href="#">Sessions</a>
        <ul class="sub-list" id="sessions-submenu">
          <li><a href="../pages/viewSessions.php">View Sessions</a></li>
          <li><a href="../pages/addSession.php">Add New Session</a></li>
        </ul>
      </li>
      <li class="expander" id="admins-expander">
        <a class="nav-list" href="#">Attendance</a>
        <ul class="sub-list" id="admins-submenu">
          <li><a href="../pages/viewAdmins.php">Instructor Attendance</a></li>
          <li><a href="../pages/addAdmin.php">Mark Attendance</a></li>
        </ul>
      </li>
      <li class="expander" id="students-expander">
        <a class="nav-list" href="#">
          <img src="../assets/images/admin.svg" style="max-width: 35px;">
        </a>
        <ul class="sub-list" id="students-submenu">
          <li style="width: auto;"><a href="../scripts/logout.php">Logout</a></li>
          <li style="width: auto;"><a href="../pages/updateAdmin.php">Edit Profile</a></li>
        </ul>
      </li>
    </ul>
  </div>
</nav>