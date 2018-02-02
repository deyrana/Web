<!DOCTYPE html>
<html lang="en">
<head>
    <title>Update Information</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="sidebar.css">

    <style type="text/css">
    	h1,h3,h4, .msg {text-align: center;
    			font-family: algerian;
    			text-decoration: underline;
    	}

    	form {
  				background: rgba(19, 35, 47, 0.9); 
  				padding: 40px;
  				max-width: 600px;
  				margin: 40px auto;
  				border-radius: 4px;
  				box-shadow: 0 4px 10px 4px rgba(19, 35, 47, 0.3);
			}
		label { color: white; }
    </style>
</head>

<body>
<h1>UPDATE</h1><br>
<div id='wrapper'>
		
<!--Page content-->
<div id='page-content-wrapper'>
	<div class="container-fluid">
				<form method="POST" action="FORMupdate.php">
					<div class="form-group">
    				<label for="name">New Name:</label>
    				<input type="text" class="form-control" name="name" placeholder="Enter name here">
  					</div>
  					<div class="form-group">
    				<label for="username">New Username:</label>
    				<input type="text" class="form-control" name="username" placeholder="Enter Username here">
  					</div>
 					<div class="form-group">
    				<label for="email">New Email address:</label>
    				<input type="email" class="form-control" name="email" placeholder="Enter email here">
  					</div>
  					<div class="form-group">
    				<label for="pwd">New Password:</label>
    				<input type="password" class="form-control" name="password" placeholder="Enter Password here">
  					</div>
  					
  					<button type="submit" class="btn btn-primary">Update</button>
				</form>
        <div class="msg">Back to <a href="userhome.php">User Panel</a></div>
	</div>
</div>
</div>
</body>
</html>



<?php
require 'database.php';
require 'sessions.php';

if(isset($_POST['name']) && isset($_POST['username']) && isset($_POST['email']) && isset($_POST['password']))
{
  $name = $_POST['name'];
  $username = $_POST['username'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  if(!empty($name) && !empty($password) && !empty($email) && !empty($username))
  {
    $uid = $_SESSION['uid'];
    $query = "UPDATE user SET Name = '$name', Username = '$username', Password = '$password', Email = '$email' WHERE uid = $uid ";
    if($result = $conn->query($query))
    {
      echo '<script>alert("Updation Successful");</script>';
    }
    else
    {
      echo '<script>alert("Failed to update");</script>';
    }
  }
  else
  {
    echo '<script>alert("Please fill all the details");</script>';
  }
}

?>