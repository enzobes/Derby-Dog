<?php
ini_set('display_errors','on');
error_reporting(E_ALL);
?>
<?php
//Connection database

	include ("database.php");

$query = "SELECT * FROM dog WHERE adopted = 'N' ORDER BY name ASC";
$result = $bdd->query($query);
$output="";

while ($row = $result->fetch()){
			$output = $output . "
			<div class='col-sm-6 col-md-4'>
					<div class='thumbnail'>
					<img src=". $row['picture_url'] ." alt='dog_image'>
						<div class='caption'>
							<div class='option'>
							<h3 class='name_dog'>". $row['name'] ."</h3>
						<p>
							<h5>Age: ". $row['age'] ." years</h5>
							<h5>Gender: ". $row['gender'] ."</h5>
							</br>
			 		 </div>
					 ". $row['description_dog'] ."
					 </p>
					 <p class='align-centered'><a href='more_details.php?id=".$row['dog_id']."' class='btn btn-default' role='button'>More details</a></p>
				 		</div>
				 	</div>
				</div>
		";
}
	 $result->closeCursor(); // Termine le traitement de la requête

/* close connection */
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
		<!-- Connection database -->
		<?php
		include ("database.php");
		?>
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

						<li class="active">
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
		<!-- Slider -->

<div class="page-header">
  <h1 class="titleh1">Dog Sponsor Page</h1>
</div>
<div class="panel panel-success">
	  <div class="panel-heading">
	    <h3 class="panel-title">Dog sponsorship</h3>
	  </div>
	  <div class="panel-body">
	    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer gravida efficitur orci nec tincidunt. Maecenas et justo lectus.
			Curabitur augue nibh, molestie nec tristique eu, pretium ut neque.
			Aenean euismod neque vitae feugiat blandit. Ut laoreet blandit auctor. Interdum et malesuada
			fames ac ante ipsum primis in faucibus. Nullam malesuada rutrum maximus. Ut quis augue vel ipsum posuere porttitor.
			<br />
			<strong>For dog sponsorship infos please send an email to : <a href="mailto:enzobes@me.com">enzobes@me.com</a></strong>

	  </div>
</div>

	<p id="buttonLG"><a class="btn btn-success btn-lg" href="search.html" role="button">Search for a dog to sponsor <span class="glyphicon glyphicon-chevron-right"></span></a></p>
<div class="row" id="columnx3">
	<div class="col-sm-6 col-md-4">
	<div class="thumbnail">
		<img src="images/golden.jpg" alt="golden" />
		<div class="caption">
			<h3 class="titleh3_sp">Golden Retriver</h3>
			<p>The Golden Retriever is a large-sized breed of dog bred as gun dogs to retrieve shot waterfowl such as ducks and upland game birds during hunting and shooting parties,
				 and were named 'retriever' because of their ability to retrieve shot game undamaged. Golden Retrievers have an instinctive love of water, and are easy to train to basic.
				 They are a long-coated breed.</p><br/><br/>
		</div>
	</div>
</div>

	<div class="col-sm-6 col-md-4">
		<div class="thumbnail">
			<img src="images/bouvier.jpeg" alt="Bernese">
			<div class="caption">
				<h3 class="titleh3_sp">Bernese Mountain</h3>
				<p>The Bernese Mountain Dog, called in German the Berner Sennenhund, is a large-sized breed of dog, one of the four breeds of Sennenhund-type dogs from the Swiss Alps.
					The name Sennenhund is derived from the German Senne (“alpine pasture”) and Hund (“dog”), as they accompanied the alpine herders and dairymen called Senn. Berner (or Bernese in English) refers to the area of the breed’s origin,
					in the canton of Bern. This mountain dog was originally kept as a general farm dog. </p>
			</div>
		</div>
	</div>
	<div class="col-sm-6 col-md-4">
		<div class="thumbnail">
			<img src="images/bulldog.jpg" alt="French Bulldog">
			<div class="caption">
				<h3 class="titleh3_sp">French Bulldog</h3>
				<p>The French Bulldog also known as the Frenchie is a small breed of domestic dog. Frenchies were the result in the 1800s of a cross between bulldog ancestors imported from England and local ratters in Paris (France).
				In 2014, they were the fourth most popular registered dog in the United Kingdom and in the U.S. the ninth most popular AKC registered dog breed.
				They were rated the third most popular dog in Australia (for 2017).</p><br/>
			</div>
		</div>
	</div>
</div>

<!-- SPONSORSHIP SECTION -->

<h1 class="titleh1">Dog available for sponsorship</h1>
<div class="row" id="columnx3">

	<?php echo($output); ?>

</div>
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
					<li><a href="search.html" >Search</a></li>
					<li><a href="sponsor.php" >Sponsor</a></li>
					<li><a href="admin.html">Admin</a></li>
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
