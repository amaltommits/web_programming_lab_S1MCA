<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Electricity Bill Calculator</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f0f0f0;
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
            text-align: center;
        }

        h2 {
            color: #333;
        }

        label {
            color: #555;
            font-weight: bold;
        }

        input {
            width: 100%;
            padding: 10px;
            margin: 8px 0;
            box-sizing: border-box;
        }

        input[type="number"] {
            width: calc(100% - 20px);
            margin-right: 20px;
        }

        input[type="submit"] {
            background-color: #4caf50;
            color: #fff;
            padding: 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }

        p {
            color: #333;
            margin: 10px 0;
        }
    </style>
</head>

<body>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $consumedUnits = isset($_POST['units']) ? floatval($_POST['units']) : 0;
        $fixedCharge = 50; 
        $variableCharge = 5;
        $electricityBill = $fixedCharge + ($consumedUnits * $variableCharge);
    ?>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <h2>Electricity Bill</h2>
            <p>Consumed Units: <?php echo $consumedUnits; ?></p>
            <p>Fixed Charge: <?php echo $fixedCharge; ?></p>
            <p>Variable Charge per Unit: <?php echo $variableCharge; ?></p>
            <p>Total Bill: <?php echo $electricityBill; ?></p>
        </form>
    <?php } else { ?>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <h2>Electricity Bill Calculator</h2>
            <label for="units">Enter Consumed Units:</label>
            <input type="number" name="units" required>
            <br>
            <input type="submit" value="Calculate Bill">
        </form>
    <?php } ?>

</body>

</html>

