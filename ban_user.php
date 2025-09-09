<?php
include 'db.php';
$id = $_GET['id'];
$user = $conn->query("SELECT ban_status FROM users WHERE id='$id'")->fetch_assoc();
$new_status = $user['ban_status'] ? 0 : 1;
$conn->query("UPDATE users SET ban_status='$new_status' WHERE id='$id'");
header("Location: dashboard.php");
?>