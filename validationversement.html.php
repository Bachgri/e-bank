<?php
include("./Inc/db/connexion.php");
$idver =  $_GET['idv'];
$sql = 'SELECT * FROM `comptes` JOIN `operation financiere` on `operation financiere`.`idclient` = comptes.idclient 
      JOIN clients on clients.numclt = `operation financiere`.`idclient` where `operation financiere`.`idver` = ' . $idver . '; ';
$rep = mysqli_query($connect, $sql);
$data = $rep->fetch_assoc();

?>

<!DOCTYPE html>
<html>

<head>
  <link rel="stylesheet" href="./public/css/">
</head>

<body>

  <h2 align="center"> Versement:</h2>
  </div>

  <table>
    <tr>
      <td> <label for="agc">Agence :<?php echo $data['agence'] ?></label></td>
      <td></td>
    </tr>
    <TR>
      <td><label for="numc">N° compte :<?php echo $data['ncmpt'] ?></label></td>
      <td></td>
    </TR>
    <tr>
      <td><label for="ic">Intitulé du compte :<?php echo $data['intitulec'] ?></label></td>
      <td></td>
    </tr>

    <tr>
      <td><label for="mv">Montant de versement :<?php echo $data['soldever'] ?></label></td>
      <td></td>
    </tr>
    <tr>
      <td><label for="solde">Solde disponible après l'opération :<?php echo $data['solde'] ?></label></td>
      <td></td>
    </tr>
    <tr>
      <td><label for="nom">Nom de personne ayant effectuée le versement :<?php echo $data['nom'] . " " . $data['perom'] ?></label></td>
      <td></td>
    </tr>
    <tr>
      <td><label for="date">N° CIN de personne ayant effectuée le versement :<?php echo $data['numidentifiant'] ?></label></td>
      <td></td>
    </tr>
  </table>
  <br><br><br>
  <button> <a href="./versement.html.php">Retour</a> </button>&nbsp;<button> <a href="./getops.php">Quiter</a> </button>

</body>

</html>