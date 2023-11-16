<div class="row">
    <div class="col-lg-12">
        <div class="card mb-4">
            <div class="table-text">
                <img src="../assets/images/admin.png">
                <div>
                    Admin Profile
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive p-3">
                    <table class="table align-items-center table-flush table-hover" id="dataTableHover">
                        <thead class="thead-light">
                            <tr>
                                <th>ID</th>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>DOB</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            include "admin.php";
                            $admin = new Admin();
                            $users = $admin->list_admins();

                            foreach ($users as $user) {
                                echo "<tr>";
                                echo "<td>" . $user['admin_id'] . "</td>";
                                echo "<td>" . $user['first_name'] . "</td>";
                                echo "<td>" . $user['last_name'] . "</td>";
                                echo "<td>" . $user['email'] . "</td>";
                                echo "<td>" . $user['phone'] . "</td>";
                                echo "<td>" . $user['dob'] . "</td>";
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