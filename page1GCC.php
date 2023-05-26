<!DOCTYPE html>
<html>
<?php
session_start();
?>

<head>
  <title>Ma Page</title>
  <link rel="stylesheet" href="./public/css/page1GCC.css">
</head>

<body>
  <header>
    <img src="logo.png" alt="Ebank" class="logo">
  </header>
  <div class="container">
    <div class="title-left">
      <h5> <?php echo "Utilisateur : " . $_SESSION["nomuser"] ?></h5>
    </div>
    <div class="title-center">
      <h5><?php echo "Rôle : " . $_SESSION["libelrole"] ?></h5>
    </div>
    <div class="button-logout">
      <button>Deconnexion </button>
    </div>
  </div><br><br>
  <div class="dropdown">
    <button class="dropbtn">Menu</button>
    <div class="dropdown-content">
      <a href="./rechercheclient.html.php">Création client / compte</a>
      <a href="#">Mise à jour</a>
      <a href="#">Consultation</a>
    </div>
  </div>

  <div class="dropdown">
    <button class="dropbtn">Quitter</button>
  </div>
</body>

</html>