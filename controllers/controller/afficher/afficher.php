<?php
// session_start();
if (isset($_SESSION['clientId'])) {
    include('../../../Views/affichecltcmpt.html.php');
} else {
    // include('../../../Views/rechercheclient.html.php');
    header("location:../");
}
