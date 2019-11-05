<?php
defined('TYPO3_MODE') || die('Access denied.');

call_user_func(
    function()
    {

        \TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
            'BBAW.Cildb',
            'Datalisting',
            'cildb - datalisting'
        );
    }
);


\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile(
    'cildb',
    'Configuration/TypoScript',
    'cil'
);