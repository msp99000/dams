<nav class="navbar">
  <div class="navbar-container">
    <div class="brand">
        <img src="../assets/images/brand.png" style="max-width: 60px; margin-right:24px" >
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
          <li><a href="markAttendance.php">Attedance Reports</a></li>
        </ul>
      </li>
      <li class="expander" id="users-expander">
        <a class="nav-list" href="#">Classes</a>
        <ul class="sub-list" id="users-submenu">
          <li><a href="viewClasses.php">All Classes</a></li>
          <li><a href="addClass.php">Upcoming Classes</a></li>
        </ul>
      </li>
      <li class="expander" id="instructors-expander">
        <a class="nav-list" href="#">Leaves</a>
        <ul class="sub-list" id="instructors-submenu">
          <li><a href="viewLeaves.php">New Leave Request</a></li>
          <li><a href="manageLeaves.php">All Leave Requests</a></li>
        </ul>
      </li>
      <li class="expander" id="instructors-expander">
        <a class="nav-list" href="#">Schedules</a>
        <ul class="sub-list" id="instructors-submenu">
          <li><a href="viewSchedules.php">View Schedules</a></li>
        </ul>
      </li>
      <li class="expander" id="students-expander">
        <a class="nav-list" href="#">
          <img src="../assets/images/student.svg" style="max-width: 25px">
        </a>
        <ul class="sub-list" id="students-submenu">
          <li style="width: auto;" ><a href="../scripts/logout.php">Logout</a></li>
        </ul>
      </li> 
    </ul>
  </div>
</nav>