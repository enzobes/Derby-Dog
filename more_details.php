<?php
ini_set('display_errors','on');
error_reporting(E_ALL);
?>
<?php
//Connection database
	include ("database.php");

//variables
$id = $_GET['id'];
//query
$query = $bdd->prepare('SELECT * FROM dog INNER JOIN dog_breed ON dog.breed = dog_breed.dog_breed_id INNER JOIN colour on dog.colour = colour.colour_id WHERE dog_id = "'.$id.'"');
$query2 = $bdd->prepare('UPDATE dog SET adopted = "Y" WHERE dog_id = :id');
$query2->bindParam(':id', $id, PDO::PARAM_INT);
$query3= $bdd->prepare('SELECT dog_id, adopted FROM dog WHERE dog_id = :id');
$query3->bindParam(':id', $id, PDO::PARAM_INT);

//output
$output= "";
$output2= "";

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
				<div class='thumbnail'>
				<img class='icon-article' src=". $row['picture_url'] ." alt='dog_image'>
					<div class='caption'>
						<div class='option'>
						<h3 class='name_dog'>". $row['name'] ."</h3>

						<h5>Age: ". $row['age'] ." years</h5>
						<h5>Gender: ". $row['gender'] ."</h5>
						<h5>Breed: ". $row['description_breed'] ."</h5>
						<h5>Color: ". $row['description_color'] ."</h5>
						<br/>
						<h5>Like Other Dog: ". $likes_other_dog ."</h5>
						<h5>Like To Play: ". $likes_to_play ."</h5>
						<br/>
				 </div>
				 <div class='align-centered'>
				 <h5>Description:</h5><br/>
				". $row['description_dog'] ."
				 </div>

					</div>
</div>
	";

//Adopt this dog
//$query2 = $bdd->query('UPDATE dog SET adopted = "Y" WHERE dog_id = "'.$id.'"');
$query3->execute();
$row = $query3->fetch();
$adopted = $row['adopted'];

if($adopted == "N" && isset($_POST['btn_adopted'])){
	$query2->execute();
	$output = $output . "<div class='alert alert-success align-centered' role='alert'>This dog is now adopted </div>";


}elseif($adopted =="Y"){
	$output = $output . "<div class='alert alert-info align-centered' role='alert'>Dog already adopted </div>";
}else{

	$adopted = $row['adopted'];
	$output = $output . "
	<section class='align-centered'>
	<h5>Actions:</h5><br/>
	<form method = 'POST'>
		<div class='btn-group'>
			<a href='sponsor_details.php?id=".$row['dog_id']."' class='btn btn-success btn-lg' role='button'>Sponsor this dog</a></div>
			<div class='btn-group'>
			<button type='submit'  name = 'btn_adopted' class='btn btn-success btn-lg'>Adopt this dog</button>
			</div>
	</form>
	</section>
	";
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
		<h1 class="titleh1">More details</h1>
	</div>
	<div class="panel panel-default">
		<div class="panel-body">
			<?php echo($output);
			?>

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
