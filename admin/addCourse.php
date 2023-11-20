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
                                <img src="../assets/images/courses.png">
                                <div>
                                    Add Course
                                </div>
                            </div>
                            <div class="card-body">
                                <form method="post" action="process.php">
                                    <div class="form-group row mb-3">
                                        <div class="col-xl-6">
                                            <label class="form-control-label">Course Name<span class="text-danger ml-2">*</span></label>
                                            <input type="text" class="form-control" name="courseName" id="exampleInputFirstName" placeholder="Course Name">
                                        </div>
                                        <div class="col-xl-6">
                                            <label class="form-control-label">Course Code<span class="text-danger ml-2">*</span></label>
                                            <input type="text" class="form-control" name="courseCode" id="exampleInputFirstName" placeholder="Course Code">
                                        </div>
                                    </div>
                                    <button type="submit" name="addCourse" class="btn btn-primary">Add</button>
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