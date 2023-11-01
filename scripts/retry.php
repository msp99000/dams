<!DOCTYPE html>
<html>
<head>
    <title>Login Error</title>
    <style>
        body {
            background-color: #f0f0f0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            font-family: Arial, sans-serif;
        }

        .error-container {
            text-align: center;
            background-color: #ffffff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
            border-radius: 10px;
            padding: 30px;
        }

        .error-text {
            font-size: 24px;
            color: #ff5555;
            margin-bottom: 20px;
        }

        .try-again-button {
            background-color: #3498db;
            color: #fff;
            border: none;
            border-radius: 30px;
            padding: 10px 20px;
            font-size: 18px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .try-again-button:hover {
            background-color: #297fb8;
        }
    </style>
</head>
<body>
    <div class="error-container">
        <div class="error-text">Invalid Username/Password</div>
        <button class="try-again-button" onclick="redirectLogin()">Try Again</button>
    </div>

    <script>
        function redirectLogin() {
            window.location.href = "../index.php"; // Replace "login.html" with the actual login page URL
        }
    </script>
</body>
</html>
