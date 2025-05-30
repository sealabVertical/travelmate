<?php
include("../db/db_connect.php");

$country = $_POST['country'];
$capital = $_POST['capital'];
$weather = $_POST['weather'];
$note = $_POST['notes'];
$visit_time = $_POST['visit_time'];

$stmt = $conn->prepare("INSERT INTO travels (country_name, capital, weather, note, visit_time) VALUES (?, ?, ?, ?, ?)");
$stmt->bind_param("sssss", $country, $capital, $weather, $note, $visit_time);

if ($stmt->execute()) {
  echo "Success";
} else {
  echo "Error";
}

$stmt->close();
$conn->close();
?>