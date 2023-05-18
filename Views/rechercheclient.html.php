<!DOCTYPE html>
<html>
<?php
session_start();
include('../Inc/db/connexion.php');
?>

<head>
  <link rel="stylesheet" href="../public/css/recherche.css">
</head>

<body>
  <header>
    <img src="logo.png" alt="Ebank" class="logo">
  </header>
  <div style="background-color:#E8ECEC  ; padding:0.000001px;">
    <p style="color: black;"><b>Ecran de recherche client</b></p>
  </div>
  <form>
    <table>
      <tr>
        <td><label for="liste">Categorie client</label></td>
        <td>
          <select id="liste" name="Catégorie client">
            <option value="0">_ _ _ selectionnez _ _ _</option>
            <?php
            $sql = 'SELECT * FROM `categorie_client`';
            $rep = mysqli_query($connect, $sql);
            if ($rep) {
              while ($row = $rep->fetch_assoc()) {
            ?>
                <option value="<?php echo $row['codcatcl'] ?>"><?php echo $row['libcatcl'] ?></option>
            <?php }
            } ?>
          </select>
        </td>
        <!--personnes physiques/entrepreneurs individuels-->
        <td><label for="liste">Type client</label></td>
        <td><select id="liste" name="Type client">
            <option value="option1">_ _ _ selectionnez _ _ _</option>
            <?php
            $sql = 'SELECT * FROM `type_client`';
            $rep = mysqli_query($connect, $sql);
            if ($rep) {
              while ($row = $rep->fetch_assoc()) {
            ?>
                <option value="<?php echo $row['codtypcl'] ?>"><?php echo $row['libtypcl'] ?> </option>
            <?php }
            } ?>
          </select></td>
        <!--personnes morales-->
        <td><label for="liste">Forme juridique</label></td>
        <td><select id="liste" name="Forme juridique">
            <option value="option1">_ _ _ selectionnez _ _ _</option>
            <?php
            $sql = 'SELECT * FROM `forme_juridique`';
            $rep = mysqli_query($connect, $sql);
            if ($rep) {
              while ($row = $rep->fetch_assoc()) {
            ?>
                <option value="<?php echo $row['codfj'] ?>"><?php echo $row['libelfj'] ?></option>
            <?php }
            } ?>
          </select></td>
        <!--personnes etat-->
        <td><label for="liste">Forme juridique</label></td>
        <td><select id="liste" name="Forme juridique">
            <option value="option1">_ _ _ selectionnez _ _ _</option>
            <option value="option2">Comptables publics</option>
            <option value="option3">Collectivités locales</option>
            <option value="option4">Etablissement public administratif</option>
            <option value="option5">Cercle et foyer militaire</option>
            <option value="option6">Autres etablissement public</option>
          </select> </td>
      </tr>
      <tr>
        <!--personnes physiques/entrepreneurs individuels-->
        <td><label for="liste">Type identifiant</label></td>
        <td><select id="liste" name="Type identifiant">
            <option value="option1">_ _ _ selectionnez _ _ _</option>

            <option value="option2">CIN</option>
            <option value="option3">Carte de séjour</option>
            <option value="option4">Passeport</option>
          </select></td>
        <!--personnes morales ou etat-->
        <td><label for="liste">Type identifiant </label></td>
        <td><select id="liste" name="Type identifiant">
            <option value="option1">_ _ _ selectionnez _ _ _</option>
            <option value="option2">N°registre commerce</option>
            <option value="option3">N°visa</option>
            <option value="option4">N°identifiant fiscal</option>
          </select></td>
        <td><label for="input1">Numero identifiant</label></td>
        <td><input type="text" id="input1" name="input1"></td>
      </tr>
      <tr>

        <td><label for="liste">Centre RC</label></td>
        <td><select id="liste" name="Centre RC">
            <option value="option1">_ _ _ selectionnez _ _ _</option>
            <option value="option2">rabat </option>
            <option value="option2">casablanca </option>
          </select></td>
        <td><label for="input2">Retaper numéro identifiant</label></td>
        <td><input type="text" id="input2" name="input2"></td>
      </tr>
      <tr>
        <td><label for="input3">Nom/Raison social</label></td>
        <td><input type="text" id="input3" name="input3"></td>
        <td><label for="input4">Date de naissance</label></td>
        <td><input type="text" id="input4" name="input4"></td>
        <br><br>
        <td><label for="input5">N°Client</label></td>
        <td><input type="text" id="input5" name="input5"></td>
        <td><label for="input6">Prénom</label></td>
        <td><input type="text" id="input6" name="input6"> </td>
      </tr>
    </table>

    <br><br>
    <div style="background-color: #E8ECEC ; padding: 0.01px;">
      <p style="color: white;""><input type=" submit" value="" placeholder="Recherche">&nbsp;<input type="submit" value="Annuler">&nbsp;<input type="submit" value="Quiter"></p>
    </div>
    <table border="2">
      <tr>
        <th>N°Client</th>
        <th>Nom/Prenom</th>
        <th>Numero identifiant</th>
      </tr>
    </table>
  </form>
</body>

</html>