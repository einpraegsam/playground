<?php
defined('TYPO3_MODE') || die('Access denied.');

call_user_func(
    function()
    {

        \TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
            'In2code.Person',
            'Pi1',
            'PersonList'
        );

        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile('person', 'Configuration/TypoScript', 'Personlisting');

        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_person_domain_model_person', 'EXT:person/Resources/Private/Language/locallang_csh_tx_person_domain_model_person.xlf');
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_person_domain_model_person');

    }
);
