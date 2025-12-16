<?php
require_once "header.php";

$array = [
    "components/layouts/header.php",
    "components/auth/login.php",
    "components/layouts/footer.php"
];

foreach ($array as $component) {
    require_once($component);
}

require_once "footer.php";
