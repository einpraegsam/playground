<?php
defined('TYPO3_MODE') || die('Access denied.');

call_user_func(
    function () {
        \TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
            'Group.Person',
            'Pi1',
            'Personlist'
        );
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile(
            'person',
            'Configuration/TypoScript',
            'Personlist'
        );

        $GLOBALS['TCA']['tt_content']['types']['list']['subtypes_addlist']['person_pi1'] = 'pi_flexform';
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPiFlexFormValue(
            'person_pi1',
            'FILE:EXT:person/Configuration/FlexForms/FlexForm.xml'
        );
    }
);
