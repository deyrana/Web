<?php
ob_start();
session_start();
require 'database.php';
if(isset($_SESSION['id']) && !empty($_SESSION['id'])){	

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Dashboard</title>
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
    		text-decoration: underline;
    	}
    	.txt1 {
    		text-align: center;
    		font-size: 72pt;
    		font-family: Algerian;
    	}

    	.panel-body {
    		height: 250px;
    		border-radius: 4px;
  			box-shadow: 0 4px 10px 4px rgba(19, 35, 47, 0.3);
    	}
}
    </style>
</head>
<body>

<?php require 'header.php' ?>

	<h1>User Dashboard</h1><br>
  <h3>Welcome, 
  <?php
  $id=$_SESSION['id'];
  $query = "SELECT * FROM students WHERE id = $id";
  $result = $conn->query($query);
  $row = $result->fetch_assoc();
  echo $row['name'];
  ?>
  </h3><br><br>
  <div class="row">
  	<div class="col-md-2"></div>
	<div class="col-md-3">
		<div class="panel panel-info">
			<div class="panel-body">
				<p class="txt">Books Issued</p><br>
				<p class="txt1"><?php echo $row['bi'] ?></p>
			</div>
		</div>
	</div>

	<div class="col-md-1"></div>
	<div class="col-md-3">
		<div class="panel panel-info">
			<div class="panel-body">
				<p class="txt">Books Not Returned</p><br>
				<p class="txt1"><?php echo $row['bnr'] ?></p>
			</div>
		</div>
	</div>  	
  </div>
	
</body>


<?php
}
else
{
	header('Location: login.php');
}
?>