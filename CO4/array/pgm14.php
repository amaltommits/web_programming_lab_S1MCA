<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
$indianPlayers = array("Virat Kohli", "Rohit Sharma", "KL Rahul", "Shikhar Dhawan",);

echo "<table border=1>";
echo "<tr><th>Indian Cricket Players</th></tr>";
foreach ($indianPlayers as $x) {
    echo "<tr><td>$x</td></tr>";
}
echo "</table>";
?>
</body>
</html>