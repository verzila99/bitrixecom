<?php
	
	use Bitrix\Main\Localization\Loc;
	use Bitrix\Main\ModuleManager;
	
	Loc::loadMessages(__FILE__);
	
	
	class aidar_somemodule extends CModule
	{
		public $MODULE_ID = 'landing';
		public $MODULE_GROUP_RIGHTS = 'Y';
		public $MODULE_VERSION;
		public $MODULE_VERSION_DATE;
		public $MODULE_NAME;
		public $MODULE_DESCRIPTION;
		
		/**
		 * Constructor.
		 */
		public function __construct()
		{
			$arModuleVersion = [];
			include(__DIR__ . '/version.php');
			$this->MODULE_VERSION = $arModuleVersion['VERSION'];
			$this->MODULE_VERSION_DATE = $arModuleVersion['VERSION_DATE'];
			$this->MODULE_NAME = 'somemodule';
			$this->MODULE_DESCRIPTION = 'Некоторый модуль';
		}
		
		/**
		 * Call all install methods.
		 * @returm void
		 */
		public function doInstall()
		{
			global $DB, $APPLICATION;
			
			$this->installFiles();
			$this->installDB();
		}
		
		/**
		 * Call all uninstall methods, include several steps.
		 * @returm void
		 */
		public function doUninstall()
		{
			global $APPLICATION;
			
			$this->uninstallDB(false);
			$this->uninstallFiles();
		}
		
		/**
		 * Install DB, events, etc.
		 * @return boolean
		 */
		public function installDB()
		{
			global $DB, $APPLICATION;
			
			// module
			ModuleManager::registerModule($this->MODULE_ID);
			
			return true;
		}
		
		/**
		 * Is B24 portal?
		 * @return bool
		 */
		private function isB24()
		{
			if (
				defined('LANDING_DISABLE_B24_MODE') &&
				LANDING_DISABLE_B24_MODE === true
			) {
				return false;
			} else {
				return ModuleManager::isModuleInstalled('bitrix24') ||
					ModuleManager::isModuleInstalled('intranet');
			}
		}
		
		/**
		 * Install files.
		 * @return boolean
		 */
		public function installFiles()
		{
			return true;
		}
		
		/**
		 * Uninstall DB, events, etc.
		 * @param array $arParams Some params.
		 * @return boolean
		 */
		public function uninstallDB($arParams = array())
		{
			global $APPLICATION, $DB;
			
			// module
			ModuleManager::unregisterModule($this->MODULE_ID);
			
			
			return true;
		}
		
		/**
		 * Uninstall files.
		 * @return boolean
		 */
		public function uninstallFiles(): bool
		{
			return true;
		}
		
		/**
		 * Get module rights.
		 * @return array
		 */
		public function getModuleRightList(): array
		{
			return array(
				'reference_id' => array('D', 'W'),
				'reference' => array(
					'[D] ' . Loc::getMessage('LANDING_RIGHT_D'),
					'[W] ' . Loc::getMessage('LANDING_RIGHT_W')
				)
			);
		}
		
		
	}
