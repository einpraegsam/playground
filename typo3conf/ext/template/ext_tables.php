<?php

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
            '<INCLUDE_TYPOSCRIPT: source="FILE:EXT:template/Configuration/PageTsConfig/main.typoscript">'
        );
    }
);
