<?php
//Connection database

include ("database.php");

$query = $bdd->prepare('SELECT * FROM dog WHERE adopted = "Y" ORDER BY name ASC');
$query2= $bdd->prepare('SELECT DISTINCT user.user_id, first_name, last_name, address_line_1, postcode FROM dog INNER JOIN sponsored_dog ON dog.dog_id = sponsored_dog.dog_id INNER JOIN user ON sponsored_dog.user_id = user.user_id WHERE adopted = "Y" ORDER BY user_id');
$query3 = $bdd->prepare('DELETE sponsored_dog FROM sponsored_dog INNER JOIN dog ON sponsored_dog.dog_id=dog.dog_id WHERE dog.adopted = "Y"');
$query4 = $bdd->prepare('DELETE FROM dog WHERE adopted ="Y"');
$output="";
$output2="";

//DELETE BUTTON ACTIONS
if(isset($_POST['delete_sponsorship'])){
	$query3->execute();
	$output3 = $output3 . "<div class='alert alert-danger align-centered' role='alert'>All sponsorships of adopted dog have been deleted</div>";
}
if(isset($_POST['delete_adopted'])){
	$query4->execute();
	$output3 = $output3 . "<div class='alert alert-danger align-centered' role='alert'>All adopted dog have been deleted</div>";
}

//ADOPTED DOG
$query->execute();
while ($row = $query->fetch()){
	$output = $output . "
	<div class='col-sm-6 col-md-4'>
	<div class='thumbnail'>
	<img class='image-article' src=". $row['picture_url'] ." alt='dog_adopted'>
	<div class='caption'>
	<h3 class='align-centered'>". $row['name'] ."</h3>
	</div>
	</div>
	</div>
	";
}

//TABLES SPONSORSHIP
$query2->execute();

while ($row = $query2->fetch()){
	$output2 = $output2 . "
	<tr>
		<td scope='row'>".$row['user_id']."</td>
		<td>".$row['first_name']."</td>
		<td>".$row['last_name']."</td>
		<td>".$row['address_line_1']."</td>
		<td>".$row['postcode']."</td>
	</tr>

	";
}
$output3="";

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
	<link href="css/admin.css" rel="stylesheet">

	<link href='http://fonts.googleapis.com/css?family=Cabin:400,500,600,700,400italic,500italic,600italic,700italic' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Lato:300,400,700,900,400italic,700italic,900italic' rel='stylesheet' type='text/css'>

</head>
<!--
<body class="homepage" style="background-color:#9bc1ff">
-->
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
					<li>
						<a href="search.php" title="search"><span data-hover="Search ">Search</span></a>
					</li>

					<li>
						<a href="sponsor.php" ><span data-hover="Sponsor">Sponsor</span></a>

					</li>
					<li class="active">
						<a href="admin.php" title="admin"><span data-hover="Admin">Admin</span></a>
					</li>


				</ul>
			</div>
		</div>
	</nav>
	<!-- Navigation end -->

	<div id="adm" class="alert alert-danger" role="alert"><h2>Admin Page</h2></div>
	<header>
		<section>
			<div id="adminPage" class="panel panel-danger">
				<div class="panel-heading">
					<h3 class="panel-title">Admin Page</h3>
				</div>
				<div class="page-header">
					<h1 class="titleh1">All dog adopted</h1>
				</div>
				<div class="row paddingAdmin">
					<?php echo ($output); ?>
				</div>

				<div class="page-header">
					<h1 class="titleh1">All sponsors of adopted dogs</h1>
				</div>
				<table class='table paddingAdmin'>
					<thead class ="strongCell">
						<tr>
							<td>ID</td>
							<td>First Name</td>
							<td>Last Name</td>
							<td>Address</td>
							<td>Postcode</td>

						</tr>
					</thead>

					<tbody>
						<?php echo ($output2); ?>


					</tbody>
				</table>
				<div class="page-header">
					<h1 class="titleh1">Delete Action</h1>
				</div>
				<div class="row marginRow">
					<div class='col-sm-6'>
						<h4>
							Deletes all sponsorships of adopted dogs
						</h4>
						<form method = 'POST'>
							<button name="delete_sponsorship" type="submit" class="btn btn-danger btn-lg" role="button">Delete</button>
						</form>
					</div>
					<div class='col-sm-6'>
						<h4>
							Deletes all adopted dogs
						</h4>
						<form method = 'POST'>
							<button name="delete_adopted" type="submit" class="btn btn-danger btn-lg" role="button">Delete</button>
						</form>

					</div>

				</div>
				<?php echo ($output3) ?>




			</section>
		</header>
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
							<button type="button" class="btn btn-success">Sponsor a dog</button>
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
								<span>Mail: </span> <a href="#" title="">derbydog@dog.com</a><br >
								<span>Tel:</span> 00336 98 39 92 58
							</p>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12 copyright">
							<p>&copy; Copyright 2017. All rights reserved. <a href="#" title="Derby Dog">Derby Dog</a></p>
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
