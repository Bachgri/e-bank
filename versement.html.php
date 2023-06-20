<!DOCTYPE html>
<html>
<?php
include('./Inc/db/connexion.php');
?>

<head>
  <link rel="stylesheet" href="../public/css/recherchec.css">
</head>

<body>
  <header>
    <img src="logo.png" alt="Ebank" class="logo">
  </header>
  <div style="background-color:#E8ECEC; padding:0.000001px;">
    <p style="color: black;"><b>Compte</b></p>
  </div>
  <?php
  $ncmpt = '';
  $inti = '';
  $idclt = '';
  $soldedispo = 0;
  if (isset($_POST['consulter']) && isset($_POST['ic'])) {
    $ncmpt = $_POST['ic'];
    $sql = "SELECT * FROM `comptes` WHERE ncmpt = '$ncmpt'";
    $rep = mysqli_query($connect, $sql);
    if ($rep) {
      if ($row = $rep->fetch_assoc()) {
        $inti = $row['intitulec'];
        $soldedispo = $row['solde'];
        $idclt = $row['idclient'];
        echo $idclt;
      }
    }
  }
  if (isset($_POST['valider'])) {
    $ncmpt = $_POST['ic'];
    $ncltdis = $_POST['cindist'];
    $solde = $_POST['solde'];
    $sql = "SELECT numclt FROM clients WHERE numidentifiant = '$ncltdis' limit 1";
    //echo $sql;
    $rep = mysqli_query($connect, $sql);
    if ($rep) {
      $row = $rep->fetch_assoc();
      $iddist = $row['numclt'];
      $ncmpt = $_POST['ic'];
      $ncltdis = $_POST['cindist'];
      $solde = $_POST['solde'];
      $ncmpt = $_POST['ic'];
      $sql = "SELECT * FROM `comptes` WHERE ncmpt = '$ncmpt'";
      $rep = mysqli_query($connect, $sql);
      if ($rep) {
        if ($row = $rep->fetch_assoc()) {
          $idclt = $row['idclient'];
          //echo $idclt;
        }
      }
      $sql = "INSERT INTO `operation financiere` (`idclient`, `idrem`, `soldever`, `datever`) 
              VALUES ($idclt, $iddist, $solde, CURRENT_TIMESTAMP)";
      //echo $sql;
      $rep = mysqli_query($connect, $sql);
      if ($rep) {
        $sql = "UPDATE comptes set solde = solde + $solde where idclient = $iddist";
        //echo $sql;
        $rep = mysqli_query($connect, $sql);
        $sql = "UPDATE comptes set solde = solde - $solde where idclient = $idclt";
        //echo $sql;
        $rep = mysqli_query($connect, $sql);

        echo "Success! Perform any additional actions after the operation is successfully inserted.";
      } else {
        echo "Error occurred. Handle the error appropriately.";
      }
    }
  }
  ?>
  <form method="POST">
    <table>
      <tr>
        <td><label for="ic">Numéro du compte :</label></td>
        <td><input type="text" name="ic" value="<?php if ($ncmpt != '') echo $ncmpt; ?>"></td>
      </tr>
      <tr>
        <td><label for="Intitulec">Intitulé du compte :</label></td>
        <td><input type="text" name="Intitulec" value="<?php if ($inti != '') echo $inti; ?>"></td>
      </tr>
      <tr>
        <td><label for="solde">Solde disponible :</label></td>
        <td><input type="text" name="solde" value="<?php if ($soldedispo != '') echo $soldedispo; ?>"></td>
      </tr>
      <tr>
        <td colspan="2" style="color: white;">
          <input type="submit" value="Consulter" name="consulter">
        </td>
      </tr>
    </table>

    <div style="background-color:#E8ECEC; padding:0.000001px;">
      <p style="color: black;"><b>Identification remettant :</b></p>
    </div>
    <table>
      <tr>
        <td><label for="nom">Nom et prenom :</label></td>
        <td><input type="text" name="nom"></td>
      </tr>
      <tr>
        <td><label for="cin">N° CIN :</label></td>
        <td><input type="text" name="cindist"></td>
      </tr>
    </table>

    <div style="background-color:#E8ECEC; padding:0.000001px;">
      <p style="color: black;"><b>Détail opération :</b></p>
    </div>
    <table>
      <tr>
        <td><label for="montant">Montant versement :</label></td>
        <td><input type="text" name="montant"></td>
      </tr>
      <tr>
        <td><label for="agc">Agence domiciliation :</label></td>
        <td><input type="text" name="agc"></td>
      </tr>
    </table>
    <input type="submit" value="Valider" name="valider">
    <input type="submit" value="Quitter">
    <input type="text" name="idclt" value="<?php if ($idclt != '') echo $idclt ?>" id="">
  </form>

</body>

</html>