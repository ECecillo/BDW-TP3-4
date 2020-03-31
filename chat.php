<?php

// à compléter
session_start();
include_once('./fonctions/bd.php');
include_once('./fonctions/utilisateur.php');
include_once('./fonctions/discussion.php');


$link = getConnection($dbHost, $dbUser, $dbPwd, $dbName);
$pseudo = $_SESSION['pseudo'];

?>

<!doctype html>
<html lang="fr">

<head>
	<meta charset="utf-8">
	<title>Chat de BDW1</title>
	
	<style>
		@import url("https://fonts.googleapis.com/css2?family=Montserrat&display=swap");
		html {
			font-family: 'Montserrat', sans-serif;
			font-display: 400;
		}

	</style>



</head>

<body>
	<?php
	echo ("<div class='Userconnected'> Bienvenu $pseudo sur le chat BDW </div>");
	?>
</body>

</html>