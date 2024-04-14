<?php if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();
use Bitrix\Main\Localization\Loc;
$arComponentParameters = array(
    "PARAMETERS" => array(
        "CACHE_TIME" => array("DEFAULT" => 3600),
        "PAGE_GROUPS_LIST_TITLE" => array(
            "PARENT" => "BASE",
            "NAME" => Loc::getMessage("GROUP_LIST_PAGE_TITLE"),
            "TYPE" => "STRING",
            "DEFAULT" => "",
        ),
        "VARIABLE_ALIASES" => array(
            "ELEMENT_ID" => array("NAME" => Loc::getMessage("ELEMENT_ID_NAME")),
        ),
        "SEF_MODE" => array(
        "LIST" => array(
            "NAME" => Loc::getMessage("SEF_MODE_LIST"),
            "DEFAULT" => "groups/",
        ),
        "DETAIL" => array(
            "NAME" => Loc::getMessage("SEF_MODE_DETAIL"),
            "DEFAULT" => "groups/#ELEMENT_ID#/",
        ),
    ),
    ),
);
?>