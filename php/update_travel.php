<?php
include("../db/db_connect.php");

$id = $_POST['id'];
$note = $_POST['note'];
$visit_time = $_POST['visit_time'];

$stmt = $conn->prepare("UPDATE travels SET note=?, visit_time=? WHERE id=?");
$stmt->bind_param("ssi", $note, $visit_time, $id);

echo $stmt->execute() ? "Success" : "Error";

$stmt->close();
$conn->close();
?>