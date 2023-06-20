<!DOCTYPE html>
<html>

<head>
  <title>Tableau HTML avec cadre</title>
  <style>
    table {
      border-collapse: collapse;
      border: 2px solid black;
      margin: 0 auto;
      /* Pour centrer le tableau */
      width: 70%;
      /* Taille du tableau */
    }

    th,
    td {
      border: 1px solid black;
      padding: 8px;
    }

    .header {
      text-align: left;
      font-weight: bold;
    }
  </style>
</head>

<body>
  <br><br>
  <?php
  session_start();
  include('./Inc/db/connexion.php');
  $ncmpt = $_SESSION['numcmpt'];
  $idclt = $_SESSION['clientId1'];
  $sql =
    "SELECT 
      * 
    from 
        clients 
        join categorie_client on categorie_client.codcatcl = clients.numclt
        join comptes on clients.numclt = comptes.idclient
        join categori_compte on categori_compte.idccmpt = comptes.ncmpt
        join sous_cat_comptes on sous_cat_comptes.idsccmpt=comptes.ncmpt
    WHERE
      comptes.ncmpt = $ncmpt
    and clients.numclt = $idclt
    ";


  $rep = mysqli_query($connect, $sql);
  // echo $rep;
  if ($rep) {
    // die($rep);
    if ($row = $rep->fetch_assoc()) {
  ?>
      <div class="header">&nbsp;&nbsp;&nbsp;Formulaire d'ouverture de compte </div><br><br>
      <table>

        <tr>
          <td><b> N°Client :
              <?php echo $row['numclt']; ?>

            </b></td>
        </tr>
        <tr>
          <td><b>N°Compte :
              <?php echo $row['ncmpt']; ?>

            </b></td>
        </tr>
        <tr>
          <td><b><u>Information sur le client :

              </u></b><br>Catégorie client :
            <?php echo $row['libcatcl']; ?>
            <br>Nom:
            <?php echo $row['nom']; ?>
            <br>Prenom:
            <?php echo $row['perom']; ?>
            <br>Prenom du père:
            <?php echo $row['prenomper']; ?>
            <br>Nom et prénom du mère:
            <?php echo $row['nomprenommer']; ?>
            <br>Type identité:
            <?php echo $row['idtype']; ?>
            <br>Sexe:
            <?php echo $row['sexe']; ?>
            <br>Situation familiale:
            <?php echo $row['situationf']; ?>
            <br>Lieu de naissance:
            <?php echo $row['lnaissance']; ?>
            <br>N°GSM:
            <?php echo $row['ngsm']; ?>
            <br>Adresse e-Mail:
            <?php echo $row['email']; ?>
            <br>
          </td>

        </tr>
        <tr>
          <td><b><u>Information sur le compte :</u></b><br>
            <h4 align="right">Date d'ouverture de compte:
              <?php echo $row['date']; ?>

            </h4>Catégorie compte:
            <?php echo $row['libelccmpt']; ?>
            <br>Sous_categorie_compte:
            <?php echo $row['libelsccmpt']; ?>
            <br>Intitulé compte:
            <?php echo $row['intitulec']; ?>
            <br>Devise:
            <?php echo $row['devise']; ?>
            <br>
          </td>
        </tr>
      </table>
  <?php }
  } ?>
</body>

</html>