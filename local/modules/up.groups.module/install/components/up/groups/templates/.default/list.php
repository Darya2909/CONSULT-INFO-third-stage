<?php if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();
?>


<?php
$APPLICATION->IncludeComponent(
    "up:groups.list",
    "",
    Array(
        "CACHE_TIME" => "3600",
        "CACHE_TYPE" => "A",
        "PAGE_TITLE" => ""
    ),
    $component
);
?>
