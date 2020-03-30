<?php

/*Cette fonction prend en entrée un pseudo à ajouter à la relation utilisateur et une connexion et 
retourne vrai si le pseudo est disponible (pas d'occurence dans les données existantes), faux sinon*/
function checkAvailability($pseudo, $link)
{
	$sql_REQ = "SELECT pseudo FROM utilisateur WHERE pseudo='". $pseudo ."';";
	$sql = executeQuery($link, $sql_REQ);
	if (mysqli_num_rows($sql) >= 1) {
		return false;
	} else {
		return true;
	}/* 
	$req = "SELECT * FROM utilisateur Where pseudo = \"$pseudo\"";
    $result = executeQuery($link,$req);
    return mysqli_num_rows($result) == 0; */
}

/*Cette fonction prend en entrée un pseudo et un mot de passe, associe une couleur aléatoire dans le tableau de taille fixe  
array('red', 'green', 'blue', 'black', 'yellow', 'orange') et enregistre le nouvel utilisateur dans la relation utilisateur via la connexion*/
function register($pseudo, $hashPwd, $link)
{
  $color = array('red', 'blue', 'yellow', 'black', 'orange', 'green');
  $index = rand(0, 5);
  $color = $color[$index];
  $query = "INSERT INTO utilisateur VALUES (\"$pseudo\", \"$hashPwd\", \"$color\", 'disconnected');";
  executeQuery($link, $query);
}

/*Cette fonction prend en entrée un pseudo d'utilisateur et change son état en 'connected' dans la relation 
utilisateur via la connexion*/
function setConnected($pseudo, $link)
{
	$query = "UPDATE utilisateur SET etat = 'connected' WHERE pseudo = \"$pseudo\"; ";
	executeQuery($link, $query);
	executeUpdate($link, $query);
}

/*Cette fonction prend en entrée un pseudo et mot de passe et renvoie vrai si l'utilisateur existe (au moins un tuple dans le résultat), faux sinon*/
function getUser($pseudo, $hashPwd, $link)
{
	// à compléter
	$query = "SELECT pseudo FROM utilisateur WHERE pseudo = ".$pseudo." AND mdp = ".$hashPwd." AND etat = 'disconnected';";
	$result = executeQuery($link, $query);
	if (mysqli_num_rows($result) >= 1) {
		return false;
	} else {
		return true;
	}
}


/*Cette fonction renvoie un tableau (array) contenant tous les pseudos d'utilisateurs dont l'état est 'connected'*/
function getConnectedUsers($link)
{
	// à compléter
}

/*Cette fonction prend en entrée un pseudo d'utilisateur et change son état en 'disconnected' dans la relation 
utilisateur via la connexion*/
function setDisconnected($pseudo, $link)
{
	// à compléter
}

/*Cette fonction renvoie la couleur associée à un utilisateur pour son affichage dans le fil de discussion*/
function getUserColor($pseudo, $link)
{
	// Optionnel, à compléter
}
