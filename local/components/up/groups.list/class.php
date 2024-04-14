<?php
use Bitrix\Main\Loader;
use Bitrix\Main\GroupTable;
use Bitrix\Main\Data\Cache;


class GroupsListComponent extends CBitrixComponent
{
    public function executeComponent(): void
    {
        $cache = Cache::createInstance();
        if ($cache->initCache($this->arParams["CACHE_TIME"], 'groups_component_cache'))
        {
            $this->arResult = $cache->getVars();
            $this->includeComponentTemplate();
        }
        elseif ($cache->startDataCache())
        {
            $groups = $this->fetchGroupsList();
            $this->arResult['GROUPS'] = $groups;

            $cache->endDataCache($this->arResult);
            $this->includeComponentTemplate();
            }
        else
        {
            $cache->abortDataCache();
        }
    }


    public function onPrepareComponentParams($arParams)
    {
        $arParams["CACHE_TIME"] = intval($arParams["CACHE_TIME"]) > 0 ? intval($arParams["CACHE_TIME"]) : 3600;
        return $arParams;
    }

    protected function fetchGroupsList(): array
    {
        $groups = GroupTable::getList([
            'select' => ['ID', 'NAME', 'DESCRIPTION'],
            'order' => ['ID' => 'ASC']
        ])->fetchAll();

        return $groups;
    }
}
?>
