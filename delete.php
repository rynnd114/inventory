<?php
require 'config/database.php';

$id = $_GET['id'];
$sql = "DELETE FROM hardware_laptops WHERE id = ?";
$stmt = $pdo->prepare($sql);
$stmt->execute([$id]);

header("Location: index.php");
?>
