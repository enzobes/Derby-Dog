<?php

//Connection database
include ("database.php");
//POST variables
$q = htmlspecialchars($_POST['q']);
$breed = htmlspecialchars($_POST['id_breed']);
$name2 = htmlspecialchars($_POST['search_name']);
$age =$_POST['select_age'];

//Query
$query = $bdd->prepare('SELECT * FROM dog WHERE name LIKE :q AND adopted ="N" ORDER BY name');
$query2 = $bdd->prepare('SELECT * FROM dog_breed ORDER BY description_breed');
$query3 = $bdd->prepare('SELECT * FROM dog WHERE breed = :breed AND adopted ="N" ORDER BY name');
$query4 = $bdd->prepare('SELECT DISTINCT age FROM dog ORDER BY age ASC');
$query5 = $bdd->prepare('SELECT * FROM dog WHERE name LIKE :name2 AND age= :age  AND adopted ="N" ORDER BY name');
$q = "%".$q."%";
$query->bindParam(':q', $q, PDO::PARAM_STR);
$query3->bindParam(':breed', $breed, PDO::PARAM_STR);
$name2 = "%".$name2."%";
$query5->bindParam(':name2', $name2, PDO::PARAM_STR);
$query5->bindParam(':age', $age, PDO::PARAM_INT);




//output
$output ="";
$output2= "";
$output3 = "";
//FORM 1

$query->execute();

if($query->rowCount() == 0){

	$output = $output."<br/><div class='alert alert-danger align-centered' role='alert'>No results found</div>" ;

}elseif(empty($_POST['q']) && isset($_POST['button_search'])){

	$output = $output."<br/><div class='alert alert-danger align-centered' role='alert'>Please fill in the name field</div>" ;

}elseif(isset($_POST['q'])&& !empty($_POST['q'])){

	$output = $output . "<div class='panel-body '>";
	while($row = $query->fetch()) {
		$output = $output . "
		<div class='col-sm-6 col-md-4'>
				<div class='thumbnail'>
				<img class='icon-article' src=". $row['picture_url'] ." alt='dog_image'>
					<div class='caption'>
						<div class='option'>
						<h3 class='name_dog'>". $row['name'] ."</h3>
						<h5>Age: ". $row['age'] ." years</h5>
						<h5>Gender: ". $row['gender'] ."</h5>
						<br/>
				 </div>
				 ". $row['description_dog'] ."
				 <p class='align-centered'><a href='more_details.php?id=".$row['dog_id']."' class='btn btn-default' role='button'>More details</a></p>
					</div>
				</div>
			</div>
	";
	}
	$output = $output . "</div>";

}
// SELECT
$query2->execute();
	while ($row = $query2->fetch()) {
		$output2 =$output2."<option id=id_breed_".$row['dog_breed_id']." value=".$row['dog_breed_id'].">".$row['description_breed']."</option>";
	}

//FORM 2

$query3->execute();

if(($query3->rowCount() == 0) && !empty($_POST['id_breed'])){

	$output = $output."<br/><div class='alert alert-danger align-centered' role='alert'>No results found</div>" ;

}elseif(isset($_POST['id_breed'])&& !empty($_POST['id_breed'])){

	$output = $output . "<div class='panel-body '>";

	while($row = $query3->fetch()) {
		$output = $output . "
		<div class='col-sm-6 col-md-4'>
				<div class='thumbnail'>
				<img class='icon-article' src=". $row['picture_url'] ." alt='dog_image'>
					<div class='caption'>
						<div class='option'>
						<h3 class='name_dog'>". $row['name'] ."</h3>
						<h5>Age: ". $row['age'] ." years</h5>
						<h5>Gender: ". $row['gender'] ."</h5>

						<br/>
				 </div>
				 ". $row['description_dog'] ."
				 <p class='align-centered'><a href='more_details.php?id=".$row['dog_id']."' class='btn btn-default' role='button'>More details</a></p>
					</div>
				</div>
			</div>
	";
	}
	$output = $output . "</div>";


}
// SELECT AGE
$query4->execute();

	while ($row = $query4->fetch()) {
		$output3 =$output3."<option  value=".$row['age'].">".$row['age']." years</option>";
	}

//FORM 3
$query5->execute();

if(($query5->rowCount() == 0) && !empty($_POST['search_name'])){

	$output = $output."<br/><div class='alert alert-danger align-centered' role='alert'>No results found</div>" ;

}elseif(empty($_POST['search_name']) && isset($_POST['button_search2'])){

	$output = $output."<br/><div class='alert alert-danger align-centered' role='alert'>Please fill in the name field in addition to the age</div>" ;

}elseif(isset($_POST['search_name'])&& !empty($_POST['search_name'])){
	$output = $output . "<div class='panel-body '>";

	while($row = $query5->fetch()) {
		$output = $output . "
		<div class='col-sm-6 col-md-4'>
				<div class='thumbnail'>
				<img class='icon-article' src=". $row['picture_url'] ." alt='dog_image'>
					<div class='caption'>
						<div class='option'>
						<h3 class='name_dog'>". $row['name'] ."</h3>
						<h5>Age: ". $row['age'] ." years</h5>
						<h5>Gender: ". $row['gender'] ."</h5>
						<h5>Breed number: ". $row['breed'] ."</h5>

						<br/>
				 </div>
				 ". $row['description_dog'] ."
				 <p class='align-centered'><a href='more_details.php?id=".$row['dog_id']."' class='btn btn-default' role='button'>More details</a></p>
					</div>
				</div>
			</div>
	";
	}
	$output = $output . "</div>";


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
		<h1 class="titleh1">Search Forms</h1>
	</div>
	<div class="centerSection">

		<div class="panel panel-success align-centered">
			<div id="rowid" class="row" >
				<div class="col-xs-6 col-md-3">


					<label class="col-form-label">Dog Name</label>
					<div class="input-group" >
						<form method="POST">
							<input type="search" name="q"  class="form-control"  placeholder="Input a dog name ....">
							<span style="display:block;" class="input-group-btn">
								<button class="btn btn-success" name="button_search" type="submit"><span class="glyphicon glyphicon-search"></span></button>
							</span>
						</form>

					</div><!-- /input-group -->
				</div>
				<div class="col-xs-4 col-md-3">
					<label class="col-form-label">List of breeds</label>
					<div class="input-group">




						<form method="POST">
							<select name ="id_breed" style='width:100%' class='form-control'>
								<?php echo($output2);

								?>
							</select>
							<span style="display:block;" class="input-group-btn">
								<button class="btn btn-success" name="btn_breed" type="submit"><span class="glyphicon glyphicon-search"></span></button>
							</span>
						</form>
					</div><!-- /input-group -->
				</div>
				<div class="col-xs-6 col-md-4">

					<label class="col-form-label">Search by Age & Name</label>

					<div class="input-group input-group2">
						<form method="POST">
							<select name = "select_age" style="width:26%" class="form-control">
								<?php echo $output3 ?>

							</select>
							<span class="input-group-btn">
								<input type="text" class="form-control"  name ="search_name" placeholder="Input a dog name ....">

								<button class="btn btn-success" name="button_search2" type="submit"><span class="glyphicon glyphicon-search"></span></button>
							</span>
						</form>


					</div><!-- /input-group -->
				</div>
			</div>
		</div>
	</div>






	<div class="panel panel-default borderLine">
		<?php echo($output); ?>
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
