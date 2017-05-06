<?php

try
{
	$bdd = new PDO('mysql:host=web.fces.staffs.ac.uk;dbname=b034511g;charset=utf8', 'b034511g', 'alpine');
}
catch (Exception $e)
{
				die('Erreur : ' . $e->getMessage());
}
?>
