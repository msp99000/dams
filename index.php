<?php session_start(); ?>
<!DOCTYPE html>
<html>

<head>
    <title>DAMS - Login</title>
    <link href="assets/images/favicon.png" rel="icon">
    <link rel="stylesheet" href="css/login.css">
</head>

<body>
    <div class="login-container">
        <div class="login-card">
            <img src="assets/images/logo.png" alt="DAMS Logo" style="width:300px;height:300px">
            <form method="POST" action="scripts/login.php">
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
                    <input type="password" id="password" name="password" class="rounded-input" placeholder="Password" required>
                </div>
                <?php if (isset($_GET['error'])) { ?> <h4 style="color:red;"> Invalid Username or Password.</h1> <?php } ?>
                    <div class="input-group">
                        <input type="submit" class="rounded-button" name="login-button" value="Login">
                    </div>
                    <div class="forgot-password-link">
                        <a href="config/forgotPassword.php">Forgot Password?</a>
                    </div>
            </form>
        </div>
        <?php include "components/footer.php" ?>
    </div>
</body>

</html>