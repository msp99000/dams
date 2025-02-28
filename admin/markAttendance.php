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
                            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                                <h1 class="h3 mb-0 text-gray-800"></h1>
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="./">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Admin Panel</li>
                                </ol>
                            </div>
                            <div class="table-text">
                                <img src="../assets/images/attendance.png">
                                <div>
                                    Mark Attendance
                                </div>
                            </div>
                            <div class="card-body">
                                <form method="post" action="process.php">
                                    <div class="form-group row mb-3">
                                        <div class="col-xl-6">
                                            <label class="form-control-label">First Name<span class="text-danger ml-2">*</span></label>
                                            <input type="text" class="form-control" name="firstName" id="exampleInputFirstName" placeholder="First Name" required>
                                        </div>
                                        <div class="col-xl-6">
                                            <label class="form-control-label">Last Name<span class="text-danger ml-2">*</span></label>
                                            <input type="text" class="form-control" name="lastName" id="exampleInputFirstName" placeholder="Last Name" required>
                                        </div>
                                    </div>
                                    <div class="form-group row mb-3">
                                        <div class="col-xl-6">
                                            <label class="form-control-label">Gender<span class="text-danger ml-2">*</span></label>
                                            <select class="form-control mb-3" name="gender" required>
                                                <option> -- Select -- </option>
                                                <option value="1">Male</option>
                                                <option value="2">Female</option>
                                            </select>
                                        </div>
                                        <div class="col-xl-6">
                                            <label class="form-control-label">Date of Birth<span class="text-danger ml-2">*</span></label>
                                            <input type="date" class="form-control" name="dob" id="exampleInputFirstName" placeholder="DOB" required>
                                        </div>
                                    </div>
                                    <div class="form-group row mb-3">
                                        <div class="col-xl-6">
                                            <label class="form-control-label">Email Address<span class="text-danger ml-2">*</span></label>
                                            <input type="text" class="form-control" name="email" id="exampleInputFirstName" placeholder="Email Address" required>
                                        </div>
                                        <div class="col-xl-6">
                                            <label class="form-control-label">Phone Number<span class="text-danger ml-2">*</span></label>
                                            <input type="text" class="form-control" name="phone" id="exampleInputFirstName" placeholder="Phone Number" required>
                                        </div>
                                    </div>
                                    <div class="form-group row mb-3">
                                        <div class="col-xl-6">
                                            <label class="form-control-label">Username<span class="text-danger ml-2">*</span></label>
                                            <input type="text" class="form-control" name="username" id="exampleInputFirstName" placeholder="Username" required>
                                        </div>
                                        <div class="col-xl-6">
                                            <label class="form-control-label">Password<span class="text-danger ml-2">*</span></label>
                                            <select class="form-control mb-3" id="class" name="class" required>
                                                <option value="" disabled selected>-- Select --</option>
                                                <?php
                                                // Include the class file
                                                require_once('../options.php');

                                                // Create an instance of the DatabaseHandler class
                                                $users = new Options();

                                                // Get class options
                                                $classOptions = $users->classId_options();

                                                // Populate select options
                                                foreach ($classOptions as $option) {
                                                    echo "<option value='" . $option . "'>" . $option . "</option>";
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <button type="submit" name="addAdmin" class="btn btn-primary">Add</button>
                                </form>
                            </div>
                        </div>
                        <?php include "../components/footer.php"; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>