<?php session_start();

include "../config/connection.php";
include "../scripts/authenticate.php";

$database = new Database();
$conn = $database->getConnection();

$userAuth = new UserAuth($conn);

if (isset($_POST['forgotpassword'])) {
    $userType = $_POST['user-type'];
    $username = $_POST['username'];
    $email = $_POST['email'];

    $result = $userAuth->sendPasswordResetEmail($userType, $username, $email);

    if ($result === true) {
        $success_message = "pass";
        header("Location: ../index.php?success=$success_message");
    } else {
        $error_message = "fail";
        header("Location: forgotpassword.php?error=$error_message");
    }
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>DAMS - Forgot Password</title>
    <link href="../assets/images/favicon.png" rel="icon">
    <link rel="stylesheet" href="../css/login.css">
</head>

<body>
    <div class="login-container">
        <div class="login-card">
            <h1>Forgot Password</h1></br>
            <form method="POST" action="">
                <div class="input-group">
                    <select id="user-type" name="user-type" class="rounded-input" required>
                        <option value=""> - - Select User - - </option>
                        <option value="Administrator">Administrator</option>
                        <option value="Instructor">Instructor</option>
                        <option value="Student">Student</option>
                    </select>
                </div>
                <div class="input-group">
                    <input type="text" id="username" name="username" class="rounded-input" placeholder="Username" required>
                </div>
                <div class="input-group">
                    <input type="email" id="email" name="email" class="rounded-input" placeholder="Email" required>
                </div>
                <?php if (isset($_GET['error'])) { ?> <h4 style="color:red;"> Invalid Username or Email.</h1> <?php } ?>
                    <div class="input-group">
                        <input type="submit" class="rounded-button" name="forgotpassword" value=" Send Password">
                    </div>
                    <div class="forgot-password-link">
                        <a href="../index.php">Back to Login</a>
                    </div>
            </form>
        </div>
        <?php include "../components/footer.php" ?>
    </div>
</body>

</html>