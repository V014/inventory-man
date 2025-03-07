<?php
session_start();
require 'connection.php';

if (!isset($_SESSION['logged'])) {
    header("Location: ../index.php");
    exit;
} else {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $item_name = $_POST['item_name'];
        $quantity = $_POST['quantity'];
        $price = $_POST['price'];
        $category = $_POST['category'];

        $stmt = $conn->prepare("INSERT INTO inventory (id, item_name, quantity, price, category, date) VALUES (NULL, ?, ?, ?, ?, NULL)");
        $stmt->execute([$item_name, $quantity, $price, $category]);

        header("Location: ../dashboard.php");
    }
}

?>