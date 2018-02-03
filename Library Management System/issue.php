<?php
ob_start();
session_start();
require 'database.php';
if(isset($_SESSION['adid']) && !empty($_SESSION['adid'])){
$query = "SELECT * FROM books";
$result = $conn->query($query);

$query1 = "SELECT * FROM students";
$result1 = $conn->query($query1);
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

	<h1>Issue Books</h1><br>
	<div id='wrapper'>
	<!--Page content-->
	<div id='page-content-wrapper'>
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-3"><br><br>
			</div>

			<div class="col-md-6">
      <div class="panel panel-info">
      <div class="panel-heading"><h3>Book</h3></div>
			<div class="panel-body">
	<form method="POST" action="issue.php">
		<div class="form-group">
    	<label for="book">Select Book:</label>
    	<select class="form-control" name="book">
    		<?php while($row = $result->fetch_assoc()): ?>
    			<option value = <?php echo $row['bid'] ?>><?php echo $row['name'] ?></option>
    		<?php endwhile; ?>
    	</select>
  		</div>

  		<div class="form-group">
    	<label for="book">Select Student:</label>
    	<select class="form-control" name="student">
    		<?php while($row1 = $result1->fetch_assoc()): ?>
    			<option value = <?php echo $row1['id'] ?> ><?php echo $row1['name'] ?></option>
    		<?php endwhile; ?>
    	</select>
  		</div>
	
		<button type="submit" class="btn btn-info">Issue</button>
	</form>
	</div></div></div></div></div></div></div>
</body>


<?php
	if(isset($_POST['book']) && isset($_POST['student']))
	{
		$book = $_POST['book'];
		$student = $_POST['student'];
		if(!empty($book) && !empty($student))
		{
			$query2 = "SELECT * FROM issuedbooks WHERE bid = $book";
			$result2 = $conn->query($query2);
			$count = count($result2);

			$query3 = "SELECT * FROM books WHERE bid = $book";
			$result3 = $conn->query($query3);
			$row2 = $result3->fetch_assoc();
			$rc = $row2['count'];
			$title = $row2['name'];
			if($count == $rc)
			{
				echo "<script>alert('The book is currently unavailable')</script>";
			}
			else
			{
				$query4 = "INSERT INTO issuedbooks (bid, sid, title) VALUES ($book, $student, '$title')";
				if($result4 = $conn->query($query4))
				{
					$query5 = "SELECT * FROM students WHERE id = $student";
					$result5 = $conn->query($query5);
					$row3 = $result5->fetch_assoc();
					$bi = $row3['bi'];
					$bnr = $row3['bnr'];

					$query6 = "UPDATE students SET bi = $bi+1, bnr= $bnr+1";
					$result6 = $conn->query($query6);
					echo "<script>alert('Successful')</script>";		
				}
				else
				{
					echo 'Failed';
				}
			}
		}
	}
}
else
{
	header('Location: adminlogin.php');
}
?>