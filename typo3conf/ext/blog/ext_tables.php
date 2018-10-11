<?php
defined('TYPO3_MODE') || die('Access denied.');

call_user_func(
    function()
    {

        \TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
            'In2code.Blog',
            'Pi1',
            'articles'
        );

        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile('blog', 'Configuration/TypoScript', 'blog');

        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_blog_domain_model_article', 'EXT:blog/Resources/Private/Language/locallang_csh_tx_blog_domain_model_article.xlf');
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_blog_domain_model_article');

    }
);
