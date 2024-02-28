<?php
require_once 'koneksi.php';

$id = $_GET["id"] ?? "";

$sql = "DELETE FROM produk WHERE id=?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();

$stmt->close();
$conn->close();

header("Location: index.php");
exit;
?>
