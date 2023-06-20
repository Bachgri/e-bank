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
    <p><b>N°Compte : <b></p>
  </div>
  
      <table>
        <tr>
          <td> <label for="catc">Catégorie compte:</label></td>
          <td></td>
        </tr>
        <TR>
          <td><label for="scatc">Sous_catégorie_compte :</label></td>
          <td></td>
        </TR>
        <tr>
          <td><label for="ic">Intitulé compte: :</label></td>
          <td></td>
        </tr>
      
        <tr>
          <td><label for="devise">Devise: :</label></td>
          <td></td>
        </tr>
        <tr>
          <td><label for="date">Date d'ouverture de compte: :</label></td>
          <td></td>
        </tr>
       </table>
       <div style="background-color: #E8ECEC ; padding: 0.01px;">
        <p style="color: white;">
          &nbsp;<button> <a href="./rechercheclient.html.php">Quiter</a> </button>
        </p>
      </div>
     </body>
</html>