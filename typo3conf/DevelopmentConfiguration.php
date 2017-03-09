<?php
// PASSWORDS
$saltFactory = \TYPO3\CMS\Saltedpasswords\Salt\SaltFactory::getSaltingInstance();
$GLOBALS['TYPO3_CONF_VARS']['BE']['installToolPassword'] = $saltFactory->getHashedPassword('akellner');

// MISC
$GLOBALS['TYPO3_CONF_VARS']['BE']['sessionTimeout'] = 9999999999;
$GLOBALS['TYPO3_CONF_VARS']['SYS']['enableDeprecationLog'] = '1';
$GLOBALS['TYPO3_CONF_VARS']['SYS']['curlUse'] = 1;
$GLOBALS['TYPO3_CONF_VARS']['SYS']['curlTimeout'] = 10;

// DEBUG
$GLOBALS['TYPO3_CONF_VARS']['BE']['debug'] = 1;
$GLOBALS['TYPO3_CONF_VARS']['BE']['compressionLevel'] = 0;
$GLOBALS['TYPO3_CONF_VARS']['FE']['debug'] = 1;
//$GLOBALS['TYPO3_CONF_VARS']['FE']['pageNotFound_handling'] = '';
$GLOBALS['TYPO3_CONF_VARS']['FE']['compressionLevel'] = 0;
$GLOBALS['TYPO3_CONF_VARS']['SYS']['displayErrors'] = '1';
$GLOBALS['TYPO3_CONF_VARS']['SYS']['devIPmask'] = '*';
$GLOBALS['TYPO3_CONF_VARS']['SYS']['sqlDebug'] = '1';
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTypoScript(
    'developmentConfiguration',
    'setup',
    'config.contentObjectExceptionHandler = 0'
);

// CACHE
$GLOBALS['TYPO3_CONF_VARS']['SYS']['clearCacheSystem'] = '1';
$GLOBALS['TYPO3_CONF_VARS']['SYS']['caching']['cacheConfigurations']['cache_hash']['backend'] = 'TYPO3\CMS\Core\Cache\Backend\NullBackend';
$GLOBALS['TYPO3_CONF_VARS']['SYS']['caching']['cacheConfigurations']['cache_pages']['backend'] = 'TYPO3\CMS\Core\Cache\Backend\NullBackend';
$GLOBALS['TYPO3_CONF_VARS']['SYS']['caching']['cacheConfigurations']['cache_pagesection']['backend'] = 'TYPO3\CMS\Core\Cache\Backend\NullBackend';
$GLOBALS['TYPO3_CONF_VARS']['SYS']['caching']['cacheConfigurations']['cache_phpcode']['backend'] = 'TYPO3\CMS\Core\Cache\Backend\NullBackend';
$GLOBALS['TYPO3_CONF_VARS']['SYS']['caching']['cacheConfigurations']['cache_rootline']['backend'] = 'TYPO3\CMS\Core\Cache\Backend\NullBackend';
$GLOBALS['TYPO3_CONF_VARS']['SYS']['caching']['cacheConfigurations']['extbase_datamapfactory_datamap']['backend'] = 'TYPO3\CMS\Core\Cache\Backend\NullBackend';
$GLOBALS['TYPO3_CONF_VARS']['SYS']['caching']['cacheConfigurations']['extbase_object']['backend'] = 'TYPO3\CMS\Core\Cache\Backend\NullBackend';
$GLOBALS['TYPO3_CONF_VARS']['SYS']['caching']['cacheConfigurations']['extbase_reflection']['backend'] = 'TYPO3\CMS\Core\Cache\Backend\NullBackend';
$GLOBALS['TYPO3_CONF_VARS']['SYS']['caching']['cacheConfigurations']['extbase_typo3dbbackend_queries']['backend'] = 'TYPO3\CMS\Core\Cache\Backend\NullBackend';
$GLOBALS['TYPO3_CONF_VARS']['SYS']['caching']['cacheConfigurations']['extbase_typo3dbbackend_tablecolumns']['backend'] = 'TYPO3\CMS\Core\Cache\Backend\NullBackend';
$GLOBALS['TYPO3_CONF_VARS']['SYS']['caching']['cacheConfigurations']['l10n']['backend'] = 'TYPO3\CMS\Core\Cache\Backend\NullBackend';
$GLOBALS['TYPO3_CONF_VARS']['EXT']['extCache'] = '0';
