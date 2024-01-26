<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Registration</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 300px;
            text-align: center;
        }

        h2 {
            color: #333;
        }

        input {
            width: 100%;
            padding: 10px;
            margin: 8px 0;
            box-sizing: border-box;
        }

        .error {
            color: red;
        }

        .submit-btn {
            background-color: #4caf50;
            color: #fff;
            padding: 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .submit-btn:hover {
            background-color: #45a049;
        }
    </style>
</head>

<body>

    <?php
    $nameErr = $emailErr = $passwordErr = $confirmPasswordErr = "";
    $name = $email = $password = $confirmPassword = "";
    function test_input($data) {
        return htmlspecialchars(stripslashes(trim($data)));
    }
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (empty($_POST["name"])) {
            $nameErr = "Name is required";
        } else {
            $name = test_input($_POST["name"]);
            if (!preg_match("/^[a-zA-Z ]*$/", $name)) {
                $nameErr = "Only letters and white space allowed";
            }
        }
    
        if (empty($_POST["email"])) {
            $emailErr = "Email is required";
        } else {
            $email = test_input($_POST["email"]);
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $emailErr = "Invalid email format";
            }
        }
    
        if (empty($_POST["password"])) {
            $passwordErr = "Password is required";
        } else {
            $password = test_input($_POST["password"]);
    
        }
        if (empty($_POST["confirmPassword"])) {
            $confirmPasswordErr = "Please confirm your password";
        } else {
            $confirmPassword = test_input($_POST["confirmPassword"]);
            if ($password !== $confirmPassword) {
                $confirmPasswordErr = "Passwords do not match";
            }
        }
    }
    ?>

    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <h2>User Registration</h2>
        <p><span class="error">* Required field</span></p>

        Name: <input type="text" name="name" value="<?php echo $name; ?>"><br>
        <span class="error"><?php echo $nameErr; ?></span><br>

        Email: <input type="text" name="email" value="<?php echo $email; ?>"><br>
        <span class="error"><?php echo $emailErr; ?></span><br>

        Password: <input type="password" name="password"><br>
        <span class="error"><?php echo $passwordErr; ?></span><br>

        Confirm Password: <input type="password" name="confirmPassword"><br>
        <span class="error"><?php echo $confirmPasswordErr; ?></span><br>

        <input class="submit-btn" type="submit" name="submit" value="Register">
    </form>

</body>

</html>

