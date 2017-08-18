<?php
if (!defined('TYPO3_MODE')) {
    die('Access denied.');
}

call_user_func(
    function () {
        // TypoScript for FE rendering
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile(
            'template',
            'Configuration/TypoScript',
            'Root Template'
        );

        // Page TSConfig for backend configuration
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig(
            '<INCLUDE_TYPOSCRIPT: source="FILE:EXT:template/Configuration/PageTsConfig/start.typoscript">'
        );

        // Change TYPO3 backend-login mask
        $extRelPath = \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::siteRelPath('template');
        $GLOBALS['TBE_STYLES']['logo'] = $extRelPath . 'Resources/Public/Images/in2code.png';
        $GLOBALS['TBE_STYLES']['logo_login'] = $extRelPath . 'Resources/Public/Images/in2code.png';
        if (!is_array($GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf']['backend'])) {
            $GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf']['backend'] =
                unserialize($GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf']['backend']);

            $GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf']['backend']['loginHighlightColor'] = '#6aa563';
            $GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf']['backend']['backendLogo'] = $GLOBALS['TBE_STYLES']['logo'];
            $GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf']['backend']['loginLogo']
                = $GLOBALS['TBE_STYLES']['logo_login'];
            $GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf']['backend']['loginBackgroundImage'] =
                $extRelPath . 'Resources/Public/Images/leaf.jpg';

            $GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf']['backend'] =
                serialize($GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf']['backend']);
        }
    }
);
