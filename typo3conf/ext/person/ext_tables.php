<?php
defined('TYPO3_MODE') || die('Access denied.');

call_user_func(
    function () {

        /**
         * Plugin registration
         */
        \TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
            'Group.Person',
            'Pi1',
            'Personlist'
        );

        /**
         * Add TypoScript static file
         */
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile(
            'person',
            'Configuration/TypoScript',
            'Personlist'
        );

        /**
         * FlexForm
         */
        $GLOBALS['TCA']['tt_content']['types']['list']['subtypes_addlist']['person_pi1'] = 'pi_flexform';
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPiFlexFormValue(
            'person_pi1',
            'FILE:EXT:person/Configuration/FlexForms/FlexForm.xml'
        );

        /**
         * Add backend module
         */
        \TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerModule(
            'Group.Person',
            'web',
            'm1',
            '',
            array(
                'Person' => 'my'
            ),
            array(
                'access' => 'user,group',
                'icon' => 'EXT:person/Resources/Public/Icons/user_plugin_pi1.svg',
                'labels' => 'LLL:EXT:person/Resources/Private/Language/locallang_mod.xlf',
            )
        );
    }
);
