<div class="row">
    <div class="col-lg-12">
        <div class="card mb-4">
        <div class="table-text">
            <img src="../assets/images/courses.png" >
            <div> 
                Courses
            </div>
        </div>
            <div class="card-body">
                <div class="table-responsive p-3">
                    <table class="table align-items-center table-flush table-hover" id="dataTableHover">
                        <thead class="thead-light">
                            <tr>
                                <th>Course ID</th>
                                <th>Course Code</th>
                                <th>Course Name</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            include "admin.php";
                            $admin = new Admin();
                            $users = $admin->list_courses();

                            foreach ($users as $user) {
                                echo "<tr>";
                                echo "<td>" . $user['course_id'] . "</td>";
                                echo "<td>" . $user['course_code'] . "</td>";
                                echo "<td>" . $user['course_name'] . "</td>";
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
