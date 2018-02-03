<?php
ob_start();
session_start();
require 'database.php';
if(isset($_SESSION['adid']) && !empty($_SESSION['adid'])){
if(isset($_POST["cat"]) && !empty($_POST["cat"]))
{
  $c = $_POST["cat"];
}
else
  $c = 0;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>View Books</title>
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

	<h1>View Books</h1>

<div id='wrapper'>
<!--Page content-->
<div id='page-content-wrapper'>
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-3"><br><br>
      </div>

      <div class="col-md-6">
      <div class="panel panel-info">
      <div class="panel-heading"><h3>Books</h3></div>
      <div class="panel-body">
      <form method="POST" action="viewBooks.php">
            
      <?php
      $query1 = "SELECT * FROM categories";
      $result1 = $conn->query($query1);
      ?>
            <div class="form-group">
            <label for="cat">Sort by:</label>
            <select name="cat" >
              <option value = 0>All</option>
            <?php while($row = $result1->fetch_assoc()): ?>
              <option value = <?php echo $row['cid'] ?>><?php echo $row['name'] ?></option>
            <?php endwhile; ?>
            </select>
            </div>

            <button type="submit" class="btn btn-info">Sort</button>
      </form>   
      <table class="table table-bordered table-striped">
      <thead class="thead-dark"><tr>
      <th>Book ID</th>
      <th>Title</th>
      <th>Category</th>
      <th>Author</th>
      <th>Quantity</th>
      </tr>
      </thead>

      <?php
      if($c==0)
      {
        $query2 = "SELECT * FROM books";
      }
      else
      {
        $query2 = "SELECT * FROM books WHERE category = $c";
      }

      $result2 = $conn->query($query2);
      ?>

      <tbody>
      <?php while($row = $result2->fetch_assoc()): ?>
        <tr>
        <td><?php echo $row['bid'] ?></td>
        <td><?php echo $row['name'] ?></td>
        <td><?php
         $c1 = $row['category'];
        $query3 = "SELECT name FROM categories WHERE cid = $c1";
        $result3 = $conn->query($query3);
        $row1 = $result3->fetch_assoc();
        echo $row1['name'];
        ?></td>       
        
        <td><?php
        $a = $row['author'];
        $query4 = "SELECT name FROM authors WHERE aid = $a";
        $result4 = $conn->query($query4);
        $row2 = $result4->fetch_assoc();
        echo $row2['name'];
        ?></td>

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