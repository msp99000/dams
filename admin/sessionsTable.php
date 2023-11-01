<div class="row">
    <div class="col-lg-12">
        <div class="card mb-4">
        <div class="table-text">
            <img src="../assets/images/sessions.png" >
            <div> 
                Sessions
            </div>
        </div>
            <div class="card-body">
                <div class="table-responsive p-3">
                    <table class="table align-items-center table-flush table-hover" id="dataTableHover">
                        <thead class="thead-light">
                            <tr>
                                <th>Session ID</th>
                                <th>Session Name</th>
                                <th>Year</th>
                                <th>Start Date</th>
                                <th>End Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            include "admin.php";
                            $admin = new Admin();
                            $users = $admin->list_sessions();

                            foreach ($users as $user) {
                                echo "<tr>";
                                echo "<td>" . $user['session_id'] . "</td>";
                                echo "<td>" . $user['session_name'] . "</td>";
                                echo "<td>" . $user['year'] . "</td>";
                                echo "<td>" . $user['start_date'] . "</td>";
                                echo "<td>" . $user['end_date'] . "</td>";
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