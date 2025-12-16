<?php

require_once "header.php";

$array = [
    "components/layouts/header.php",
    "components/layouts/breadcrumb.php",

    "components/home/services.php",
    "components/home/products-offer.php",
    "components/home/bestseller.php",
    "components/home/our-products.php",
    "components/home/product-list.php",
    "components/home/product-banner.php",

    "components/layouts/footer.php"
];

foreach ($array as $component) {
    require_once($component);
}

require_once "footer.php";