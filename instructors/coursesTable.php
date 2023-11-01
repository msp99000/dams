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
                                include "instructor.php";
                                $admin = new Instructor();
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
</div>