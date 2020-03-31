<?php

// à compléter
session_start();
include_once('./fonctions/bd.php');
include_once('./fonctions/utilisateur.php');
include_once('./fonctions/discussion.php');


$link = getConnection($dbHost, $dbUser, $dbPwd, $dbName);
$pseudo = $_SESSION['pseudo'];
$other_user = getConnectedUsers($link);

$html = "<table>";
foreach ($other_user as $row) {
	$html .= "<tr>";

	$html .= "</tr>";
}
$html .= "</table>";

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
			box-shadow: 12px 12px 2px 1px rgba(0, 0, 0, .6);
			width: 18%;
			height: 30%;
			border-radius: 40px;
			text-align: center;
			justify-content: center;
			margin-right: 2rem;
			letter-spacing: 1.5px;
			padding: 15% 0px;
			font-size: 14px;
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
</body>

</html>