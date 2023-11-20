<!DOCTYPE html>
<html lang="en">

<head>
    <?php include "heads.php"; ?>
</head>

<body>
    <?php include "topbar.php"; ?>
    <div class="container-fluid" id="container-wrapper">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">View Classes</h1>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="./">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Instructor Panel</li>
            </ol>
        </div>
        <?php include "classesTable.php"; ?>
    </div>
</body>

</html>