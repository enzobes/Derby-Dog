<?php
//Connection database
	include ("database.php");

//variables
$dog_id = $_GET['id'];
$userID = $_POST['userID'];
$date_sponsored = $_POST['date_sponsored'];
$amount_paid = $_POST['amount_paid'];
//query
$query = $bdd->prepare('SELECT * FROM dog WHERE dog_id = :dog_id');
$query->bindParam(':dog_id', $dog_id, PDO::PARAM_INT);

$query1= $bdd->prepare('SELECT * FROM user WHERE user_id = :userID ');
$query1->bindParam(':userID', $userID, PDO::PARAM_STR);

$query2= $bdd->prepare("INSERT INTO sponsored_dog (dog_id, user_id, date_sponsored, paid_per_month) VALUES ( ?, ?, ?, ? )");

//output
$output= "";
$output2="";
//Confim sponsorship panel
	$query->execute();
	$row = $query->fetch();

	$likes_other_dog = $row['likes_other_dog'];
	if($likes_other_dog =='Y'){
		$likes_other_dog = '<span class="glyphicon glyphicon-ok spanGreen"></span>';
	}else{
		$likes_other_dog = '<span class="glyphicon glyphicon-remove spanRed"></span>';
	}
	$likes_to_play = $row['likes_to_play'];
	if($likes_to_play =='Y'){
		$likes_to_play = '<span class="glyphicon glyphicon-ok spanGreen"></span>';
	}else{
		$likes_to_play = '<span class="glyphicon glyphicon-remove spanRed"></span>';
	}

		$output = $output . "
		<div class='panel panel-success'>
			<div class='panel-heading'>
			<h3 class='panel-title'>Confirm your sponsorship</h3>
			</div>
			<div class='panel-body align-centered'>
			<img class='img_confirm' width=124 height=124 src=". $row['picture_url'] ." alt='dog_image'>

			<div class ='details_sponsor'>
			<h5>Name : ". $row['name'] ."</h5>
			<h5>Age : ". $row['age'] ."</h5>
			<h5>Gender : ". $row['gender'] ."</h5>
			</div>
			</div>
		</div>
	";
	//Form Control
	$query1->execute();
	$row = $query1->fetch();
	if($userID == $row['user_id']){
		if(isset($_POST['date_sponsored']) && isset($_POST['amount_paid'])){
			$query2->execute(array($dog_id, $userID, $date_sponsored, $amount_paid));
			$output2 = $output2 . "<div class='alert alert-success align-centered' role='alert'>Thank you for sponsoring this dog.</div>";


		}
	}else {
		$output2 = $output2 . "<div class='alert alert-danger align-centered' role='alert'>Please enter a correct user. </div>";

	}



?>
<!DOCTYPE html>

<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Derby Dogs Kennels - Staffordshire University</title>
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link href="css/style.css" rel="stylesheet">
		<link href='http://fonts.googleapis.com/css?family=Cabin:400,500,600,700,400italic,500italic,600italic,700italic' rel='stylesheet' type='text/css'>
		<link href='http://fonts.googleapis.com/css?family=Lato:300,400,700,900,400italic,700italic,900italic' rel='stylesheet' type='text/css'>
	</head>
	<body class="homepage">
		<!-- Header -->
		<header>
			<div class="small-container">
				<div class="container">
						<div class="intro-text">
								<div class="intro-heading-small">Welcome to Derby Dog!</div>
								<div class="intro-lead-in">You can sponsor a dog</div>
								<a href="sponsor.php" class="btn-xl">Tell Me More</a>
						</div>
				</div>
			</div>
		</header>


		<nav  class="navbar navbar-default navbar-custom navbar-fixed-top">
			<div class="container">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<figure id= "icone_nav">

					<a class="navbar-brand" href="index.php"><strong><img src="images/dog-icon.png" alt="icone" width="48" height="48" >Derby Dogs</strong><br /></a>

					</figure>
				</div>
				<div class="navbar-collapse collapse">
					<ul class="nav navbar-nav navbar-right">
						<li>
							<a href="index.php" title="Home"><span data-hover="Home" >Home</span></a>
						</li>
						<li class="active">
							<a href="search.php" title="search"><span data-hover="Search ">Search</span></a>
						</li>

						<li>
							<a href="sponsor.php" ><span data-hover="Sponsor">Sponsor</span></a>

						</li>
						<li>
							<a href="admin.php" title="admin"><span data-hover="Admin">Admin</span></a>
						</li>


					</ul>
				</div>
			</div>
		</nav>
		<!-- Navigation end -->
<div class="page-header">
  <h1 class="titleh1">Sponsor details</h1>
</div>
<div class="panel panel-default">
  <div class="panel-body">

		<?php echo($output);
		 ?>
		 <h2 class="titleh1">Your informations</h2>
		 <?php echo($output2);
 		 ?>
<form method="POST">
		 <div class='col-sm-6 col-md-4'>
		 	<div class="input-group">
	  		<span class="input-group-addon" id="sizing-addon2">UserID</span>
	  		<input type="text" name="userID" class="form-control" placeholder="Insert your UserID" aria-describedby="sizing-addon2" required>
			</div>
		</div>
		<div class='col-sm-6 col-md-4'>
		 <div class="input-group">
			 <span class="input-group-addon" id="sizing-addon3">Amount paid/month</span>
			 <input name="amount_paid" type="number" step="0.01" class="form-control" placeholder="e.g.12.50" aria-describedby="sizing-addon2" required>
			 <span class="input-group-addon">£</span>

		 </div>
	 	</div>
	 <div class='col-sm-6 col-md-4'>
		<div class="input-group">
			<span class="input-group-addon" id="sizing-addon4">Date Sponsored</span>
			<input type="date" name="date_sponsored" class="form-control" aria-describedby="sizing-addon2" required>
		</div>
	</div>

		<br/>
			<button type="submit" class="btn btn-success column-submit ">Submit <span class="glyphicon glyphicon-chevron-right"></span></button>
		</form>

			</div>
			</div>

<!-- Footer -->
<footer>

<div class="footer">
	<div class="container">
		<div class="row">
			<div class="col-md-3">
				<h6>About Us</h6>
				<p><strong>Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat.</strong></p>
				<p>Nam liber tempor cum soluta nobis eleifend option congue nihil imperdiet doming id quod mazim placerat facer possim assum. Typi non habent claritatem insitam.</p>
			</div>
			<div class="col-md-3 blog">
				<h6>Freshly blogged</h6>
				<p class="title"><a href="#" title="">You can sponsorship a dog !</a></p>
				<p>Claritas est etiam processus dynamicus, qui sequitur mutationem consuetudium lectorum. Mirum est notare quam littera gothica, quam nunc putamus parum claram.</p>
			</div>
			<div class="col-md-3">
				<h6>Navigation</h6>
				<ul>
					<li><a href="index.php" >Home</a></li>
					<li><a href="search.php" >Search</a></li>
					<li><a href="sponsor.php" >Sponsor</a></li>
					<li><a href="admin.php">Admin</a></li>
				</ul>
			</div>
			<div class="col-md-3 contact-info">
				<h6>Keep in touch</h6>
				<p>Claritas est etiam processus dynamicus, qui sequitur mutationem consuetudium lectorum.</p>
				<p class="social">
					<a href="#" class="facebook"></a> <a href="#" class="pinterest"></a> <a href="#" class="twitter"></a>
				</p>
				<p class="c-details">
					<span>Mail: </span> <a href="mailto:derbydog@dog.com" title="">derbydog@dog.com</a><br >
					<span>Tel:</span> 00336 98 39 92 58
				</p>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12 copyright">
				<p>&copy; Copyright 2017. All rights reserved. <a href="index.php" title="Derby Dog">Derby Dog</a></p>
			</div>
		</div>
	</div>
</div>
</footer>
<!-- Footer end -->






<!-- Javascript plugins -->
<script src="https://code.jquery.com/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/carouFredSel.js"></script>
<script src="js/jquery.stellar.min.js"></script>
<script src="js/custom.js"></script>
<script src="js/jquery-ui.min.js"></script>




	</body>
</html>
