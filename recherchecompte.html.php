<!DOCTYPE html>
<html>
<?php
session_start();
include('./Inc/db/connexion.php');
$cc = '';
$ncmpt = 'n';
?>

<head>
  <link rel="stylesheet" href="./public/css/recherchec.css">
</head>

<body>
  <header>
    <img src=" logo.png" alt="Ebank" class="logo">
  </header>
  <div style="background-color:#E8ECEC  ; padding:0.000001px;">
    <p style="color: black;"><b>Ecran de recherche compte</b></p>
  </div>
  <form method="post">
    <table>
      <tr>
        <td><label for="listecatc">Categorie compte :</label></td>
        <td>
          <select id="listecatc" name="Categorie_compte">
            <option value="0">_ _ _ selectionnez _ _ _</option>
            <?php
            $sql = 'SELECT * FROM `categori_compte`';
            $rep = mysqli_query($connect, $sql);
            if ($rep) {
              while ($row = $rep->fetch_assoc()) {
            ?>
                <option value="<?php echo $row['idccmpt'] ?>"><?php echo $row['libelccmpt'] ?> </option>
            <?php }
            } ?>
          </select>
        </td>

        <td><label for="listescc">Sous_categorie_compte :</label></td>
        <td><select id="listescc" name="Sous_categorie_compte">
            <option value="option1">_ _ _ selectionnez _ _ _</option>
            <?php
            $sql = 'SELECT * FROM `sous_cat_comptes`';
            $rep = mysqli_query($connect, $sql);
            if ($rep) {
              while ($row = $rep->fetch_assoc()) {
            ?>
                <option value="<?php echo $row['idsccmpt'] ?>"><?php echo $row['libelsccmpt'] ?> </option>
            <?php }
            } ?>
          </select></td>
      </tr>
      <tr>

        <td><label for="ic">Numéro du compte :</label></td>
        <td><input type="text" name="ic" value="<?php if ($ncmpt != 'n')  echo $ncmpt ?>"></td>

      </tr>
    </table>
    <br><br>
    <div style="background-color: #E8ECEC ; padding: 0.01px;">
      <p style="color: white;"><input type="submit" value="recherche" name="recherche">&nbsp;
        <input type="submit" value="Annuler">&nbsp;
        <input type="submit" value="Quiter">
      </p>
    </div>

    <table border="2">
      <tr>
        <th>N°Compte</th>
        <th>Intitulé compte</th>
        <th>Categorie compte</th>
        <th>Sous_categorie_compte</th>
      </tr>
      <?php

      if (isset($_POST['recherche'])) {
        if (isset($_POST['Categorie_compte']) && isset($_POST['Sous_categorie_compte']) && isset($_POST['ic'])) {
          $scc = $_POST['Sous_categorie_compte'];
          $cc  = $_POST['Categorie_compte'];
          $ncmpt =  $_POST['ic'];
          $sql =
            "SELECT
              *         
            FROM comptes 
              JOIN categori_compte on comptes.ncmpt = categori_compte.idccmpt
              JOIN sous_cat_comptes on sous_cat_comptes.idsccmpt = comptes.ncmpt
            where 
              comptes.ncmpt = $ncmpt 
              and sous_cat_comptes.idsccmpt = $scc 
              and categori_compte.idccmpt = $cc
            ";


          $rep = mysqli_query($connect, $sql);
          // echo $rep;
          if ($rep) {
            // die($rep);
            if ($row = $rep->fetch_assoc()) {
              // echo "ok";
              $exist = true;
              // echo $row;
              $_SESSION['clientId1'] = $row['idclient'];
              $_SESSION['numcmpt'] = $row['ncmpt'];
              // setcookie("userid", $row['numidentifiant'], time() + (24 * 60));
              $ncmpt = $row['ncmpt'];
              $ic = $row['intitulec'];
              $catc = $row['libelccmpt'];
              $scatc = $row['libelsccmpt'];
      ?>
              <tr>
                <td><?php echo $ncmpt ?></td>
                <td><?php echo $ic ?></td>
                <td><?php echo $catc ?></td>
                <td><?php echo $scatc ?></td>
                <td><?php if ($ncmpt != null) echo '<a href="./createcompte.html.php">Afficher</a>'; ?></td>
              </tr>
    </table>
    <p style="color: white" ;><input type="submit" name="voirecap" value="Voir Récap"></p>
  <?php } else { ?>
    </table>
    <a href="./createcompte.html.php">crée un compte </a>
<?php }
          }
        }
      } ?>
<?php
if (isset($_POST['voirecap'])) {
  header('location:./formouverturecompte.html.php');
}
?>
  </form>
</body>

</html>