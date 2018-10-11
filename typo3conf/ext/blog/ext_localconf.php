<?php
defined('TYPO3_MODE') || die('Access denied.');

call_user_func(
    function()
    {

        \TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
            'In2code.Blog',
            'Pi1',
            [
                'Article' => 'list,show'
            ],
            // non-cacheable actions
            [
                'Article' => 'list'
            ]
        );

    // wizards
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig(
        'mod {
            wizards.newContentElement.wizardItems.plugins {
                elements {
                    pi1 {
                        iconIdentifier = blog-plugin-pi1
                        title = LLL:EXT:blog/Resources/Private/Language/locallang_db.xlf:tx_blog_pi1.name
                        description = LLL:EXT:blog/Resources/Private/Language/locallang_db.xlf:tx_blog_pi1.description
                        tt_content_defValues {
                            CType = list
                            list_type = blog_pi1
                        }
                    }
                }
                show = *
            }
       }'
    );
		$iconRegistry = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(\TYPO3\CMS\Core\Imaging\IconRegistry::class);

			$iconRegistry->registerIcon(
				'blog-plugin-pi1',
				\TYPO3\CMS\Core\Imaging\IconProvider\SvgIconProvider::class,
				['source' => 'EXT:blog/Resources/Public/Icons/user_plugin_pi1.svg']
			);

    }
);
