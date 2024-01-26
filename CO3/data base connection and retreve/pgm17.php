<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Registration</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #ffdddd;
            margin: 0;
            padding: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        form {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        label {
            color: #ff0000;
            font-weight: bold;
            display: block;
            margin-bottom: 5px;
        }

        input {
            width: 100%;
            padding: 10px;
            margin: 8px 0;
            box-sizing: border-box;
        }

        input[type="submit"] {
            background-color: #ff0000;
            color: #ffffff;
            padding: 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #cc0000;
        }

        table {
            width: 100%;
            margin-top: 20px;
            border-collapse: collapse;
        }

        table, th, td {
            border: 1px solid #ff0000;
        }

        th, td {
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #ff0000;
            color: #ffffff;
        }
    </style>
</head>

<body>

    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <label for="student_id">Student ID:</label>
        <input type="text" name="student_id" required><br>

        <label for="student_name">Student Name:</label>
        <input type="text" name="student_name" required><br>

        <label for="student_dob">Date of Birth:</label>
        <input type="date" name="student_dob" required><br>

        <label for="student_course">Course:</label>
        <input type="text" name="student_course" required><br>

        <label for="student_place">Place:</label>
        <input type="text" name="student_place" required><br>

        <input type="submit" value="Submit">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
       
        $student_id = $_POST["student_id"];
        $student_name = $_POST["student_name"];
        $student_dob = $_POST["student_dob"];
        $student_course = $_POST["student_course"];
        $student_place = $_POST["student_place"];

        $servername = "localhost";
        $database = "student";
        $username = "root";
        $password = "";
        $conn = mysqli_connect($servername, $username, $password, $database);

        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

        $sql = "INSERT INTO table_student (student_id, student_name, student_dob, student_course, student_place) VALUES 
                ('$student_id', '$student_name', '$student_dob', '$student_course', '$student_place')";

        if (mysqli_query($conn, $sql)) {
            echo "Record inserted successfully";
        } else {
            echo "Error inserting record: " . mysqli_error($conn);
        }
        $sqlSelect = "SELECT * FROM table_student";
        $result = mysqli_query($conn, $sqlSelect);
        if ($result && mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
        echo "<br>Student ID: " . $row["student_id"].
             " - Name: " . $row["student_name"].
             " - DOB: " . $row["student_dob"].
             " - Course: " . $row["student_course"].
             " - Place: " . $row["student_place"]; }
        } else {
        echo "No records found";
        }
        mysqli_close($conn);
    }
    ?>

</body>

</html>
