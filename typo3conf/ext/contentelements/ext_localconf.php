<?php
if (!defined('TYPO3_MODE')) {
    die('Access denied.');
}

call_user_func(
    function () {
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig(
            '<INCLUDE_TYPOSCRIPT: source="' .
            'FILE:EXT:contentelements/Configuration/PageTsConfig/Start.typoscript">'
        );
    }
);
