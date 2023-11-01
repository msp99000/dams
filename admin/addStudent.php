<!DOCTYPE html>
<html>
<head>
   <?php include "heads.php"; ?> 
</head>
<body id="page-top">
    <?php include "topbar.php"; ?>
    <div id="content-wrapper" class="d-flex flex-column">
        <div id="content">
            <div class="container-fluid" id="container-wrapper">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card mb-4">
                            <div class="welcome-text">
                                Add New Student
                            </div>
                            <div class="card-body">
                                <form method="post" action="process.php">
                                    <div class="form-group row mb-3">
                                        <div class="col-xl-6">
                                            <label class="form-control-label">First Name<span class="text-danger ml-2">*</span></label>
                                            <input type="text" class="form-control" name="firstName" id="exampleInputFirstName" placeholder="First Name">
                                        </div>
                                        <div class="col-xl-6">
                                            <label class="form-control-label">Last Name<span class="text-danger ml-2">*</span></label>
                                            <input type="text" class="form-control" name="lastName" id="exampleInputFirstName" placeholder="Last Name">
                                        </div>
                                    </div>
                                    <div class="form-group row mb-3">
                                        <div class="col-xl-6">
                                            <label class="form-control-label">Email Address<span class="text-danger ml-2">*</span></label>
                                            <input type="text" class="form-control" name="email" id="exampleInputFirstName" placeholder="Email Address">
                                        </div> 
                                        <div class="col-xl-6">
                                            <label class="form-control-label">Date of Birth<span class="text-danger ml-2">*</span></label>
                                            <input type="date" class="form-control" name="dob" id="exampleInputFirstName" placeholder="DOB">
                                        </div>
                                    </div>
                                    <div class="form-group row mb-3">
                                        <div class="col-xl-6">
                                            <label class="form-control-label">Phone Number<span class="text-danger ml-2">*</span></label>
                                            <input type="text" class="form-control" name="phone" id="exampleInputFirstName" placeholder="Phone Number">
                                        </div>
                                        <div class="col-xl-6">
                                            <label class="form-control-label">Password<span class="text-danger ml-2">*</span></label>
                                            <input type="password" class="form-control" name="password" id="exampleInputFirstName" placeholder="Password">
                                        </div>
                                    </div>
                                    <div class="form-group row mb-3">
                                        <div class="col-xl-6">
                                            <label class="form-control-label">Username<span class="text-danger ml-2">*</span></label>
                                            <input type="text" class="form-control" name="username" id="exampleInputFirstName" placeholder="Username">
                                        </div>
                                        <div class="col-xl-6">
                                            <label class="form-control-label">Student ID<span class="text-danger ml-2">*</span></label>
                                            <input type="text" class="form-control" name="studentId" id="exampleInputFirstName" placeholder="Student ID">
                                        </div>
                                    </div>
                                    <button type="submit" name="addStudent" class="btn btn-primary">Add</button>
                                </form>
                            </div>
                        </div>
                        <?php include "studentsTable.php"; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
