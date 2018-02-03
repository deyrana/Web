<?php
ob_start();
@session_start();
require 'database.php';

if(isset($_POST['name']) && isset($_POST['username']) && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['sex']))
{
  $name = $_POST['name'];
  $username = $_POST['username'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $sex = $_POST['sex'];

  if(!empty($name) && !empty($username) && !empty($email) && !empty($password) && !empty($sex))
  {
    $query = "INSERT INTO students (name, username, email, password, sex) VALUES ('$name', '$username', '$email', '$password', '$sex');";
    if($result = $conn->query($query))
    {
      echo '<script>alert("Successful");</script>';
    }
    else
    {
      echo '<script>alert("Failed to apply query");</script>';
    }
  }
  else
  {
    echo '<script>alert("Please fill all the fields");</script>';
  }
}

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <title>Library</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="sidebar.css">

    <style type="text/css">
    	h1,h4 {text-align: center;
    			font-family: algerian;
    			text-decoration: underline;
    	}

      h3{text-align: center;}

    </style>
</head>

<body>

<?php require 'header.php' ?>



	<h1>Online Library Management System</h1><br><br>
	<div id='wrapper'>
		
<!--Page content-->
<div id='page-content-wrapper'>
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-3"><br><br>
			</div>

			<div class="col-md-6">
      <div class="panel panel-info">
      <div class="panel-heading"><h3>REGISTRATION</h3></div>
			<div class="panel-body">
				<form method="POST" action="index.php">
					  <div class="form-group">
    				<label for="name">Name:</label>
    				<input type="text" class="form-control" name="name" placeholder="Enter name here" required autocomplete="off">
  					</div>
  					<div class="form-group">
    				<label for="username">Username:</label>
    				<input type="text" class="form-control" name="username" placeholder="Enter Username here" required autocomplete="off">
  					</div>
 					<div class="form-group">
    				<label for="email">Email address:</label>
    				<input type="email" class="form-control" name="email" placeholder="Enter email here" required autocomplete="off">
  					</div>
  					<div class="form-group">
    				<label for="pwd">Password:</label>
    				<input type="password" class="form-control" name="password" placeholder="Enter Password here" required autocomplete="off">
  					</div>
  					<div class="form-group">
  					<label for="sex">Gender:</label>
  					<select name="sex">
  						<option value="m">Male</option>
  						<option value="f">Female</option>
  						<option value="oth">Others</option>
  					</select>
  					</div>
  					<p class="msg">Already a user? <a href="login.php">Login</a> here</p><br>
  					
  					<button type="submit" class="btn btn-info">Register</button>
				</form>
        </div>
        </div>
			</div>
		</div>
	</div>
</div>
</div>
</body>

