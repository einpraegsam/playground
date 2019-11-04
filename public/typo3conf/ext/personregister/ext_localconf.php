<?php
defined('TYPO3_MODE') || die();

call_user_func(function () {
    \TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
        'In2code.personregister',
        'Pi1',
        [
            'Person' => 'list,detail'
        ],
        [
            'Person' => 'list'
        ]
    );
});
