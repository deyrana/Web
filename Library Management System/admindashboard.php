<?php
ob_start();
session_start();
require 'database.php';
if(isset($_SESSION['adid']) && !empty($_SESSION['adid'])){	

	    $query = "SELECT * FROM issuedBooks";
    	$result = $conn->query($query);
    	$total = $result->num_rows;

    	$total1 =0;
    	$query1 = "SELECT * FROM students";
    	$result1 = $conn->query($query1);
    	while($row=$result1->fetch_assoc()):
    		$total1 = $total1+$row['bnr'];
    	endwhile;

    	$total2 =0;
    	$query2 = "SELECT * FROM books";
    	$result2 = $conn->query($query2);
    	while($row1=$result2->fetch_assoc()):
    		$total2 = $total2+$row1['count'];
    	endwhile;

    	$total3 = $total2 - $total1;

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Admin Dashboard</title>
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

	<h1>Admin Dashboard</h1><br>

	<div class="row">
  	<div class="col-md-1"></div>
	<div class="col-md-2">
		<div class="panel panel-info">
			<div class="panel-body">
				<p class="txt">Books Issued</p>
				<p class="txt1"><?php echo $total ?></p>
			</div>
		</div>
	</div>

	<div class="col-md-1"></div>
	<div class="col-md-3">
		<div class="panel panel-info">
			<div class="panel-body">
				<p class="txt">Books Not Returned</p>
				<p class="txt1"><?php echo $total1 ?></p>
			</div>
		</div>
	</div>

	<div class="col-md-1"></div>
	<div class="col-md-3">
		<div class="panel panel-info">
			<div class="panel-body">
				<p class="txt">Books currently available</p>
				<p class="txt1"><?php echo $total3 ?></p>
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