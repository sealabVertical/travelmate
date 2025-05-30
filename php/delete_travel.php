<?php
include("../db/db_connect.php");

$id = $_POST['id'];

$stmt = $conn->prepare("DELETE FROM travels WHERE id=?");
$stmt->bind_param("i", $id);

echo $stmt->execute() ? "Deleted" : "Error";

$stmt->close();
$conn->close();
?>