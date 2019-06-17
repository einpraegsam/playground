<?php
// PASSWORDS
if (class_exists(\TYPO3\CMS\Core\Crypto\PasswordHashing\PasswordHashFactory::class)) {
    $hashInstance = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(
        \TYPO3\CMS\Core\Crypto\PasswordHashing\PasswordHashFactory::class
    )->getDefaultHashInstance('BE');
    $GLOBALS['TYPO3_CONF_VARS']['BE']['installToolPassword'] = $hashInstance->getHashedPassword('akellner');
} else {
    $saltFactory = \TYPO3\CMS\Saltedpasswords\Salt\SaltFactory::getSaltingInstance();
    $GLOBALS['TYPO3_CONF_VARS']['BE']['installToolPassword'] = $saltFactory->getHashedPassword('akellner');
}

// MISC
$GLOBALS['TYPO3_CONF_VARS']['BE']['sessionTimeout'] = 9999999999;
$GLOBALS['TYPO3_CONF_VARS']['SYS']['enableDeprecationLog'] = '1';
$GLOBALS['TYPO3_CONF_VARS']['SYS']['curlUse'] = 1;
$GLOBALS['TYPO3_CONF_VARS']['SYS']['curlTimeout'] = 10;

// GRAPHICS
$GLOBALS['TYPO3_CONF_VARS']['GFX']['im_path'] = '/usr/bin/';
$GLOBALS['TYPO3_CONF_VARS']['GFX']['im_path_lzw'] = '/usr/bin/';
$GLOBALS['TYPO3_CONF_VARS']['GFX']['im_version_5'] = 'gm';
$GLOBALS['TYPO3_CONF_VARS']['GFX']['colorspace'] = 'RGB';

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


// MAIL
/*
$GLOBALS['TYPO3_CONF_VARS']['MAIL']['defaultMailFromAddress'] = 'alex@in2code.de';
$GLOBALS['TYPO3_CONF_VARS']['MAIL']['defaultMailFromName'] = 'defaultmailfromaddress';
$GLOBALS['TYPO3_CONF_VARS']['EXT']['powermailDevelopContextEmail'] = 'alexander.kellner@in2code.de';
$GLOBALS['TYPO3_CONF_VARS']['MAIL']['transport'] = 'smtp';
$GLOBALS['TYPO3_CONF_VARS']['MAIL']['transport_smtp_server'] = 'sslout.df.eu:465';
$GLOBALS['TYPO3_CONF_VARS']['MAIL']['transport_smtp_encrypt'] = 'ssl';
$GLOBALS['TYPO3_CONF_VARS']['MAIL']['transport_smtp_username'] = 'lokal@myemail.org';
$GLOBALS['TYPO3_CONF_VARS']['MAIL']['transport_smtp_password'] = 'mypassword';
$GLOBALS['TYPO3_CONF_VARS']['MAIL']['transport_smtp_port'] = '465';
*/

// OVERWRITE EXTENSION SETTINGS
$GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf']['ig_ldap_sso_auth'] = 'a:18:{s:18:"checkConfiguration";s:1:"0";s:21:"throwExceptionAtLogin";s:1:"1";s:22:"forceLowerCaseUsername";s:1:"0";s:26:"enableBELDAPAuthentication";s:1:"0";s:17:"TYPO3BEGroupExist";s:1:"0";s:16:"TYPO3BEUserExist";s:1:"0";s:10:"BEfailsafe";s:1:"1";s:27:"TYPO3BEGroupsNotSynchronize";s:1:"1";s:12:"keepBEGroups";s:1:"1";s:11:"enableBESSO";s:1:"0";s:26:"enableFELDAPAuthentication";s:1:"0";s:31:"TYPO3FEDeleteUserIfNoLDAPGroups";s:1:"0";s:32:"TYPO3FEDeleteUserIfNoTYPO3Groups";s:1:"1";s:17:"TYPO3FEGroupExist";s:1:"0";s:16:"TYPO3FEUserExist";s:1:"1";s:27:"TYPO3FEGroupsNotSynchronize";s:1:"0";s:12:"keepFEGroups";s:1:"0";s:11:"enableFESSO";s:1:"0";}';
