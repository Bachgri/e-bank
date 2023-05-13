<?php
require '../../Inc/db/connexion.php';
$matricule = htmlspecialchars($_POST['matricule'], ENT_QUOTES, 'UTF-8');
$pass = md5(htmlspecialchars($_POST['pass'], ENT_QUOTES, 'UTF-8'));
$query = "select * 
          from utilisateurs util 
            inner join roles rol on util.codrole = rol.codrole 
          where matricule='$matricule'
          and password='$pass'";
setcookie('matricule', $_POST['matricule'], time() + 1 * 60);
setcookie('pass', $_POST['pass'], time() + 1 * 60);

$result = mysqli_query($connect, $query);
//echo $query;
$data = mysqli_fetch_array($result);
echo ($data);
if ($data) {

  session_start();
  $nomuser = $data[2];
  $libelrole = $data[8];
  //$_COOKIE['userId'] = $data[1];
  setcookie('userId', $data[1], time() + 20 * 60);
  //$_COOKIE['nomuser'] = $nomuser;
  setcookie('nomuser', $nomuser, time() + 20 * 60);
  //$_COOKIE['libelrole'] = $libelrole;
  setcookie('libelrole', $libelrole, time() + 20 * 60);
  $_SESSION['userId'] = $data[1];
  $_SESSION['nomuser'] = $data[2];
  $_SESSION['libelrole'] = $data[8];
  //var_dump($_COOKIE['libelrole']);
  header('location:../../Views/menuprincipal.php');
} else {
  session_start();
  //$_COOKIE['error'] = "Invalid username or password";
  setcookie('error', 'Invalid username or password', time() + 1 * 60 * 10);
  var_dump($_COOKIE['error']);
  header('location:../../?error');
}
