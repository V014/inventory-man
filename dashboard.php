<?php
session_start();
require 'php/connection.php';

if (!isset($_SESSION['logged'])) {
    header("Location: index.php");
    exit;
}

// Get inventory data from database
$stmt = $conn->prepare("SELECT * FROM inventory");
$stmt->execute();
$inventory = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Inventory Management</title>
    <link rel="stylesheet" href="css/style.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
    <script src="js/script.js"></script>
</head>
<body>
    <nav>
        <ul>
            <li><a href="dashboard.php">Home</a></li>
            <li><a href="reports.php">Reports</a></li>
            <li><a href="php/logout.php">Logout</a></li>
        </ul>
    </nav>

    <h2>Welcome, <?php echo $_SESSION['username']; ?>!</h2>

    <h3>Inventory List</h3>
    <canvas id="myChart" style="width:100%;max-width:700px"></canvas>
    <script src="js/chart.js"></script>
</body>
</html>
