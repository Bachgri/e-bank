<?php
define('HOST','localhost');
define('USER','root');
define('PASS','');
define('DB','ebank');

$connect = mysqli_connect(HOST,USER,PASS,DB);
if($connect==false)
	{echo "pb de connexion";exit(0);}
?>