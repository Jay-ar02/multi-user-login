<?php
session_start();

include('connection.php');

if (!isset($_SESSION['user_authenticated']) || $_SESSION['user_authenticated'] !== true) {
    // User is not authenticated, redirect to the login page
    header('Location: http://localhost/multi-user-login/login.php');
    exit;
}
$role = isset($_SESSION['user_role']) ? $_SESSION['user_role'] : null;
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Users List</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
  <!-- css -->
  <link rel="stylesheet" type="text/css" href="css/style.css">
  <!-- css -->
<style>
body {
    margin: 0;
    font-family: Arial, Helvetica, sans-serif;
    background-image: url('images/bg.jpg');
    background-size: cover;
    background-attachment: fixed;
    color: red; /* Set the text color to white */
    }
.error-message {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    text-align: center;
    background-color: white;
    padding: 5px 10px;
}
</style>

  <!-- favicon -->
  <link rel="icon" type="image/x-icon" href="images/logo.png">
</head>

<body>

<?php
if ($role == 'student') {
    include('includes/student.php');

} elseif ($role == 'teacher') {
    include('includes/teacher.php');

} elseif ($role == 'admin') {
    include('includes/admin.php');
    
} else {
    echo '<div class="error-message"><h3>Sorry, you don\'t have a valid role to access this page.</h3></div>';
}
?>

</body>
</html>
