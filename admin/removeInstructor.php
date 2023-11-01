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
                                <img src="../assets/images/teacher.png">
                                <div>
                                    Remove Instructor
                                </div>
                            </div>
                            <div class="card-body">
                                <form method="post" action="process.php">
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label" >Enter the Instructor ID</label> 
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control" name="instructorId" placeholder="Instructor ID" required>
                                        </div>
                                        <div class="col-sm-2">
                                            <button type="submit" name="removeInstructor" class="btn btn-danger">Remove</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <!-- <?php include "instructorsTable.php"; ?> -->
                        <?php include "../components/footer.php"; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
