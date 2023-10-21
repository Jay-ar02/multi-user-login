<?php
session_start();

if (isset($_SESSION['user_authenticated'])) {

// Check if password change is required
if (isset($_SESSION['change_password']) && $_SESSION['change_password'] === true) {
    echo '<script>alert("Password change is required.")</script>';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
// Handle the form submission
$newPassword = $_POST['new_password'];

if (empty($newPassword)) {
    echo '<script>alert("Please enter a new password.")</script>';
} else {
// Perform password update logic here (replace with your actual logic)
    echo '<script>alert("Password updated successfully.")</script>';
                
// Set $_SESSION['change_password'] to false to indicate the password change is complete
$_SESSION['change_password'] = false;
}
}
} else {
    echo '<script>alert("Password change is not required at this moment.")</script>';
}
} else {
    echo '<script>alert("User is not authenticated.")</script>';
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <title>Change Password</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- css -->
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <!-- favicon -->
    <link rel="icon" type="image/x-icon" href="images/logo.png">
    <!-- Add this in the head section for Font Awesome icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  </head>

<body>
<!-- nav -->
<div class="topnav">
  <a class="active" href="home.php">Home</a>
  <a href="logout.php" style="float: right;">Sign-out</a>
</div>
<!-- end of nav -->
    
<br><br><br><br><center>
<div class="container mt-3">
<h2 style="color:white;">Change Password</h2>
<form method="post">
  
<div class="mb-3" style="width: 400px; background-color: rgba(255, 255, 255, 0.7); padding: 15px; border-radius: 10px;">
    
<label for="current_password">Current Password:</label>
<div class="input-group">
    <input type="password" class="form-control" id="current_password" name="current_password" required>
    <span class="input-group-text" id="password-toggle" onclick="togglePasswordVisibility('current_password')">
    <i class="fas fa-eye" id="password-icon"></i>
    </span>
</div><br>
        
<label for="new_password">New Password:</label>
<div class="input-group">
    <input type="password" class="form-control" id="new_password" name="new_password" required>
    <span class="input-group-text" id="password-toggle" onclick="togglePasswordVisibility('new_password')">
    <i class="fas fa-eye" id="password-icon"></i>
    </span>
</div><br>
        
<button type="submit" name="submit" class="btn btn-primary">Change Password</button>
</div>
</form></center>

</div>
</body>
</html>

<script>
  function togglePasswordVisibility(inputId) {
  const passwordInput = document.getElementById(inputId);
  const passwordIcon = document.getElementById('password-icon');
  
if (passwordInput.type === 'password') {
  passwordInput.type = 'text';
  passwordIcon.classList.remove('fa-eye');
  passwordIcon.classList.add('fa-eye-slash');
} else {
  passwordInput.type = 'password';
  passwordIcon.classList.remove('fa-eye-slash');
  passwordIcon.classList.add('fa-eye');
}
}
</script>