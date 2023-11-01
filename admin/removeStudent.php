<!DOCTYPE html>
<html>
<head>
    <?php include "heads.php" ?>
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
                                Remove Student
                            </div>
                            <div class="card-body">
                                <form method="post" action="process.php">
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Student ID</label>
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control" name="studentId" required>
                                        </div>
                                        <div class="col-sm-2">
                                            <button type="submit" name="removeStudent" class="btn btn-danger">Remove</button>
                                        </div>
                                    </div>
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
