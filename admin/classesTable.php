<div class="row">
    <div class="col-lg-12">
        <div class="card mb-4">
            <div class="table-text">
                <img src="../assets/images/classes.png">
                <div>
                    Classes
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive p-3">
                    <table class="table align-items-center table-flush table-hover" id="dataTableHover">
                        <thead class="thead-light">
                            <tr>
                                <th>Class ID</th>
                                <th>Section</th>
                                <th>Course ID</th>
                                <th>Session ID</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            include "admin.php";
                            $admin = new Admin();
                            $users = $admin->list_classes();

                            foreach ($users as $user) {
                                echo "<tr>";
                                echo "<td>" . $user['class_id'] . "</td>";
                                echo "<td>" . $user['section'] . "</td>";
                                echo "<td>" . $user['course_id'] . "</td>";
                                echo "<td>" . $user['session_id'] . "</td>";
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