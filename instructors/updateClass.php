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
                                    <li class="breadcrumb-item active" aria-current="page">Instructor Panel</li>
                                </ol>
                            </div>
                            <div class="table-text">
                                <img src="../assets/images/classes.png">
                                <div>
                                    Update Class
                                </div>
                            </div>
                            <div class="card-body">
                                <form method="post" action="process.php">
                                    <div class="form-group row mb-3">
                                        <div class="col-xl-6">
                                            <label class="form-control-label">Class ID<span class="text-danger ml-2">*</span></label>
                                            <input type="text" class="form-control" name="classId" id="exampleInputFirstName" placeholder="Class ID" required>
                                        </div>
                                        <div class="col-xl-6">
                                            <label class="form-control-label">Section<span class="text-danger ml-2">*</span></label>
                                            <input type="text" class="form-control" name="section" id="exampleInputFirstName" placeholder="Section" required>
                                        </div>
                                    </div>
                                    <div class="form-group row mb-3">
                                        <div class="col-xl-6">
                                            <label class="form-control-label">Course ID<span class="text-danger ml-2">*</span></label>
                                            <input type="text" class="form-control" name="courseId" id="exampleInputFirstName" placeholder="Course ID" required>
                                        </div>
                                        <div class="col-xl-6">
                                            <label class="form-control-label">Session ID<span class="text-danger ml-2">*</span></label>
                                            <input type="text" class="form-control" name="sessionId" id="exampleInputFirstName" placeholder="Session ID" required>
                                        </div>
                                    </div>
                                    <button type="submit" name="updateClass" class="btn btn-primary">Update</button>
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