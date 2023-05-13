<!DOCTYPE html>
<html>
<?php session_start() ?>

<head>
  <title>Ma Page</title>
  <style>
    body {
      background-color: #FFFEAB;
      color: #000000;
      font-family: Arial, sans-serif;
    }

    .container {
      display: flex;
      justify-content: space-between;
      align-items: center;
    }

    header {
      background-color: #36859E;
      color: #fff;
      padding: 20px;
    }

    .title-left {
      flex: 1;
      text-align: left;
    }

    .title-center {
      flex: 1;
      text-align: center;
    }

    .button-logout {
      flex: 1;
      text-align: right;
    }

    .bouton-container {
      display: flex;
      justify-content: flex-start;
    }

    .bouton {
      padding: 10px 20px;
      background-color: #36859E;
      color: #fff;
      border: none;
      border-radius: 30px;
      margin-right: 10px;
      cursor: pointer;
    }

    .bouton:hover {
      background-color: #36859E;
    }

    .dropdown {
      position: relative;
      display: inline-block;
    }

    .dropbtn {
      background-color: #36859E;
      color: white;
      padding: 12px 24px;
      border: none;
      cursor: pointer;
    }

    .dropdown-content {
      display: none;
      position: absolute;
      z-index: 1;
      background-color: #E8ECEC;
      min-width: 160px;
      box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
    }

    .dropdown-content a {
      color: black;
      padding: 5px 5px;
      text-decoration: none;
      display: block;
    }

    .dropdown:hover .dropdown-content {
      display: block;
    }

    .dropdown:first-child {
      margin-right: 20px;
    }
  </style>
</head>

<body>
  <header>
    <img src="logo.png" alt="Ebank" class="logo">
  </header>
  <div class="container">
    <div class="title-left">
      <h5>Utilisateur : <?php echo $_SESSION["nomuser"]; ?></h5>
      <input type="hidden" name="nom" value="<?php echo $_COOKIE["nomuser"]; ?>">
    </div>
    <div class="title-center">
      <h5>Rôle : <?php echo "" . $_SESSION["libelrole"] ?></h5>
      <input type="hidden" name="role" value="<?php echo $_COOKIE["libelrole"]; ?>">
    </div>
    <div class="button-logout">
      <a href="formauthentification.html">
        <button>Déconnexion </button>
      </a>
    </div>
  </div><br><br>
  <div class="dropdown">
    <a href="<?php echo '\page1GCC.html?nom=' . $_COOKIE["nomuser"] . '&role=' . $_COOKIE["libelrole"]; ?>">
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