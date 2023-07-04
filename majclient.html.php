<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="./public/css/affich.css">
</head>
<?php
include('./Inc/db/connexion.php');
session_start();
$nident = $_SESSION['clientIdfmaj'];
$nom = '';
$prenom = '';
$pnom = '';
$pprenom = '';
$typeident = '';
$typeclient = '';
$ddn = '';
$sexe = '';
$sitfam = '';
$ldn = '';
$gsm = '';
$email = '';
$sql = "SELECT * FROM `clients` 
join `categorie_client` on idcc = codcatcl 
join `type_client` on idtype = codtypcl
join `situation_juridique` on codsitju = idsj
where numidentifiant = '$nident' limit 1";
$rep = mysqli_query($connect, $sql);
if ($rep) {
    if ($row = $rep->fetch_assoc()) {
        $nom = $row['nom'];
        $prenom = $row['perom'];
        $pnom = $row['nomprenommer'];
        $pprenom = $row['prenomper'];
        $typeident = $row['nom'];
        $ddn = $row['dnaissance'];
        $sexe = $row['sexe'];
        $sitfam = $row['nom'];
        $ldn = $row['lnaissance'];
        $gsm = $row['ngsm'];
        $email = $row['email'];
        $typeclient = $row['libcatcl'];
    }
}

?>


<body>
    <header>
        <img src="logo.png" alt="Ebank" class="logo">
    </header>

    <h4><u> <?php echo $typeclient; ?> : </u></h4>
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
        $sql = "UPDATE `clients` SET 
                            `perom` = '$prenom', 
                            `prenomper` = '$pprenom',
                            `nomprenommer` = '$pnom',
                            `sexe` = '$sexe',
                            `situationf` = '$sitfam',
                            `dnaissance` = '$ddn',
                            `lnaissance` = '$ldn',
                            `ngsm` = '$gsm',
                            `email` = '$email'
                        WHERE `numidentifiant` = '$nident'";
        // echo $sql;
        // echo $sql;
        $rep = mysqli_query($connect, $sql);
        if ($rep) {
            echo "client added succefylly.";
        }
    }
    ?>
    <form method="post" action="" style="width: 100%; text-align: center;">
        <table style="width: 60%;margin-left: 20%;text-align: left">
            <tr>
                <td><label for="nom">Nom:</label></td>
                <td><input type="text" id="nom" name="nom" value="<?php echo $nom; ?>" required></td>
            </tr>
            <tr>
                <td><label for="Prenom">Prenom:</label></td>
                <td><input type="text" id="Prenom" name="Prenom" value="<?php echo $prenom; ?>" required></td>
            </tr>
            <tr>
                <td><label for="Prenom_du_père">Prenom du père:</label></td>
                <td><input type="text" id="Prenom_du_père" name="pprenom" value="<?php echo $pnom; ?>" required></td>
            </tr>
            <tr>
                <td><label for="nomprenom">Nom et prénom du mère:</label></td>
                <td><input type="text" id="nomprenom" name="nomprenom" value="<?php echo $pprenom; ?>" required></td>
            </tr>
            <tr>
                <td><label for="Type_identité">Type identité:</label></td>
                <td>
                    <select id="Type_identité" name="typeident">
                        <option value="<?php echo $typeident ?>"><?php echo $typeident ?></option>
                        <option value="CIN">CIN</option>
                        <option value="Carte de passport">Carte de passport</option>
                        <option value="Carte de séjour">Carte de séjour</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td><label for="nident">N° identifiant:</label></td>
                <td><input type="text" id="nident" name="nident" value="<?php echo $nident; ?>" required></td>
            </tr>
            <tr>
                <td><label for="sexe">Sexe:</label></td>
                <td>
                    <select id="sexe" name="sexe">
                        <option value="<?php echo $sexe ?>"><?php echo $sexe ?></option>
                        <option value="Masculin">Masculin</option>
                        <option value="Féminin">Féminin</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td><label for="Situationf">Situation familiale :</label></td>
                <td>
                    <select id="Situationf" name="Situationf">
                        <option value="<?php echo $sitfam ?>"><?php echo $sitfam ?></option>
                        <option value="célibataire">Célibataire</option>
                        <option value="marié">Marié</option>
                        <option value="divorcé">Divorcé</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td><label for="date">Date de naissance :</label></td>
                <td><input type="Date" id="date" name="ddn" value="<?php echo $ddn; ?>" required></td>
            </tr>
            <tr>
                <td><label for="lieu">Lieu de naissance :</label></td>
                <td><input type="text" id="lieu" name="ldn" value="<?php echo $ldn; ?>" required></td>
            </tr>
            <tr>
                <td><label for="GSM">N°GSM :</label></td>
                <td><input type="text" id="GSM" name="gsm" value="<?php echo $gsm; ?>" required></td>
            </tr>
            <tr>
                <td><label for="email">Adresse e-Mail :</label></td>
                <td><input type="text" id="email" name="email" value="<?php echo $email; ?>" required></td>
            </tr>
            <tr>
                <td>
                    <input type="submit" value="Valider" name="insert">

                </td>
                <td>
                    <a type="submit" value="Quiter" name="quiter" href="./recherchepourmaj.html.php">Quiter</a>

                </td>
            </tr>
        </table>
    </form>
</body>

</html>