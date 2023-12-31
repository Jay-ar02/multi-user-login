<?php
session_start();

include('connection.php');

// After successful login
$_SESSION['user_authenticated'] = true;

// Initialize error messages
$usernameError = '';
$passwordError = '';

if (isset($_POST['submit'])) {
    $u_name = $_POST['u_name'];
    $u_pass = $_POST['u_pass'];

// Check if the account exists in the database
$sql = "SELECT * FROM users WHERE u_name='$u_name'";
$result = mysqli_query($conn, $sql);

if ($result) {
    $data = mysqli_fetch_array($result);

if ($data) {
// Verify the password
            
if (password_verify($u_pass, $data['u_pass'])) {
    // Password change policy: Check if it's time to change the password
    $passwordChangeDate = strtotime($data['password_change_date']);
    $currentDate = strtotime(date('Y-m-d h:i:s'));
    $daysSinceLastChange = ($currentDate - $passwordChangeDate) / (60 * 60 * 24);

if ($daysSinceLastChange > 90) {
    // Password change is required
    $_SESSION['change_password'] = true;
    header('location: change_password.php');
                
} else {
    $_SESSION['user_role'] = $data['role'];
    $_SESSION['username'] = $data['u_name'];
    header('location: dashboard.php');
}
            
} else {
    $passwordError = 'Incorrect password';
}
        
} else {
    $usernameError = 'Username not registered';
}
    
} else {
// Handle database query error
echo 'Database query error: ' . mysqli_error($conn);
}
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Login</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
  <!-- css -->
  <link rel="stylesheet" type="text/css" href="css/style.css">
  <!-- favicon -->
  <link rel="icon" type="image/x-icon" href="images/logo.png">
  <!-- eye icon -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>

<body>
<!-- nav -->
<div class="topnav">
  <a class="active" href="home.php">Home</a>
  <a href="registration.php" style="float: right;">Sign-up</a>
  <a href="login.php" style="float: right;">Sign-in</a>
</div>
<!-- end of nav -->

<!-- form section -->
<br><br><br>
<center>
<div class="container mt-3">
<h2 style="color: white;">Login</h2>
<div style="border: 1px solid #ccc; padding: 20px; border-radius: 10px; width:440px; background-color: rgba(255, 255, 255, 0.7);">

<form method="post">

<div class="mb-3" style="width: 400px;">
    <label for="email">Username:</label>
    <input type="text" class="form-control" id="email" placeholder="Enter username" name="u_name">
    <!-- Display username error message -->
    <div style="color: red;"><?php echo $usernameError; ?></div>
</div>

<div class="mb-3" style="width: 400px;">
   <label for="pwd">Password:</label>
   <div class="input-group">
   <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="u_pass">
   <span class="input-group-text" id="password-toggle" onclick="togglePasswordVisibility()">
   <i class="fas fa-eye"></i> <!-- Show icon -->
   </span>
   </div>
   <!-- Display password error message -->
   <div style="color: red;"><?php echo $passwordError; ?></div>
</div>

<button type="submit" name="submit" class="btn btn-primary">Submit</button>
</form>
</div>
</div>
</center>
<!-- end of form section -->

</body>
</html>

<!-- js -->
<script src="js/script.js"></script>
