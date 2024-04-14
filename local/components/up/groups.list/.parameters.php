<?php if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();
use Bitrix\Main\Localization\Loc;
$arComponentParameters = array(
    "GROUPS" => array(),
    "PARAMETERS" => array(
        "CACHE_TIME" => array("DEFAULT" => 3600),
        "PAGE_TITLE" => array(
            "PARENT" => "BASE",
            "NAME" => Loc::getMessage("PAGE_TITLE"),
            "TYPE" => "STRING",
            "DEFAULT" => "",
        ),
    ),
);
?>