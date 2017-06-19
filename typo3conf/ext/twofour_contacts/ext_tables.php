<?php
defined('TYPO3_MODE') || die('Access denied.');

call_user_func(
    function($extKey)
    {

        \TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
            'Twofour.TwofourContacts',
            'Pi1',
            'Contact'
        );

        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile($extKey, 'Configuration/TypoScript', 'Contacts');

        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_twofourcontacts_domain_model_contact', 'EXT:twofour_contacts/Resources/Private/Language/locallang_csh_tx_twofourcontacts_domain_model_contact.xlf');
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_twofourcontacts_domain_model_contact');

    },
    $_EXTKEY
);
