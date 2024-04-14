<?php
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) {
    die();
}

use Bitrix\Main\Loader;



class GroupsComplexComponent extends CBitrixComponent
{
    protected array $arComponentVariables = [
        'ELEMENT_ID'
    ];
    public function executeComponent(): void
    {
        if ($this->arParams["SEF_MODE"] === "Y") {
            $componentPage = $this->sefMode();
        }
        if ($this->arParams["SEF_MODE"] != "Y") {
            $componentPage = $this->noSefMode();
        }
        $this->IncludeComponentTemplate($componentPage);
    }


    public function onPrepareComponentParams($arParams)
    {
        $arParams["CACHE_TIME"] = intval($arParams["CACHE_TIME"]) > 0 ? intval($arParams["CACHE_TIME"]) : 3600;
        return $arParams;
    }

    protected function sefMode(): string
    {
        $arDefaultVariableAliases404 = [];
        $arVariables = [];

        $arUrlTemplates = $this->arParams["SEF_URL_TEMPLATES"];

        $arVariableAliases = CComponentEngine::MakeComponentVariableAliases(
            $arDefaultVariableAliases404,
            $this->arParams['VARIABLE_ALIASES']
        );
        $componentPage = CComponentEngine::ParseComponentPath(
            $this->arParams['SEF_FOLDER'],
            $arUrlTemplates,
            $arVariables
        );
        if (strlen($componentPage) <= 0) {
            $componentPage = 'list';
        }
        else
        {
            $componentPage = 'details';
        }
        CComponentEngine::InitComponentVariables(
            $componentPage,
            $this->arComponentVariables,
            $arVariableAliases,
            $arVariables);
        $SEF_FOLDER = $this->arParams['SEF_FOLDER'];
        $this->arResult = [
            'FOLDER'        => $SEF_FOLDER,
            'URL_TEMPLATES' => $arUrlTemplates,
            'VARIABLES'     => $arVariables,
            'ALIASES'       => $arVariableAliases,
            'SEF_MODE'      => 'Y'
        ];
        return $componentPage;
    }
     protected function noSefMode(): string
     {
         $arDefaultVariableAliases    = [];

         $arVariables = [];
         $arVariableAliases = CComponentEngine::MakeComponentVariableAliases(
             $arDefaultVariableAliases,
             $this->arParams['VARIABLE_ALIASES']
         );
         CComponentEngine::InitComponentVariables(
             false,
             $this->arComponentVariables,
             $arVariableAliases,
             $arVariables
         );

         if (intval($arVariables['ELEMENT_ID']) > 0) {
             $componentPage = 'details';
         } else {
             $componentPage = 'list';
         }
         $this->arResult = [
             'VARIABLES'     => $arVariables,
             'ALIASES'       => $arVariableAliases,
             'SEF_MODE'      => 'N'
         ];
         return $componentPage;
     }
}
?>
