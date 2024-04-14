<?php if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();
?>


<?php
$APPLICATION->IncludeComponent(
    "up:groups.details",
    "",
    Array(
        "CACHE_TIME" => "3600",
        "CACHE_TYPE" => "A",
        "ELEMENT_ID" => $arResult['VARIABLES']['ELEMENT_ID'],
    ),
    $component
);
?>
