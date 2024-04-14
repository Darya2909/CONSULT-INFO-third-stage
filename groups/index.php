<?php
require($_SERVER['DOCUMENT_ROOT']."/bitrix/header.php");
?>

<?php
$APPLICATION->IncludeComponent(
    "up:groups",
    "",
    Array(
        "CACHE_TIME" => "3600",
        "CACHE_TYPE" => "A",
        "PAGER_TITLE" => "Элементы",
        "SEF_FOLDER" => "/groups/",
        "SEF_MODE" => "Y",
        "SEF_URL_TEMPLATES" => array(
            "DETAIL" => "#ELEMENT_ID#/",
            "LIST" => "index",
        ),
    )
);
?>

<?php require($_SERVER['DOCUMENT_ROOT']."/bitrix/footer.php");
?>