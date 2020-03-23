<?php
session_start();
require_once 'fonctions/bd.php';
require_once 'fonctions/utilisateur.php';

$stateMsg = "";

if (isset($_POST["valider"])) {
  $pseudo = $_POST["pseudo"];
  $hashMdp = md5($_POST["mdp"]);
  $hashConfirmMdp = md5($_POST["mdp-repeat"]);

  $link = getConnection($dbHost, $dbUser, $dbPwd, $dbName);

  $available = checkAvailability($pseudo, $link);

  if ($hashMdp == $hashConfirmMdp) {
    if ($available) {
      register($pseudo, $hashMdp, $link);
      header('Location: index.php?subscribe=yes');
    } else {
      $stateMsg = "Le pseudo demand&eacute; est d&eacute;j&agrave; utilis&eacute;";
    }
  } else {
    $stateMsg = "Les mots de passe ne correspondent pas, veuillez r&eacute;essayer";
  }
}

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
  <?php
  session_start();
  ?>

  <form action="inscription.php" style="border:1px solid #ccc" method="POST">
    <div class="container">
      <label for="pseudo"><b>Pseudo souhaité:</b></label>
      <input type="text" placeholder="Entrer un pseudo" name="pseudo" required>

      <label for="mdp"><b>Mot de passe:</b></label>
      <input type="password" placeholder="Entrer MDP" name="mdp" required>

      <label for="psw-repeat"><b>Confirmer mot de passe:</b></label>
      <input type="password" placeholder="Repeat Password" name="mdp-repeat" required>

      <button type="button" class="cancelbtn">Cancel</button>
      <button type="submit" class="signupbtn">S'inscrice</button>>
    </div>
  </form>

</body>

</html>