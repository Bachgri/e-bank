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
  <table>
    <tr>
      <td> <label for="catclt">Catégorie client :</label></td>
      <td><select id="catclt" name="catclt">
          <option value="option1">_ _ _ selectionnez _ _ _</option>
          <option value="option2">personnes phisiques</option>
          <option value="option3">personnes morales</option>
          <option value="option4">entreneurs individuel</option>
          <option value="option5">etat</option>
        </select> </td>


      <td> <label for="agec">Agent économique :</label></td>
      <td><select id="agec" name="agec">
          <option value="option1">_ _ _ selectionnez _ _ _</option>
          <option value="option2">bank almaghrib</option>
          <option value="option3">tresor public</option>
          <option value="option4">banques centrales</option>
          <option value="option5">services des banques postaux</option>
        </select> </td>
      <td><label for="typeclt">Type client :</label></td>
      <td> <select id="typeclt" name="typeclt">
          <option value="option1">_ _ _ selectionnez _ _ _</option>
          <option value="option2">RM Resident marocain</option>
          <option value="option3">RE Resident etrangers</option>
        </select> </td>
      <td><label for="agec">situation juridique :</label></td>
      <td><select id="agec" name="agec">
          <option value="option1">_ _ _ selectionnez _ _ _</option>
          <option value="option2">majeur</option>
          <option value="option3">mineur</option>
        </select></td>
    </tr>
  </table>
  <h4><u>Personne physique / Entrepreneur individuel :</u></h4>

  <form>
    <?php
    $numId = $_SESSION['clientId'];
    $sql = "SELECT * FROM `clients` where 	numidentifiant = '$numId' limit 1";
    $rep = mysqli_query($connect, $sql);
    if ($rep) {
      if ($row = $rep->fetch_assoc()) {
    ?>
        <label for="nom">Nom:</label>
        <input type="text" id="nom" name="nom" required value="<?php echo $row['nom'] ?>"><br>
        <label for="nom">Prenom:</label>
        <input type="text" id="Prenom" name="Prenom" value="<?php echo $row['perom'] ?>" required><br>
        <label for="nom">Prenom du père:</label>
        <input type="text" id="Prenom du père" name="Prenom du père" required><br>
        <label for="nomprenom">Nom et prenom du mère:</label>
        <input type="text" id="nomprenom" name="nomprenom" required><br>
        <label for="Type identité">Type identité:</label>
        <select id="Type identité" name="Type identité">
          <option value="CIN">CIN</option>
          <option value="Carte de passport">Carte de passport</option>
          <option value="Carte de séjour">Carte de séjour</option>
        </select><br>
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
        <input type="Date" id="date" name="date" required><br>
        <label for="date">Lieu de naissance :</label>
        <input type="text" id="lieu" name="lieu" required><br>

        <label for="date">N°GSM :</label>
        <input type="text" id="GSM" name="GSM" required><br>
        <label for="date">Adresse e-Mail :</label>
        <input type="text" id="email" name="email" required><br>
    <?php }
    }  ?>
    <input type="submit" value="Valider">
  </form>

</body>

</html>