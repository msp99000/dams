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
                                    Remove Class
                                </div>
                            </div>
                            <div class="card-body">
                                <form method="post" action="process.php">
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Class ID</label>
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control" name="classId" required>
                                        </div>
                                        <div class="col-sm-2">
                                            <button type="submit" name="removeClass" class="btn btn-danger">Remove</button>
                                        </div>
                                    </div>
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