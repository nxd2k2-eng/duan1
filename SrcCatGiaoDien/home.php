<?php
$array = [
    "components\home\slider.php",
    "components\home\product-feature.php",
    "components\home\product-by-category.php",
    "components\home\list-post.php",
    "components\home\contact-form.php"
];

foreach ($array as $component) {
    require_once($component);
}