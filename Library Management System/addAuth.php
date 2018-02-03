<?php
ob_start();
session_start();
require 'database.php';
if(isset($_SESSION['adid']) && !empty($_SESSION['adid'])){

if(isset($_POST['authname']) )
{
	$authname = $_POST['authname'];
	
	if(!empty($authname) )
	{
		$query = "INSERT INTO authors (name) VALUES ('$authname')";
		if($result=$conn->query($query))
		{
			echo "<script>alert('Successful')</script>";
		}
		else
		{
			echo "<script>alert('Unsuccessful')</script>";
		}
	}
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Add Author</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />

    <style type="text/css">
    	h1,h3,h4 {text-align: center;
    			font-family: algerian;
    	}
    	.txt {
    		text-align: center;
    		font-size: xx-large;
    		font-family: times new roman;
    	}
    </style>
</head>
<body>

 <?php require 'header.php' ?>

	<h1>Add Author</h1><br>

	<div id='wrapper'>
<!--Page content-->
<div id='page-content-wrapper'>
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-3"><br><br>
			</div>

			<div class="col-md-6">
      <div class="panel panel-info">
      <div class="panel-heading"><h3>Author</h3></div>
			<div class="panel-body">
				<form method="POST" action="addAuth.php">
					  
  					<div class="form-group">
    				<label for="name">Author Name:</label>
    				<input type="text" class="form-control" name="authname" placeholder="Enter name of category here" required autocomplete="off">
  					</div>
 					
  					
  					
  					
  					<button type="submit" class="btn btn-info">Add</button>
				</form>
        </div>
        </div>
			</div>
		</div>
	</div>
</div>
</div>
  
	
</body>


<?php
}
else
{
	header('Location: adminlogin.php');
}
?>