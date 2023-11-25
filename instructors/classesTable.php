<?php

session_start();

?>
<div class="row">
    <div class="col-lg-12">
        <div class="card mb-4">
            <div class="table-text">
                <img src="../assets/images/classes.png">
                <div>
                    My Classes
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive p-3">
                    <table class="table align-items-center table-flush table-hover" id="dataTableHover">
                        <thead class="thead-light">
                            <tr>
                                <th>Class ID</th>
                                <th>Section</th>
                                <th>Schedule</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php

                            include "instructor.php";

                            $id = $_SESSION['instructor_id'];

                            $instructor = new Instructor();

                            $users = $instructor->list_classes($id);

                            foreach ($users as $user) {
                                echo "<tr>";
                                echo "<td>" . $user['class_id'] . "</td>";
                                echo "<td>" . $user['section'] . "</td>";
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