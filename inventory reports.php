<?php
session_start();
if (!isset($_SESSION['loggedin'])) {
    header("Location: index.html");
    exit;
}

// Placeholder for database connection
$host = 'localhost';
$dbname = 'inventory_db';
$username = 'root';
$password = '';
$conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);

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
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <nav>
        <ul>
            <li><a href="dashboard.php">Home</a></li>
            <li><a href="inventory_reports.php">Inventory Reports</a></li>
            <li><a href="logout.php">Logout</a></li>
        </ul>
    </nav>

    <h2>Inventory Reports</h2>
    <table>
        <thead>
            <tr>
                <th>Item ID</th>
                <th>Item Name</th>
                <th>Quantity</th>
                <th>Price</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($inventory as $item) { ?>
                <tr>
                    <td><?php echo $item['item_id']; ?></td>
                    <td><?php echo $item['item_name']; ?></td>
                    <td><?php echo $item['quantity']; ?></td>
                    <td><?php echo $item['price']; ?></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</body>
</html>
