<?php
session_start();
setcookie('userId');
//$_COOKIE['nomuser'] = $nomuser;
setcookie('nomuser');
//$_COOKIE['libelrole'] = $libelrole;
setcookie('libelrole');
session_destroy();
header('location:../../');
