<?php
	require 'database.php';
	require 'sessions.php';
	$query = "SELECT * FROM user ";
	$result = $conn->query($query);

	$query2 = "SELECT * FROM questions";
	$result2 = $conn->query($query2);
	$total = $result2->num_rows;

	if(isset($_SESSION['aid']) && !empty($_SESSION['aid']))
	{
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Results</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="sidebar.css">

    <style type="text/css">
    	h1,h3,h4 {text-align: center;
    			font-family: algerian;
    			text-decoration: underline;
    	}
    	.ap {text-align: center;
    		 font-family: algerian;
    		 font-size: medium;}

    	table {
  				
  				padding: 40px;
  				letter-spacing: : 20px;
  				width: 100%;
  				margin: 40px auto;
  				border-radius: 4px;
  				box-shadow: 0 4px 10px 4px rgba(19, 35, 47, 0.3);
			}
    </style>
</head>
<body>
	<h1>Student's Result</h1><br>
	<h4>Here's a list of all the students who have taken the test</h4><br>
	<div class="col-md-3"></div>
	<div class="col-md-6">
    <table class="table table-striped">
    	<thead>
    		<tr>
    			<th>Name</th>
    			<th>Score</th>
    			<th>Percentage</th>
    		</tr>
    	</thead>

    	<tbody>
    		<?php while($rows = $result->fetch_assoc()): ?>
    		<tr>   			
          		<td><?php echo $rows['Name'] ?></td>
          		<td><?php echo $rows['Score'] ?></td>
          		<td><?php echo ($rows['Score']*100)/$total ?>%</td>
    		</tr>
    		<?php endwhile; ?>
    	</tbody>
    </table>
    <br><p class="ap">Back to <a href="adminhome.php">Admin Panel</a><br></p>
    </div>
</body>
</html>

<?php
}
else
{
	echo "<script>alert('You need to Login in first')</script>";
}
?>