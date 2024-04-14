<?php
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
use Bitrix\Main\Localization\Loc;

$arComponentDescription = array(
    "NAME" => Loc::getMessage("COMPLEX_GROUP_COMPONENT_NAME"),
    "DESCRIPTION" => Loc::getMessage("COMPLEX_GROUP_COMPONENT_DESCRIPTION"),
    "COMPLEX" => "Y",
    "CACHE_PATH" => "Y",
    "PATH" => array(
        "ID" => "namespace",
        "NAME" => Loc::getMessage("NAMESPACE_COMPONENTS"),
    ),
);
?>
