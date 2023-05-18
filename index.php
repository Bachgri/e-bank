<?php
if (isset($_COOKIE['userId'])) {
    include("./Views/menuprincipal.php");
} else {
    include("./Inc/auth/authForm.html.php");
}
