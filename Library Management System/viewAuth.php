<?php
ob_start();
session_start();
require 'database.php';
if(isset($_SESSION['adid']) && !empty($_SESSION['adid'])){

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>View Authors</title>
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

	<h1>View Authors</h1>

<div id='wrapper'>
<!--Page content-->
<div id='page-content-wrapper'>
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-3"><br><br>
      </div>

      <div class="col-md-6">
      <div class="panel panel-info">
      <div class="panel-heading"><h3>Authors</h3></div>
      <div class="panel-body">  
      <table class="table table-bordered table-striped">
      <thead class="thead-dark"><tr>
      <th>Author Name</th>
      <th>Quantity</th>
      </tr>
      </thead>

      <?php
        $query2 = "SELECT * FROM authors";
        $result2 = $conn->query($query2);
      ?>

    <tbody>
      <?php while($row = $result2->fetch_assoc()): ?>
        <tr>
        <td><?php echo $row['name'] ?></td>
        <td><?php echo $row['count'] ?></td>     
        </tr>
      <?php endwhile; ?>
    </tbody>
  </table>
            
    
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