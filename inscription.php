<?php
// à compléter
require_once('./bd.php');
require_once('./utilisateur.php');

?>

<!doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <title>Premi&egrave;re inscription</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
	<!-- à compléter -->
  <form action="inscription.php" style="border:1px solid #ccc">
  <div class="container">

    <label for="pseudo"><b>Pseudo souhaité:</b></label>
    <input type="text" placeholder="Entrer un pseudo" name="pseudo" required>

    <label for="mdp"><b>Mot de passe:</b></label>
    <input type="password" placeholder="Entrer MDP" name="mdp" required>

    <label for="psw-repeat"><b>Confirmer mot de passe:</b></label>
    <input type="password" placeholder="Repeat Password" name="mdp-repeat" required>

    <div class="clearfix">
      <button type="button" class="cancelbtn">Cancel</button>
      <button type="submit" class="signupbtn">S'inscrice</button>
    </div>
    
  </div>
</form> 
</body>
</html>