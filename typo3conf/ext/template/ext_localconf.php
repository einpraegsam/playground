<?php
/**
 * Add Page TSConfig (e.g. for backend layouts)
 */
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig(
    '<INCLUDE_TYPOSCRIPT: source="FILE:EXT:template/Configuration/TSConfig/Main.typoscript">'
);

/**
 * Add TypoScript setup for frontend rendering
 */
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTypoScriptSetup(
    '<INCLUDE_TYPOSCRIPT: source="FILE:EXT:template/Configuration/TypoScript/Main.typoscript">'
);
