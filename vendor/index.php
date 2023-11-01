<?php 
include 'config/connection.php';
// include 'config/session.php';
// session_start();
?>

<!-- <!DOCTYPE html> -->
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="src/assets/images/favicon.png" rel="icon">
    <title>DAMS - Login</title>
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="css/ruang-admin.min.css" rel="stylesheet">

    <!-- Login Content -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="js/ruang-admin.min.js"></script>

</head>

<body class="bg-gradient-login">
    <!-- Login Content -->
    <div class="container-login">
        <div class="row justify-content-center">
            <div class="col-xl-10 col-lg-12 col-md-9">
                <div class="card shadow-sm my-5">
                    <div class="card-body p-0">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="login-form">
                                    <div class="text-center">
                                        <img src="assets/images/logo.png" style="width:400px;height:280px">
                                        <br><br>
                                        <h1 class="h4 text-gray-900 mb-4">Login Panel</h1>
                                    </div>
                                    <form class="user" method="Post" action="">
                                        <div class="form-group">
                                            <select required name="userType" class="form-control mb-3">
                                                <option value="">Select User</option>
                                                <option value="Administrator">Administrator</option>
                                                <option value="Instructor">Instructor</option>
                                                <option value="Student">Student</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control" required name="username" id="exampleInputEmail" placeholder="Enter Email Address">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" name="password" required class="form-control" id="exampleInputPassword" placeholder="Enter Password">
                                        </div>
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox small" style="line-height: 1.5rem; border-radius: 30px;">
                                                <input type="checkbox" class="custom-control-input" id="customCheck">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <input type="submit" class="btn btn-success btn-block" value="Login" name="login" />
                                        </div>
                                    </form>

                                    <?php

                                    if(isset($_POST['login'])){

                                        $userType = $_POST['userType'];
                                        $username = $_POST['username'];
                                        $password = $_POST['password'];
                                        $password = md5($password);

                                        if($userType == "Administrator"){

                                            $query = "SELECT * FROM admin WHERE emailAddress = '$username' AND password = '$password'";
                                            $rs = $conn->query($query);
                                            $num = $rs->num_rows;
                                            $rows = $rs->fetch_assoc();

                                            if($num > 0){

                                                $_SESSION['userId'] = $rows['Id'];
                                                $_SESSION['firstName'] = $rows['firstName'];
                                                $_SESSION['lastName'] = $rows['lastName'];
                                                $_SESSION['emailAddress'] = $rows['emailAddress'];

                                                echo "<script type = \"text/javascript\">
                                                    window.location = (\"users/admin/index.php\")
                                                </script>";

                                                echo "Done";
                                            } else {

                                                echo "<div class='alert alert-danger' role='alert'>
                                                    Invalid Username/Password!
                                                </div>";

                                            }

                                        } else if($userType == "Instructor"){

                                            $query = "SELECT * FROM Instructor WHERE emailAddress = '$username' AND password = '$password'";
                                            $rs = $conn->query($query);
                                            $num = $rs->num_rows;
                                            $rows = $rs->fetch_assoc();

                                            if($num > 0){

                                                $_SESSION['userId'] = $rows['Id'];
                                                $_SESSION['firstName'] = $rows['firstName'];
                                                $_SESSION['lastName'] = $rows['lastName'];
                                                $_SESSION['emailAddress'] = $rows['emailAddress'];
                                                $_SESSION['classId'] = $rows['classId'];
                                                $_SESSION['courseId'] = $rows['courseId'];

                                                echo "<script type = \"text/javascript\">
                                                    window.location = (\"users/instructor/index.php\")
                                                </script>";
                                            } else {

                                                echo "<div class='alert alert-danger' role='alert'>
                                                    Invalid Username/Password!
                                                </div>";

                                            }
                                        } else {

                                            echo "<div class='alert alert-danger' role='alert'>
                                                Invalid Username/Password!
                                            </div>";

                                        }
                                    }

                                    ?>
                                    
                                    <div class="text-center">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
