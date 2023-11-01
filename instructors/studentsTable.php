<div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"></h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="./">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Instructor Panel</li>
        </ol>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card mb-4">
            <div class="table-text">
                <img src="../assets/images/student.png" >
                <div> 
                    Students
                </div>
            </div>
                <div class="table-responsive p-3">
                    <table class="table align-items-center table-flush table-hover" id="dataTableHover">
                        <thead class="thead-light">
                            <tr>
                                <th>Student ID</th>
                                <th>Username</th>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>DOB</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            include "instructor.php";
                            $admin = new Instructor();
                            $users = $admin->list_students();

                            foreach ($users as $user) {
                                echo "<tr>";
                                echo "<td>" . $user['student_id'] . "</td>";
                                echo "<td>" . $user['username'] . "</td>";
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
