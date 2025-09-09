<?php
include 'db.php';
session_start();

if(isset($_POST['login'])){
    $username = $_POST['username'];
    $password = $_POST['password'];

    $res = $conn->query("SELECT * FROM users WHERE username='$username' AND password='$password'");
    if($res->num_rows > 0){
        $_SESSION['username'] = $username;
        header("Location: dashboard.php");
    } else {
        $error = "Invalid credentials";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Login</title>
<link rel="stylesheet" href="style.css">
</head>
<body>
<h2>Login</h2>
<form method="POST">
  <input type="text" name="username" placeholder="Username" required>
  <input type="password" name="password" placeholder="Password" required>
  <button type="submit" name="login">Login</button>
</form>
<?php if(isset($error)) echo "<p>$error</p>"; ?>
</body>
</html>