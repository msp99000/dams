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
                                            <label class="form-control-label">Section<span class="text-danger ml-2">*</span></label>
                                            <input type="text" class="form-control" name="firstName" id="exampleInputFirstName" placeholder="Section">
                                        </div>
                                        <div class="col-xl-6">
                                            <label class="form-control-label">Course ID<span class="text-danger ml-2">*</span></label>
                                            <input type="text" class="form-control" name="courseId" id="exampleInputFirstName" placeholder="Course ID">
                                        </div>
                                    </div>
                                    <button type="submit" name="addStudent" class="btn btn-primary">Add</button>
                                </form>
                            </div>
                        </div>
                        <?php include "classesTable.php"; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
