<?php
if (isset($_COOKIE['userId'])) {
} else {
    include("./Inc/auth/authForm.html.php");
}
