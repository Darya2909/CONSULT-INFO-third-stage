<?php
/*
 * Файл local/components/tokmakov/groups.details/class.php
 */
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED!==true) die();



use Bitrix\Main\Loader;
use Bitrix\Main\GroupTable;
use Bitrix\Main\Data\Cache;


class GroupsDetailComponent extends CBitrixComponent
{
    public function executeComponent(): void
    {
            $this->fetchGroupsDetails();
            $this->includeComponentTemplate();
    }

    protected function fetchGroupsDetails(): void
    {
        $elementId = $this->arParams['ELEMENT_ID']; // Получаем ELEMENT_ID из параметров компонента

        // Получаем данные конкретного элемента по его ID
        $element = GroupTable::getList(array(
            'filter' => array('=ID' => $elementId), // Фильтруем по ID элемента
            'select' => array('ID', 'NAME', 'DESCRIPTION'),
        ))->fetch();

        // Проверяем, найден ли элемент
        if ($element) {
            $this->arResult['ELEMENT'] = $element; // Сохраняем данные элемента в переменную результатов
        } else {
            // Если элемент не найден, можно вывести сообщение об ошибке или сделать что-то другое
            $this->arResult['ERROR'] = 'Элемент не найден';
        }
    }


}
