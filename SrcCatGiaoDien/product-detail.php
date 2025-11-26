<?php
$array = [
    "components\single-product\info.php",
    "components\single-product\product-related.php",
    "components\home\product-feature.php",
];

foreach ($array as $component) {
    require_once($component);
}