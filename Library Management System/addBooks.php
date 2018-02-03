<?php
ob_start();
session_start();
require 'database.php';
if(isset($_SESSION['adid']) && !empty($_SESSION['adid'])){
if(isset($_POST['title']) && isset($_POST['cat']) && isset($_POST['auth']) && isset($_POST['count']))
{
	$title = $_POST['title'];
	$cat = $_POST['cat'];
	$auth = $_POST['auth'];
	$count = $_POST['count'];

  $query3 = "SELECT count FROM categories WHERE cid = $cat";
  $result3 = $conn->query($query3);
  $row1 = $result3->fetch_assoc();
  $cc = $row1['count'];

  $query4 = "SELECT count FROM authors WHERE aid = $auth";
  $result4 = $conn->query($query4);
  $row2 = $result4->fetch_assoc();
  $ca = $row2['count'];

	if(!empty($title) && !empty($cat) && !empty($auth) && !empty($auth) && !empty($count))
	{
		$query = "INSERT INTO books (name, category, author, count) VALUES ('$title', $cat, $auth, $count)";
		if($result = $conn->query($query))
    {
      $cc = $cc+1;
      $ca = $ca+1;
      $query5 = "UPDATE categories SET count = $cc WHERE cid = $cat";
      $result5 = $conn->query($query5);

      $query5 = "UPDATE authors SET count = $ca WHERE aid = $auth";
      $result5 = $conn->query($query5);
			echo "<script>alert('Added Successfully')</script>";
    }
		else
			echo "<script>alert('Failed to add')</script>";
	}
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Add Books</title>
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

	<h1>Add Book</h1><br>

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
				<form method="POST" action="addBooks.php">
					  
  					<div class="form-group">
    				<label for="title">Title</label>
    				<input type="text" class="form-control" name="title" placeholder="Enter name of category here" required autocomplete="off">
  					</div>
 					
 		<?php
 			$query1 = "SELECT * FROM categories";
 			$result1 = $conn->query($query1);
 		?>
  					<div class="form-group">
    				<label for="cat">Select Category</label>
    				<select name="cat" class="form-control">
    				<?php while($row = $result1->fetch_assoc()): ?>
    					<option value = <?php echo $row['cid'] ?>><?php echo $row['name'] ?></option>
    				<?php endwhile; ?>
    				</select>
  					</div>

  		<?php
 			$query2 = "SELECT * FROM authors";
 			$result2 = $conn->query($query2);
 		?>
  					<div class="form-group">
    				<label for="auth">Select Authors</label>
    				<select name="auth" class="form-control">
    				<?php while($row = $result2->fetch_assoc()): ?>
    					<option value = <?php echo $row['aid'] ?>><?php echo $row['name'] ?></option>
    				<?php endwhile; ?>
    				</select>
  					</div>

  					<div class="form-group">
    				<label for="count">Number of copies</label>
    				<input type="number" class="form-control" name="count" placeholder="Enter number of copies of the book here" required autocomplete="off">
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