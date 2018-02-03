<?php
ob_start();
session_start();
require 'database.php';
if(isset($_SESSION['adid']) && !empty($_SESSION['adid'])){

	$query = "SELECT * FROM students";
	$result = $conn->query($query);

	$query6 = "SELECT * FROM issuedbooks";
	$result6 = $conn->query($query6);
	$total =  $result6->num_rows;


	@$sid = $_POST['students'];
	$query1 = "SELECT * FROM issuedbooks WHERE sid = $sid";
	$result1 = $conn->query($query1);

		if(isset($_POST['return']) && !empty($_POST['return']))
		{
			$r = $_POST["return"];
			$query2 = "DELETE FROM issuedbooks WHERE id = $r";
			if($result2 = $conn->query($query2))
			{
				for($i=$r+1 ; $i<=$total; $i++)
				{
					$query3 = "UPDATE issuedbooks SET id = $i-1 WHERE id = $i ";
					$result3 = $conn->query($query3);
				}
				$query4 = "SELECT * FROM students where id = $sid";
				$result4 = $conn->query($query4);
				$row2 = $result4->fetch_assoc();
				$bnr = $row2['bnr'];
				$query5 = "UPDATE students SET bnr = $bnr-1 WHERE id = $sid";
				$result5 = $conn->query($query5);
				echo "<script>alert('Returned Succesfully')</script>";
			}
		}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Issue Books</title>
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

<h1>Return Books</h1>

<div id='page-content-wrapper'>
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-3"><br><br>
			</div>
			<div class="col-md-6">
				<form method="POST" action="returnBook.php">
					<div class="form-group">
  					<label for="students">Select Student:</label>
  					<select name="students" class="form-control">
  						<?php while($row = $result->fetch_assoc()): ?>
  						<option value="<?php echo $row['id'] ?>"><?php echo $row['name'] ?></option>
  						<?php endwhile; ?>
  					</select>
  					<br>
  					<button type="submit" class="btn btn-info" name="show" value="1">Show</button>
  					</div>
				
<?php if(isset($_POST['show']) && !empty($_POST['show'])){ ?>
				<div class="panel panel-info">
      				<div class="panel-heading"><h3>Issued Book</h3></div>
					<div class="panel-body">

						<table class="table table-bordered table-striped">
      					<thead class="thead-dark"><tr>
      					<th>Book Id</th>
					    <th>Books Title</th>
      					<th>Action</th>
      					</tr>
      					</thead>

      					<tbody>
    					<?php while($row1 = $result1->fetch_assoc()): ?>
        				<tr>
        				<td><?php echo $row1['bid'] ?></td>
        				<td><?php echo $row1['title'] ?></td>
        					<td><button type="submit" class="btn btn-danger" name="return" value="<?php echo $row1['id'] ?>" >Return</button></td>     	
        				</form>
        				</tr>
    					<?php endwhile; ?>
    					</tbody>
					</div>

<?php
		}
}
else
{
	header("Location: index.php");
}
?>
