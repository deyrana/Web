<?php
if(isset($_SESSION['adid']) && !empty($_SESSION['adid'])){
?>

<nav class='navbar navbar-default'>
  <div class="container-fluid">

  <div class="navbar-head">
    <button type='button' class='navbar-toggle' data-toggle='collapse' data-target='#mnavbar'>
       <span class="glyphicon glyphicon-list"></span>
    </button>
    <a href="index.php" class="navbar-brand">Online Library</a>
  </div>

  <div class="collapse navbar-collapse" id="mnavbar">
    <ul class='nav navbar-nav'>
      <li><a href="admindashboard.php">Dashboard</a></li>
      <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle='dropdown'>Manage Books <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="viewBooks.php">View all books</a></li>
          <li><a href="addBooks.php">Add Books </a></li>
        </ul>
      </li>


      <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle='dropdown'>Manage Categories <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="viewCat.php">View all Categories</a></li>
          <li><a href="addCat.php">Add Categories </a></li>
        </ul>
      </li>

      <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle='dropdown'>Manage Authors <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="viewAuth.php">View all Authors</a></li>
          <li><a href="addAuth.php">Add Authors </a></li>
        </ul>
      </li>
    <li><a href="issue.php">Issue Books</a></li>
    <li><a href="returnBook.php">Return Books</a></li>
    </ul>


    <ul class="nav navbar-nav navbar-right">
          <li><a href="logout.php">Logout <span class="glyphicon glyphicon-off"></span></a></li>
    </ul>
  </div>
  </div>
</nav>

<?php
}
else if(isset($_SESSION['id']) && !empty($_SESSION['id'])){?>

<nav class='navbar navbar-default'>
	<div class="container-fluid">

	<div class="navbar-head">
		<button type='button' class='navbar-toggle' data-toggle='collapse' data-target='#mnavbar'>
			 <span class="glyphicon glyphicon-list"></span>
		</button>
		<a href="#" class="navbar-brand">Online Library</a>
	</div>

	<div class="collapse navbar-collapse" id="mnavbar">
		<ul class='nav navbar-nav'>
			<li ><a href="dashboard.php">Dashboard <span class="glyphicon glyphicon-home"></span></a></li>
			<li ><a href="#">Profile  <span class="glyphicon glyphicon-wrench"></span></a></li>
			<li ><a href="issuedBooks.php">Issued Books  <span class="glyphicon glyphicon-user"></span></a></li>
		</ul>

		<ul class="nav navbar-nav navbar-right">
					<li><a href="logout.php">Logout <span class="glyphicon glyphicon-off"></span></a></li>
		</ul>
	</div>
	</div>
</nav>

<?php
}
else{ ?>

<nav class='navbar navbar-default'>
	<div class="container-fluid">

	<div class="navbar-head">
		<button type='button' class='navbar-toggle' data-toggle='collapse' data-target='#mnavbar'>
			 <span class="glyphicon glyphicon-list"></span>
		</button>
		<a href="#" class="navbar-brand">Online Library</a>
	</div>

	<div class="collapse navbar-collapse" id="mnavbar">
		<ul class='nav navbar-nav'>
			<li class='active'><a href="#">Home <span class="glyphicon glyphicon-home"></span></a></li>
			<li ><a href="adminlogin.php">Admin Login  <span class="glyphicon glyphicon-wrench"></span></a></li>
			<li ><a href="login.php">User Login  <span class="glyphicon glyphicon-user"></span></a></li>
		</ul>
		</ul>
	</div>
	</div>
</nav>

<?php
}
?>