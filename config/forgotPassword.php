<!DOCTYPE html>
<html>

<head>
    <title>DAMS - Forgot Password</title>
    <link href="assets/images/favicon.png" rel="icon">
    <link rel="stylesheet" href="css/login.css">
    <style>
        .reset-card {
            max-width: 400px;
            margin: auto;
        }

        .reset-card img {
            margin: 0 auto 20px;
            display: block;
        }

        .reset-card h2 {
            margin-bottom: 20px;
            color: #333;
            font-size: 24px;
        }

        .reset-card .rounded-input {
            margin-bottom: 15px;
        }

        .reset-card .rounded-button {
            margin-top: 20px;
        }

        .reset-card .login-link {
            margin-top: 15px;
            font-size: 14px;
        }
    </style>
</head>

<body>
    <div class="login-container">
        <div class="reset-card">
            <img src="assets/images/logo.png" alt="DAMS Logo" style="width:250px;height:250px">
            <h2>Forgot Password</h2>
            <form method="POST" action="forgot_password.php">
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
                    <input type="submit" class="rounded-button" name="forgot-password-button" value="Reset Password">
                </div>
                <div class="login-link">
                    <a href="index.php">Back to Login</a>
                </div>
            </form>
        </div>
        <?php include "../components/footer.php"; ?>
    </div>
</body>

</html>