<?php

include('./Inc/db/connexion.php');

$cat = '';
$scat = '';
$ic = '';
$device = '';
$date = ''

?>

<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="./public/css/affichcmpt.css">
</head>

<body>
    <header>
        <img src="logo.png" alt="Ebank" class="logo">
    </header>

    <h4><u><?php if (isset($typeclient)) echo $typeclient;   ?></u></h4>

    <form method="post">
        <table>
            <tr>
                <td><label for="idclt">Numero client</label></td>
                <td><input type="text" name="idclt" id="idclt"></td>
            </tr>

            <tr>
                <td><label for="ncmpt">Numero compte</label></td>
                <td><input type="text" name="ncmpt" id="ncmpt"></td>
            </tr>

            <tr>
                <td><label for="Cat_compt">Catégorie compte:</label></td>
                <td>
                    <select id="Cat_compt" name="Cat_compt">
                        <option value="1">Compte chèque</option>
                        <option value="2">Compte CEN</option>
                        <option value="3">Compte d'epargne scolaire</option>
                        <option value="4">Compte inteme</option>
                        <option value=""></option>
                    </select>
                </td>
            </tr>

            <tr>
                <td><label for="sous_Cat_compt">Sous_catégorie_compte:</label></td>
                <td>
                    <select id="sous_Cat_compt" name="sous_Cat_compt">
                        <option value="1">Compte chèque personne physique</option>
                        <option value="2">Compte cheque EMploye BAM</option>
                        <option value="3">Compte DH convertible personne</option>
                    </select>
                </td>
            </tr>

            <tr>
                <td><label for="ic">Intitulé compte:</label></td>
                <td><input type="text" name="ic" value="<?php if ($ic != '') echo $ic ?>" required></td>
            </tr>
            <tr>
                <td><label for="Devise">Devise:</label></td>
                <td><input type="text" name="devise" value="<?php if ($device != '') echo $device ?>" required></td>
            </tr>
            <tr>
                <td><label for="date">Date d'ouverture de compte:</label></td>
                <td><input type="date" name="date" value="<?php if ($date != '') echo $date ?>"></td>
            </tr>
            <tr>
                <td colspan="2">
                    <input type="submit" value="Valider" name="insert">
                    <a type="submit" value="Quitter" name="quiter" href="./recherchecompte.html.php">Quitter</a>
                </td>
            </tr>
        </table>
        </table>
    </form>
    <?php
    if (isset($_POST['insert'])) {

        if (
            isset($_POST['Cat_compt']) && isset($_POST['sous_Cat_compt']) && isset($_POST['ic']) &&
            isset($_POST['devise']) && isset($_POST['date'])
        ) {
            $ncmpt = $_POST['ncmpt'];
            $idclt = $_POST['idclt'];
            $cat = $_POST['Cat_compt'];
            $scat = $_POST['sous_Cat_compt'];
            $ic = $_POST['ic'];
            $devise = $_POST['devise'];
            $date = $_POST['date'];
            $sql = "INSERT INTO `comptes`(`ncmpt`, `devise`, `intitulec`, `solde`, `date`, `idclient`, `idcatcompt`, `idsouscatcompt`) 
            VALUES('$ncmpt','$devise','$ic',0,'$date','$idclt','$cat','$scat' )";
            // echo $sql;
            $rep = mysqli_query($connect, $sql);

            if ($rep) {
                echo "compte crée .";
            } else {
                echo "erreur " . $rep;
            }
        }
    }


    ?>
</body>

</html>