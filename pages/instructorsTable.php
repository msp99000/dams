<div class="row">
    <div class="col-lg-12">
        <div class="card mb-4">
        <div class="table-text">
            <img src="../assets/images/teacher.png" >
            <div> 
                Instructors
            </div>
        </div>
            <div class="table-responsive p-3">
                <table class="table align-items-center table-flush table-hover" id="dataTableHover">
                    <thead class="thead-light">
                        <tr>
                            <th>Instructor ID</th>
                            <th>Username</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>DOB</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        include "admin.php";
                        $admin = new Admin();
                        $users = $admin->list_instructors();

                        foreach ($users as $user) {
                            echo "<tr>";
                            echo "<td>" . $user['instructor_id'] . "</td>";
                            echo "<td>" . $user['username'] . "</td>";
                            echo "<td>" . $user['first_name'] . "</td>";
                            echo "<td>" . $user['last_name'] . "</td>";
                            echo "<td>" . $user['email'] . "</td>";
                            echo "<td>" . $user['phone'] . "</td>";
                            echo "<td>" . $user['dob'] . "</td>";
                            echo "<td><a href='?action=edit&Id=".$user['instructor_id']."'><i class='fas fa-fw fa-edit'></i>Edit</a></td>";
                            echo "<td><a href='?action=delete&Id=".$user['instructor_id']."'><i class='fas fa-fw fa-trash'></i>Delete</a></td>";
                            echo "</tr>";
                        }

                        if (isset($_GET['Id']) && isset($_GET['action']) && $_GET['action'] == "delete") {
                                $Id= $_GET['Id'];
                        
                                $admin->remove_instructor($Id);
                        
                                echo "<script type = \"text/javascript\">
                                        window.location = (\"viewInstructors.php\")
                                      </script>";  
                            }

                        if (isset($_GET['Id']) && isset($_GET['action']) && $_GET['action'] == "edit") {
                                echo "<script type = \"text/javascript\">
                                        window.location = (\"updateInstructor.php\")
                                      </script>";  
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div> 
