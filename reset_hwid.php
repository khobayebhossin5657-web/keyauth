<?php
include 'db.php';
$id = $_GET['id'];
$conn->query("UPDATE users SET hwid='' WHERE id='$id'");
header("Location: dashboard.php");
?>