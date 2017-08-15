<?php
$tca = [
    'types' => [
        'contentelement_slider' => [
            'showitem' => '--div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:general,' .
                '--palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:palette.general;general,' .
                'header,' .
                '--div--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:tabs.media,assets,' .
                '--div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:language,--palette--;;' .
                'language,' .
                '--div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:access,--palette--;;hidden,' .
                '--palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:palette.access;access,'
        ]
    ]
];
$GLOBALS['TCA']['tt_content'] = array_replace_recursive($GLOBALS['TCA']['tt_content'], $tca);

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTcaSelectItem(
    'tt_content',
    'CType',
    ['Slideshow', 'contentelement_slider', 'contentelement_slider']
);
