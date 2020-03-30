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

    if ($available && ($hashMdp == $hashConfirmMdp)) {
      register($pseudo, $hashMdp, $link);
      header('Location: index.php?subscribe=yes');
      exit();
    } 
    else {
      echo "Le pseudo demandé ou le mdp n'est pas disponible";
    }
}
// echo isset($_POST["valider"]);
?>

<!doctype html>
<html lang="fr">

<head>
  <meta charset="utf-8">
  <title>Premi&egrave;re inscription</title>
  <link rel="stylesheet" href="style.css">
</head>

<body>
  <style>
    body {
      width: 50%;
      padding: 10% 22%; 
      justify-content: center;
      /* text-align: center; */
    }
  </style>

  <!-- à compléter -->
  <h1 style="text-align: center;">Inscription à la BDW</h1>
  <form action="inscription.php" style="border:2px solid #ccc; border-radius: 30px;" method="POST">
    <div class="container">
      <div class="fillform" style="margin: 1rem;">
        <label for="pseudo"><b>Pseudo souhaité:</b></label>
        <input type="text" placeholder="Entrer un pseudo" name="pseudo" required>
        <br>
        <br>
        <label for="mdp"><b>Mot de passe:</b></label>
        <input type="password" placeholder="Entrer MDP" name="mdp" required>
        <br>
        <br>
        <label for="psw-repeat"><b>Confirmer mot de passe:</b></label>
        <input type="password" placeholder="Confirmer mdp" name="mdp-repeat" required>
        <br>
        <br>
      </div>
      <div class="butt" style="text-align: center; margin: 1rem;">
        <button type="button" class="cancelbtn">Annuler</button>
        <button type="submit" class="valider" name="valider">S'inscrice</button>
      </div>
    </div>
  </form>

</body>

</html>