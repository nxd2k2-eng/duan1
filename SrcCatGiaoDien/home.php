<?php
$array = [
    // "components\home\carousel.php",
    "components\home\product-offer.php",
    "components\home\our-product.php",
    "components\home\product-banner.php",
    "components\home\product-list.php",
    "components\home\bestseller-products.php",
];

foreach ($array as $component) {
    require_once($component);
}