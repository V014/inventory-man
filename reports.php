<?php
session_start();
require 'php/connection.php';

if (!isset($_SESSION['logged'])) {
    header("Location: index.php");
    exit;
}

// Get inventory data for reports
$stmt = $conn->prepare("SELECT * FROM inventory");
$stmt->execute();
$inventory = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventory Reports</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <!-- Navigation -->
    <nav>
        <h2 class="logo">Welcome, <?php echo $_SESSION['username']; ?>!</h2>
        <ul class="nav-links">
            <li><a href="dashboard.php">Home</a></li>
            <li><a href="reports.php">Reports</a></li>
            <li><a href="php/logout.php">Logout</a></li>
        </ul>
    </nav>
    <!-- Inventory Report -->
    <h2>Inventory Reports</h2>
    <table>
        <thead>
            <tr>
                <th>Item ID</th>
                <th>Item Name</th>
                <th>Quantity</th>
                <th>Price</th>
                <th>Category</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($inventory as $item) { ?>
                <tr>
                    <td><?php echo $item['id']; ?></td>
                    <td><?php echo $item['item_name']; ?></td>
                    <td><?php echo $item['quantity']; ?></td>
                    <td><?php echo $item['price']; ?></td>
                    <td><?php echo $item['category']; ?></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</body>
</html>
