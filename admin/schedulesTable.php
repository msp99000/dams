<div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"></h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="./">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Admin Panel</li>
        </ol>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card mb-4">
                <div class="table-text">
                    <img src="../assets/images/schedules.png">
                    <div>
                        Schedules
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive p-3">
                        <table class="table align-items-center table-flush table-hover" id="dataTableHover">
                            <thead class="thead-light">
                                <tr>
                                    <th>Schedule ID</th>
                                    <th>Class ID</th>
                                    <th>Instructor ID</th>
                                    <th>Student ID</th>
                                    <th>Schedule</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                include "admin.php";
                                $admin = new Admin();
                                $users = $admin->list_schedules();

                                foreach ($users as $user) {
                                    echo "<tr>";
                                    echo "<td>" . $user['schedule_id'] . "</td>";
                                    echo "<td>" . $user['class_id'] . "</td>";
                                    echo "<td>" . $user['instructor_id'] . "</td>";
                                    echo "<td>" . $user['student_id'] . "</td>";
                                    echo "<td>" . $user['schedule'] . "</td>";
                                    echo "<td>" . $user['status'] . "</td>";
                                    echo "</tr>";
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>