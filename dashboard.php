<?php
session_start();
require 'php/connection.php';

if (!isset($_SESSION['logged'])) {
    header("Location: index.php");
    exit;
}

// Get inventory data from the database
$stmt = $conn->prepare("SELECT item_name, price FROM inventory");
$stmt->execute();
$inventory = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Output the inventory data as JSON
// echo json_encode($inventory);
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
        <h2 class="logo">Welcome, <?php echo $_SESSION['username']; ?>!</h2>
        <ul class="nav-links">
            <li><a href="dashboard.php">Home</a></li>
            <li><a href="reports.php">Reports</a></li>
            <li><a href="php/logout.php">Logout</a></li>
        </ul>
    </nav>
    <!-- Add Inventory -->
    <div class="container">
        <form action="php/add_inventory.php" class="form" method="POST">
            <h3>Add Inventory</h3>
            <input type="text" placeholder="Item Name" name="item_name">
            <input type="text" placeholder="Quantity" name="quantity">
            <input type="number" placeholder="Price" name="price">
            <select name="category" id="category">
                    <option value="select">Select Category</option>
                    <option value="consumable">Consumable</option>
                    <option value="administrative">Administrative</option>
                    <option value="client">Client</option>
                    <option value="contingency">Contingency</option>
                    <option value="logistics">Logistics</option>
            </select>
            <input type="submit" value="Add" name="submit">
        </form>    
    </div>
     <form action=""></form>
    <!-- Chart -->
    <h3>Quick Report</h3>
    <canvas id="myChart" style="width:100%;max-width:700px"></canvas>

    <script src="js/chart.js"></script>
</body>
</html>
