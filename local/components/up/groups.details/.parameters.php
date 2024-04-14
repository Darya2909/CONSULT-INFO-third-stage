<?php
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED!==true) die();
use Bitrix\Main\Localization\Loc;

$arComponentParameters = array(
    'PARAMETERS' => array(
        'ELEMENT_ID' => array(
            'PARENT' => 'BASE',
            'NAME' => Loc::getMessage('ELEMENT_ID'),
            'TYPE' => 'STRING',
            'DEFAULT' => '={$_REQUEST["ELEMENT_ID"]}',
        ),
    ),
);
