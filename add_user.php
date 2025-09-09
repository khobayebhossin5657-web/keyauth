<?php
include 'db.php';
if(isset($_POST['add'])){
    $username = $_POST['username'];
    $password = $_POST['password'];
    $expire = $_POST['expire_date'];
    $conn->query("INSERT INTO users (username,password,expire_date) VALUES ('$username','$password','$expire')");
    $success = "User added!";
}
?>
<!DOCTYPE html>
<html>
<head><title>Add User</title></head>
<body>
<h2>Add User</h2>
<form method="POST">
<input type="text" name="username" placeholder="Username" required>
<input type="password" name="password" placeholder="Password" required>
<input type="date" name="expire_date" required>
<button type="submit" name="add">Add User</button>
</form>
<?php if(isset($success)) echo "<p>$success</p>"; ?>
</body>
</html>