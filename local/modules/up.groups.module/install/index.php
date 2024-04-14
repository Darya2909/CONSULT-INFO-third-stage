<?php

use Bitrix\Main\Localization\Loc;
use Bitrix\Main\ModuleManager;

Loc::loadMessages(__FILE__);

class up_groups_module extends CModule
{
	public $MODULE_ID = 'up.groups.module';
	public $MODULE_VERSION;
	public $MODULE_VERSION_DATE;
	public $MODULE_NAME;
	public $MODULE_DESCRIPTION;

	public function __construct()
	{
		$arModuleVersion = [];
		include(__DIR__ . '/version.php');

		if (is_array($arModuleVersion) && $arModuleVersion['VERSION'] && $arModuleVersion['VERSION_DATE'])
		{
			$this->MODULE_VERSION = $arModuleVersion['VERSION'];
			$this->MODULE_VERSION_DATE = $arModuleVersion['VERSION_DATE'];
		}

		$this->MODULE_NAME = Loc::getMessage('UP_GROUPS_MODULE_NAME');
		$this->MODULE_DESCRIPTION = Loc::getMessage('UP_GROUPS_MODULE_DESCRIPTION');
	}

    public function installFiles(): void
    {
        $moduleDir = $this->getModuleDir();

        if ($moduleDir) {
            $componentsDir = $_SERVER['DOCUMENT_ROOT'] . $moduleDir . '/install/components/';

            CopyDirFiles($componentsDir, $_SERVER['DOCUMENT_ROOT'] . '/local/components/', true, true);
        }
    }

    public function uninstallFiles()
    {
        DeleteDirFilesEx("/local/components/up");
        return true;
    }

    private function getModuleDir(): string
    {
        if (file_exists($_SERVER['DOCUMENT_ROOT'] . '/local/modules/' . $this->MODULE_ID)) {
            return '/local/modules/' . $this->MODULE_ID;
        } elseif (file_exists($_SERVER['DOCUMENT_ROOT'] . '/bitrix/modules/' . $this->MODULE_ID)) {
            return '/bitrix/modules/' . $this->MODULE_ID;
        }

        return '';
    }


    public function doInstall(): void
    {
        global $USER, $APPLICATION;

        if (!$USER->isAdmin()) {
            return;
        }

        RegisterModule("up.groups.module");

        $this->installFiles();

        $installFilePath = $_SERVER['DOCUMENT_ROOT'] . '/local/modules/' . $this->MODULE_ID . '/install/step.php';
        if (!file_exists($installFilePath)) {
            $installFilePath = $_SERVER['DOCUMENT_ROOT'] . '/bitrix/modules/' . $this->MODULE_ID . '/install/step.php';
        }

        $APPLICATION->IncludeAdminFile(
            Loc::getMessage('UP_GROUPS_INSTALL_TITLE'),
            $installFilePath
        );
    }

    public function doUninstall(): void
    {
        global $USER, $APPLICATION;
        $this->uninstallFiles();

        if (!$USER->isAdmin()) {
            return;
        }
        UnRegisterModule("up.groups.module");

        $uninstallFilePath = $_SERVER['DOCUMENT_ROOT'] . '/local/modules/' . $this->MODULE_ID . '/install/unstep.php';
        if (!file_exists($uninstallFilePath)) {
            $uninstallFilePath = $_SERVER['DOCUMENT_ROOT'] . '/bitrix/modules/' . $this->MODULE_ID . '/install/unstep.php';
        }

        $APPLICATION->IncludeAdminFile(
            Loc::getMessage('UP_GROUPS_UNINSTALL_TITLE'),
            $uninstallFilePath
        );
    }
}
