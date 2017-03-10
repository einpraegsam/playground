<?php
if (!defined('TYPO3_MODE')) {
    die('Access denied.');
}

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
    'Ukn.' . $_EXTKEY,
    'Pi1',
    'Person'
);

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile($_EXTKEY, 'Configuration/TypoScript', 'Person');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_person_domain_model_person');


$GLOBALS['TCA']['tt_content']['types']['list']['subtypes_addlist']['person_pi1'] = 'pi_flexform';
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPiFlexFormValue(
    'person_pi1',
    'FILE:EXT:person/Configuration/FlexForms/FlexForm.xml'
);
