<!DOCTYPE html>
<html>
<?php

session_start();
include('./Inc/db/connexion.php');

$numClt = '';
$fname = '';
$numId = '';
$exist = null;
$u = null;
?>

<head>
    <link rel="stylesheet" href="./public/css/recherche.css">
</head>

<body>
    <header>
        <img src="logo.png" alt="Ebank" class="logo">
    </header>
    <div style="background-color:#E8ECEC  ; padding:0.000001px;">
        <p style="color: black;"><b>Ecran de recherche client</b></p>
    </div>
    <form action="" method="POST">
        <div class="search-table-row">
            <label for="listecatclt">Categorie client</label>
            <select id="listecatclt" name="listecatclt" onchange="changeListeType()">
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
            <label id="listetypecltL" for="listetypeclt" style="display: none;">Type client</label>
            <select id="listetypeclt" name="listetypeclt" style="display: none;">
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
            </select>
            <label id="listefjL" for="listefj" style="display: none;">Forme juridique</label>
            <select id="listefj" name="listefj" style="display: none;">
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
            </select>
            <label id="listefj1L" for="listefj1" style="display: none;">Forme juridique</label>
            <select id="listefj1" name="listefj1" style="display: none;">
                <option value="option1">_ _ _ selectionnez _ _ _</option>
                <option value="option2">Comptables publics</option>
                <option value="option3">Collectivités locales</option>
                <option value="option4">Etablissement public administratif</option>
                <option value="option5">Cercle et foyer militaire</option>
                <option value="option6">Autres etablissement public</option>
            </select>
        </div><br>

        <div class="search-table-row">
            <label for="listetypeidL" style="display: none;">Type identifiant</label>
            <select id="listetypeid" name="listetypeid" style="display: none;">
                <option value="0">_ _ _ selectionnez _ _ _</option>
                <option value="1">CIN</option>
                <option value="2">Carte de séjour</option>
                <option value="3">Passeport</option>
            </select>
            <label id="listetypeid1L" for="listetypeid" style="display: none;">Type identifiant</label>
            <select id="listetypeid1" name="listetypeid" style="display: none;">
                <option value="option1">_ _ _ selectionnez _ _ _</option>
                <option value="option2">N°registre commerce</option>
                <option value="option3">N°visa</option>
                <option value="option4">N°identifiant fiscal</option>
            </select>
            <label id="idValueL" for="idValue">Numero identifiant</label>
            <input id="idValue" type="text" name="numid" value="<?php if (isset($_POST['numid'])) echo $_POST['numid']; ?>">
        </div><br>


        <script>
            function changeListeType() {
                var listeCatClt = document.getElementById("listecatclt");
                var listeTypeClt = document.getElementById("listetypeclt");
                var listeFormeJuridique = document.getElementById("listefj");

                var selectedCatClt = listeCatClt.options[listeCatClt.selectedIndex].value;

                // Réinitialiser les listes 
                // per phys || entrepr indiv
                if (selectedCatClt === "1" || selectedCatClt === "3") {
                    document.getElementById('listetypeclt').style.display = 'inline';
                    document.getElementById('listetypecltL').style.display = 'inline';
                    document.getElementById('listefj').style.display = 'none';
                    document.getElementById('listefjL').style.display = 'none';
                    document.getElementById('listefj1').style.display = 'none';
                    document.getElementById('listefj1L').style.display = 'none';
                    document.getElementById('listetypeid1L').style.display = 'inline';
                    document.getElementById('listetypeid1').style.display = 'inline';

                } else if (selectedCatClt === "2") {
                    // Afficher la liste de forme juridique 1 
                    document.getElementById('listetypeclt').style.display = 'none';
                    document.getElementById('listetypecltL').style.display = 'none';
                    document.getElementById('listefj').style.display = 'inline';
                    document.getElementById('listefjL').style.display = 'inline';
                    document.getElementById('listefj1').style.display = 'none';
                    document.getElementById('listefj1L').style.display = 'none';
                    document.getElementById('listefjL').style.display = 'inline';
                    document.getElementById('listetypeid1L').style.display = 'inline';
                    document.getElementById('listetypeid1').style.display = 'inline';

                } else if (selectedCatClt === "4") {
                    document.getElementById('listetypeclt').style.display = 'none';
                    document.getElementById('listetypecltL').style.display = 'none';
                    document.getElementById('listefj').style.display = 'none';
                    document.getElementById('listefjL').style.display = 'none';
                    document.getElementById('listefj1').style.display = 'inline';
                    document.getElementById('listefj1L').style.display = 'inline';
                    document.getElementById('listetypeid1L').style.display = 'inline';
                    document.getElementById('listetypeid1').style.display = 'inline';
                }
            }
        </script>

        <br><br>
        <div style="background-color: #E8ECEC ; padding: 0.01px;">
            <p style="color: white;"><input type="submit" value="recherche" name="recherche" placeholder="Recherche">
                &nbsp;<input type="submit" value="Annuler">&nbsp;
                <button> <a href="./page1GCC.php">Quiter</a> </button>
            </p>
        </div>
        <table border="2">
            <tr>
                <th>N°Client</th>
                <th>Nom/Prenom</th>
                <th>Numero identifiant</th>
                <th>
            </tr>
            <?php
            if (isset($_POST['recherche'])) {
                $numId = $_POST['numid'];
                $sql = "SELECT * FROM `clients` where 	numidentifiant = '$numId' limit 1";
                $rep = mysqli_query($connect, $sql);
                if ($rep) {
                    if ($row = $rep->fetch_assoc()) {
                        $exist = true;
                        $numId = $row['numidentifiant'];

                        $_SESSION['clientIdfmaj'] = $row['numidentifiant'];
                        // setcookie("userid", $row['numidentifiant'], time() + (24 * 60));
                        $fname = $row['nom'] . " " . $row['perom'];
                        $numClt = $row['numclt']; ?>
                        <tr>
                            <td><?php echo $numClt ?></td>
                            <td><?php echo $fname ?></td>
                            <td><?php echo $numId ?></td>
                            <td><?php if ($numClt != null) echo '<a href="./majclient.html.php">Mise à jour</a>'; ?></td>
                        </tr>
                    <?php
                    } else {
                    ?>
                        <tr>
                            <td colspan="3">
                                <a href="./createClient.php">client n'existe pas, cliquer pour en créé un </a>
                            </td>
                        </tr>

            <?php
                    }
                }
            }
            ?>


        </table>
    </form>
</body>

</html>