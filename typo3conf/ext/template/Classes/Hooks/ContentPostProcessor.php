<?php
namespace In2code\Template\Hooks;

use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Frontend\Controller\TypoScriptFrontendController;
use WyriHaximus\HtmlCompress\Factory;

/**
 * Class ContentPostProcessor needs composer requirement wyrihaximus/html-compress
 */
class ContentPostProcessor
{
    /**
     * @param array $parentObject
     * @param TypoScriptFrontendController $typoScriptFrontend
     */
    public function render(array $parentObject, TypoScriptFrontendController $typoScriptFrontend)
    {
        if ($this->isDefaultTypeNum()) {
            if ($this->isCompressBodyActive()) {
                $parser = Factory::construct();

                $pattern = '~<body.*?>(.*?)<\/body>~is';
                preg_match($pattern, $typoScriptFrontend->content, $body);
                $typoScriptFrontend->content = preg_replace(
                    '/<body.*<\/body>/is',
                    $parser->compress($body[0]),
                    $typoScriptFrontend->content
                );

                // Remove comments
                //$typoScriptFrontend->content = preg_replace(
                //    '/<!-.*-->/isU',
                //    '',
                //    $typoScriptFrontend->content
                //);
            }
        }
    }

    /**
     * @return bool
     */
    protected function isDefaultTypeNum()
    {
        return GeneralUtility::_GET('type') === null;
    }

    /**
     * Enable in TypoScript with config.compressBody=1
     *
     * @return bool
     * @SuppressWarnings(PHPMD.Superglobals)
     */
    protected function isCompressBodyActive(): bool
    {
        return !empty($GLOBALS['TSFE']->config['config']['compressBody']);
    }
}
