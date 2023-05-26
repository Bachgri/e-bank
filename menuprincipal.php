<!DOCTYPE html>
<html>
<?php session_start() ?>

<head>
  <title>Ma Page</title>
  <link rel="stylesheet" href="./public/css/menuprincip.css">
  <style>

  </style>
</head>

<body>
  <header>
    <img src="logo.png" alt="Ebank" class="logo">
  </header>
  <div class="container">
    <div class="title-left">
      <h5>Utilisateur : <?php echo $_SESSION["nomuser"]; ?></h5>
      <input type="hidden" name="nom" value="<?php echo $_SESSION["nomuser"]; ?>">
    </div>
    <div class="title-center">
      <h5>Rôle : <?php echo "" . $_SESSION["libelrole"] ?></h5>
      <input type="hidden" name="role" value="<?php echo $_COOKIE["libelrole"]; ?>">
    </div>
    <div class="button-logout">
      <a href="../controllers/auth/deconnect.php">
        <button>Déconnexion </button>
      </a>
    </div>
  </div><br><br>
  <div class="dropdown">
    <a href="./page1GCC.php">
      <button class="dropbtn">Gestion clients / contrats</button>
    </a>
  </div>
  <div class="dropdown">
    <a href="">
      <button class="dropbtn">Gestion des opérations</button>
    </a>
  </div>
</body>

</html>