<!DOCTYPE html>
<html>
<?php session_start();
include('./Inc/db/connexion.php') ?>

<head>
  <link rel="stylesheet" href="./public/css/affich.css">
</head>

<body>
  <header>
    <img src="logo.png" alt="Ebank" class="logo">
  </header>
  <div style="background-color: #E8ECEC ; padding: 0.01px;">
    <p>N°Client : <?php echo $_SESSION['clientId']  ?> </p>
  </div>
  <?php
  $numId = $_SESSION['clientId'];
  $idsj = $_GET['sj'];
  $sql = "SELECT * FROM `clients` 
            join `categorie_client` on idcc = codcatcl 
            join `type_client` on idtype = codtypcl
            join `situation_juridique` on codsitju = idsj
          where numidentifiant = '$numId' and idsj = $idsj";
  // echo $sql;
  // exit(0);
  $rep = mysqli_query($connect, $sql);
  if ($rep) {
    if ($row = $rep->fetch_assoc()) {
  ?>
      <table>
        <tr>
          <td> <label for="catclt">Catégorie client :</label></td>
          <td><?php echo $row['libcatcl'] ?></td>
        </tr>
        <TR>
          <td><label for="typeclt">Type client :</label></td>
          <td><?php echo $row['libtypcl'] ?></td>
        </TR>
        <tr>
          <td><label for="agec">Situation juridique :</label></td>
          <td><?php echo $row['libesitju'] ?></td>
        </tr>
      </table>
      <h4><u>Personne physique / Entrepreneur individuel :</u></h4>
      <table>
        <tr>
          <td><label for="nom">Nom:</label></td>
          <td><?php echo $row['nom'] ?></td>
        </tr>
        <tr>
          <td><label for="Prenom">Prenom:</label></td>
          <td><?php echo $row['perom'] ?></td>
        </tr>
        <tr>
          <td><label for="Prenom_du_pere">Prenom du père:</label></td>
          <td><?php echo $row['prenomper'] ?></td>
        </tr>
        <tr>
          <td><label for="nomprenom">Nom et prénom du mère:</label></td>
          <td><?php echo $row['nomprenommer'] ?></td>
        </tr>
        <tr>
          <td><label for="Type_identite">Type identité:</label></td>
          <td><?php echo $row['situationf'] ?></td>
        </tr>
        <tr>
          <td><label for="sexe">Sexe:</label></td>
          <td><?php echo $row['sexe'] ?></td>
        </tr>
        <tr>
          <td><label for="Situationf">Situation familiale :</label></td>
          <td><?php echo $row['situationf'] ?></td>
        </tr>
        <tr>
          <td><label for="date">Date de naissance :</label></td>
          <td><?php echo $row['dnaissance'] ?></td>
        </tr>
        <tr>
          <td><label for="lieu">Lieu de naissance :</label></td>
          <td><?php echo $row['lnaissance'] ?> </td>
        </tr>
        <tr>
          <td><label for="GSM">N°GSM :</label></td>
          <td><?php echo $row['ngsm'] ?></td>
        </tr>
        <tr>
          <td><label for="email">Adresse e-Mail :</label></td>
          <td><?php echo $row['email'] ?></td>
        </tr>
      </table>
      <div style="background-color: #E8ECEC ; padding: 0.01px;">
        <p style="color: white;">
          &nbsp;<button> <a href="./rechercheclient.html.php">Quiter</a> </button>
        </p>
      </div>
  <?php
    }
  }
  ?>
</body>

</html>