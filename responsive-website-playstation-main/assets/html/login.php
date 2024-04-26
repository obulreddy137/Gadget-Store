<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login and Register</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f5f9;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            background-color: #ffffff;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0px 0px 10px 0px rgba(0, 0, 0, 0.1);
            width: 300px;
        }

        h2 {
            text-align: center;
            color: #005a8d;
        }

        p {
            color: #005a8d;
        }

        input[type="text"],
        input[type="password"],
        input[type="submit"] {
            width: 100%;
            padding: 10px;
            margin: 8px 0;
            display: inline-block;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            background-color: #005a8d;
            color: white;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #004274;
        }

        .switch-btn {
            text-align: center;
            margin-top: 10px;
        }

        .switch-btn a {
            color: #005a8d;
            text-decoration: none;
        }

        .switch-btn a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="container">
        <?php
        // Check if the form is submitted
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Check if username and password are correct
            $username = $_POST["username"];
            $password = $_POST["password"];
            if ($username === "obul" && $password === "1234") {
                // Set session variable
                session_start();
                $_SESSION["username"] = $username;
                // Display logged-in message and button to go back to home page
                echo "<h2>Logged in successfully</h2>";
                echo "<p>Welcome, $username!</p>";
                echo '<a href="./controllers.html">Go to Home Page</a>';
                exit();
            } else {
                // Display error message and keep the user on the same page
                echo "<h2>Login</h2>";
                echo "<p>Invalid username or password. Please try again.</p>";
            }
        }
        // Show login form
        echo '<form action="' . htmlspecialchars($_SERVER["PHP_SELF"]) . '" method="POST">';
        echo '<input type="text" name="username" placeholder="Username" required><br>';
        echo '<input type="password" name="password" placeholder="Password" required><br>';
        echo '<input type="submit" value="Login">';
        echo '</form>';
        echo '<div class="switch-btn">';
        echo '<a href="#">Register</a>';
        echo '</div>';
        ?>
    </div>
</body>
</html>
