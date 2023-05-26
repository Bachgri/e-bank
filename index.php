<?php
if (isset($_COOKIE['userId'])) {
    include("./menuprincipal.php");
} else {
    include("./authForm.html.php");
}
