<?php
include 'db.php';
session_start();
if(!isset($_SESSION['username'])){
    header("Location: index.php");
    exit;
}

// Fetch users
$users = $conn->query("SELECT * FROM users ORDER BY id DESC");
?>
<!DOCTYPE html>
<html>
<head>
<title>Dashboard</title>
<link rel="stylesheet" href="style.css">
</head>
<body>
<h2>Dashboard</h2>
<a href="add_user.php">Add User</a>
<table border="1">
<tr>
<th>ID</th>
<th>Username</th>
<th>HWID</th>
<th>Expire Date</th>
<th>Ban</th>
<th>Actions</th>
</tr>
<?php while($row = $users->fetch_assoc()){ ?>
<tr>
<td><?php echo $row['id']; ?></td>
<td><?php echo $row['username']; ?></td>
<td><?php echo $row['hwid']; ?></td>
<td><?php echo $row['expire_date']; ?></td>
<td><?php echo $row['ban_status'] ? 'Banned' : 'Active'; ?></td>
<td>
<a href="ban_user.php?id=<?php echo $row['id']; ?>">Ban/Unban</a> |
<a href="reset_hwid.php?id=<?php echo $row['id']; ?>">Reset HWID</a>
</td>
</tr>
<?php } ?>
</table>
</body>
</html>