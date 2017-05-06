<?php
ini_set('display_errors','on');
error_reporting(E_ALL);
?>
<?php
//Connection database

	include ("database.php");

$query = "SELECT * FROM news ORDER BY date_of_publication DESC LIMIT 0, 4";
$result = $bdd->query($query);
$output="";

while ($row = $result->fetch()){
			$output = $output . "
			<div class='panel panel-default'>
				<div class='panel-heading'>
					<h3 class='panel-title'>". $row['news_headline'] ."</h3>
				</div>
				<div class='panel-body'>
				<img class='image-article' src=".$row['picture_url'] ." alt='rescue-dog'>
				<p class='text-article'>" . $row['brief_news_text'] ."</p></div>
				<div class='panel-footer'><span class='glyphicon glyphicon-calendar'></span>".$row['date_of_publication']."</div>
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
	<title>Derby Dogs- Staffordshire University</title>
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/style.css" rel="stylesheet">
	<link href='http://fonts.googleapis.com/css?family=Cabin:400,500,600,700,400italic,500italic,600italic,700italic' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Lato:300,400,700,900,400italic,700italic,900italic' rel='stylesheet' type='text/css'>

	</head>

	<body class="homepage">


		<!-- Navigation -->
		<!-- Header -->
    <header>
        <div class="container">
            <div class="intro-text">
                <div class="intro-heading">Welcome to Derby Dog!</div>
                <div class="intro-lead-in">You can sponsor a dog</div>
                <a href="sponsor.php" class="btn-xl">Tell Me More</a>
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
						<li class="active">
							<a href="index.php" title="Home"><span data-hover="Home" >Home</span></a>
						</li>
						<li>
							<a href="search.html" title="search"><span data-hover="Search ">Search</span></a>
						</li>

						<li>
							<a href="sponsor.php" ><span data-hover="Sponsor">Sponsor</span></a>

						</li>
						<li>
							<a href="admin.html" title="admin"><span data-hover="Admin">Admin</span></a>
						</li>


					</ul>
				</div>
			</div>
		</nav>
		<!-- Navigation end -->
		<!-- Slider -->

<div class="page-header">
	<h1 class="titleh1">Home Page</h1>
</div>
<div class="row" id="columnx3">
	<div class="col-sm-6 col-md-4">
		<div class="thumbnail">
			<img src="images/akita.jpg" alt="akita" />
			<div class="caption">
				<h3 class="titleh3_sp">Akita</h3>
				<p>The Akita is a large and powerful dog breed with a noble and intimidating presence. He was originally used for guarding royalty and nobility in feudal Japan. The Akita also tracked and hunted wild boar, black bear, and sometimes deer. He is a fearless and loyal guardian of his family.
					The Akita does not back down from challenges and does not frighten easily.
					Yet he is also an affectionate, respectful, and amusing dog when properly trained and socialized
				</div>
			</div>
		</div>
		<div class="col-sm-6 col-md-4">
			<div class="thumbnail">
				<img src="images/beagle.jpg" alt="Beagle">
				<div class="caption">
					<h3 class="titleh3_sp">Beagle</h3>
					<p>Small, compact, and hardy, Beagles are active companions for kids and adults alike. Canines in this dog breed are merry and fun loving,
						but being hounds, they can also be stubborn and require patient, creative training techniques. Their noses guide them through life, and they’re never happier than when following an interesting scent.
						The Beagle originally was bred as a scenthound to track small game, mostly rabbits and hare.</p>
					</div>
				</div>
			</div>
			<div class="col-sm-6 col-md-4">
				<div class="thumbnail">
					<img src="images/Finnish.jpg" alt="Finnish Spitz">
					<div class="caption">
						<h3 class="titleh3_sp">Finnish Spitz</h3>
						<p>Finnish Spitz is a breed of dog originating in Finland. The breed was originally bred to hunt all types of game from squirrels and other rodents to bears. It is a "bark pointer", indicating the position of game by barking, and drawing the gamer
							animal's attention to itself, allowing an easier approach for the hunter. Its original game hunting purpose was to point to game that fled into trees,
							such as grouse, and capercaillies, but it also serves well for hunting elk.</p>
						</div>
					</div>
				</div>
			</div>

<!-- NEWS SECTION -->

<h1 class="titleh1">NEWS</h1>


<?php echo($output); ?>

	<!-- Footer -->
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
	<!-- Footer end -->

</footer>

<!-- Javascript plugins -->
<script src="https://code.jquery.com/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/carouFredSel.js"></script>
<script src="js/jquery.stellar.min.js"></script>
<script src="js/custom.js"></script>
<script src="js/jquery-ui.min.js"></script>






	</body>
</html>
