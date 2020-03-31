<?php

// à compléter
session_start();
include_once('./fonctions/bd.php');
include_once('./fonctions/utilisateur.php');
include_once('./fonctions/discussion.php');


$link = getConnection($dbHost, $dbUser, $dbPwd, $dbName);
$pseudo = $_SESSION['pseudo'];
$other_user = getConnectedUsers($link);

$history = getHistory($historySize, $link);

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
		}

		.Users {
			/* box-shadow: 12px 12px 2px 1px rgba(0, 0, 0, .6); */
			box-shadow: 
       inset 0 -3em 3em rgba(0,0,0,0.1), 
             0 0  0 2px rgb(0,0,0),
             0.3em 0.3em 1em rgba(0,0,0,0.6);
			height: 30%;
			border-radius: 40px; 
			text-align: center;
			justify-content: center;
			margin: 1rem 2rem;
			letter-spacing: 1.5px;
			padding: 15% 0px;
			font-size: 14px;
			float: left;
		}

		.Messages {
			float: right;
			box-shadow: 
       inset 0 -3em 3em rgba(0,0,0,0.1), 
             0 0  0 2px rgb(0,0,0),
             0.3em 0.3em 1em rgba(0,0,0,0.6);
			border-radius: 40px;
			margin: 2rem 2rem;
			height: 30%;
		}
		tr {

		}
		.msg-content {
			padding: 0.5rem 7rem;
		}
		.title-content {
			padding: 0.5rem 7rem;
		}
		
	</style>



</head>

<body>
	<div class="Users">
		<?php

		echo ("
	<div> 
		<p><b> Bienvenue $pseudo </b></p>
	</div>");
		?>

		<table class="table" style="padding: 0 3rem;">
			<thead>
				<tr>
					<th><i><u>Autres utilisateurs en ligne</u></i></th>
				</tr>
			</thead>
			<tbody>
				<?php

				$nbPersoCo = 0;
				foreach ($other_user as $unePersonne) {
					echo "
      					<tr>
          					<td> <p style='margin-bottom: 0;'><b> -" . $unePersonne['pseudo'] . "</b></p> </td>
        				</tr>
      					";
					$nbPersoCo++;
				}

				?>
			</tbody>
		</table>
	</div>
	<div class="Messages">
		<table>
				<thead>
					<tr>
						<td class="title-content"><b>Auteurs</b></td>
						<td class="title-content"><b>Messages</b></td>
						<td class="title-content"><b>Dates</b></td>
						<td class="title-content"><b>Heures</b></td>
					</tr>
				</thead>
				<tbody>
				<?php
					foreach ($history as $msg) {
						echo"
						<tr>
							<td class='msg-content'> <i>". $msg['auteur'] .":</i> </td>
							<td class='msg-content'> <i>". $msg['valeur'] ."</i> </td>
							<td class='msg-content'> <i>". $msg['date'] .":</i></td>
							<td class='msg-content'> <i>". $msg['heure'] .":</i> </td>
						</tr>
						";
					}
					
				?>
				</tbody>
		</table>
		
	</div>
</body>

</html>