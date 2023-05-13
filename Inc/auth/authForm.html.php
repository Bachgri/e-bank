<!DOCTYPE html>
<html>
<?php session_start() ?>

<head>
    <title>Page de Connexion</title>
    <link rel="stylesheet" href="./public/css/authForm.css">

</head>

<body>
    <header>
        <img src="maion.png" alt="Ebank" class="logo">
    </header>
    <form action="./controllers/auth/verfier.php" method="post">
        <div class="login-container">
            <h5>Veuillez saisir votre login et mot de passe afin d'ouvrir une session </h5>
            <input type="text" name="matricule" placeholder="Matricule" class="input-field" value="<?php if (isset($_SESSION['matricule'])) echo $_SESSION['matricule'] ?>">
            <input type="password" name="pass" placeholder="Mot de passe" class="input-field" value="<?php if (isset($_SESSION['pass'])) echo $_SESSION['pass'] ?>">
            <button type="submit" class="login-button">Connexion</button>
            <div><?php if (isset($_GET['error'])) echo "Invalid username or password"; ?></div>
        </div>
    </form>
</body>

</html>