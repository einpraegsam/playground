<?php
if (!defined('TYPO3_MODE')) {
    die('Access denied.');
}

call_user_func(
    function () {
        // Register icons
        $iconRegistry =
            \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(\TYPO3\CMS\Core\Imaging\IconRegistry::class);
        $iconRegistry->registerIcon(
            'contentelement_slider',
            \TYPO3\CMS\Core\Imaging\IconProvider\SvgIconProvider::class,
            ['source' => 'EXT:contentelements/Resources/Public/Images/ContentElementSlider.svg']
        );

        // Add TypoScript
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile(
            'contentelements',
            'Configuration/TypoScript',
            'In2code Basis Template'
        );
    }
);
