<!DOCTYPE html>
<html>

<head>
  <link rel="stylesheet" href="./public/css/affich.css">
</head>
<?php
session_start();
include('./Inc/db/connexion.php');
$nom = '';
$prenom = '';
$pnom = '';
$pprenom = '';
$typeident = '';
$ddn = '';
$sexe = '';
$sitfam = '';
$ldn = '';
$gsm = '';
$email = '';
$nident = '';


?>


<body>
  <header>
    <img src="logo.png" alt="Ebank" class="logo">
  </header>

  <h4><u>Personne physique / Entrepreneur individuel :</u></h4>
  <?php
  if (
    isset($_POST['insert']) &&
    isset($_POST['nom']) &&
    isset($_POST['Prenom']) &&
    isset($_POST['pprenom']) &&
    isset($_POST['nomprenom']) &&
    isset($_POST['typeident']) &&
    isset($_POST['nident']) &&
    isset($_POST['sexe']) &&
    isset($_POST['Situationf']) &&
    isset($_POST['ddn']) &&
    isset($_POST['ldn']) &&
    isset($_POST['gsm']) &&
    isset($_POST['email'])
  ) {
    $nom = $_POST['nom'];
    $prenom = $_POST['Prenom'];
    $pnom = $_POST['pprenom'];
    $pprenom = $_POST['nomprenom'];
    $typeident = $_POST['typeident'];
    $ddn = $_POST['ddn'];
    $sexe = $_POST['sexe'];
    $sitfam = $_POST['Situationf'];
    $ldn = $_POST['ldn'];
    $gsm = $_POST['gsm'];
    $email = $_POST['email'];
    $nident = $_POST['nident'];
    $sql = "INSERT INTO `clients`(`nom`, `perom`, `numidentifiant`, `prenomper`, `nomprenommer`, `sexe`, `situationf`, `dnaissance`, `lnaissance`, `n°gsm`, `email`) 
            VALUES ('$nom','$prenom','$nident','$pprenom','$pnom','$sexe','$sitfam','$ddn','$ldn','$gsm','$email')";
    echo $sql;
    $rep = mysqli_query($connect, $sql);

    if ($rep) {
      echo "client added succefylly.";
    } else {
      echo "erreur " . $rep;
    }
  }
  ?>
  <form method="post" action="">
    <label for="nom">Nom:</label>
    <input type="text" id="nom" name="nom" value='<?php echo $nom; ?>' required><br>
    <label for="nom">Prenom:</label>
    <input type="text" id="Prenom" name="Prenom" value='<?php echo $prenom; ?>' required><br>
    <label for="nom">Prenom du père:</label>
    <input type="text" id="Prenom du père" name="pprenom" value='<?php echo $pnom; ?>' required><br>
    <label for="nomprenom">Nom et prenom du mère:</label>
    <input type="text" id="nomprenom" name="nomprenom" value='<?php echo $pprenom; ?>' required><br>
    <label for="Type identité">Type identité:</label>
    <select id="Type identité" name="typeident">
      <option value="CIN">CIN</option>
      <option value="Carte de passport">Carte de passport</option>
      <option value="Carte de séjour">Carte de séjour</option>
    </select><br>
    <label for="nident">N° identifiant :</label>
    <input type="text" id="nident" name="nident" value='<?php echo $nident; ?>' required><br>
    <label for="sexe">Sexe:</label>
    <select id="sexe" name="sexe">
      <option value="Masculin">Masculin</option>
      <option value="Féminin">Féminin</option>
    </select>
    <br>
    <label for="Situationf">Situation familiale :</label>
    <select id="Situationf" name="Situationf">
      <option value="célibataire">Célibataire</option>
      <option value="marié">Marié</option>
      <option value="divorcé">Divorcé</option>
    </select><br>
    <label for="date">Date de naissance :</label>
    <input type="Date" id="date" name="ddn" value='<?php echo $ddn; ?>' required><br>
    <label for="lieu">Lieu de naissance :</label>
    <input type="text" id="lieu" name="ldn" value='<?php echo $ldn; ?>' required><br>

    <label for="date">N°GSM :</label>
    <input type="text" id="GSM" name="gsm" value='<?php echo $gsm; ?>' required><br>
    <label for="date">Adresse e-Mail :</label>
    <input type="text" id="email" name="email" value='<?php echo $email; ?>' required><br>

    <input type="submit" value="Valider" name="insert">
  </form>

</body>

</html>