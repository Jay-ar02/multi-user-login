

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teacher</title>
    <!-- css -->
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <!-- favicon -->
    <link rel="icon" type="image/x-icon" href="../images/logo.png">

<style>
.button {
    background-color: #4CAF50; /* Green */
    border: none;
    color: white;
    padding: 5px 25px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 4px 2px;
    cursor: pointer;
    }

.button2 {background-color: #008CBA;} 
</style>
</head>

<body>

<!-- nav -->
<div class="topnav">
  <a class="active" href="home.php">Home</a>
  <a href="logout.php" style="float: right;">Sign-out</a>
  <a href="change_password.php" style="float: right;">Change Password</a>
</div>
<!-- end of nav -->

<center><h2 style="color: white;">Teacher</h2></center><center><hr style="color:white; width:70%;"></center>
<center><h3 style="color:white;">Student's List:</h3></center>

<!-- table -->
<center>
<table class="table" style="width: 70%;">

<thead style="background-color: lightblue;">
  <tr>
    <th scope="col" style="background-color: lightblue;">#</th>
    <th scope="col" style="background-color: lightblue;">Username</th>
    <th scope="col" style="background-color: lightblue;">Phone No.</th>
    <th scope="col" style="background-color: lightblue;">Operations</th>
</tr>
</thead>

<tbody>
  <tr>
    <th scope="row">1</th>
    <td>Jay-ar</td>
    <td>09876567890</td>
    <td><button class="button button2">Profile</button></td>
  </tr>
  
  <tr>
    <th scope="row">2</th>
    <td>Angelo</td>
    <td>09876598236</td>
    <td><button class="button button2">Profile</button></td>
  </tr>
</tbody>
</table>
</center>
<!-- end of table -->

</body>
</html>