<?php
if (!defined('TYPO3_MODE')) {
    die('Access denied.');
}

call_user_func(
    function () {

        /**
         * CK editor configuration
         */
        $GLOBALS['TYPO3_CONF_VARS']['RTE']['Presets']['template'] = 'EXT:template/Configuration/Yaml/Rte.yaml';


        /**
         * Compression of HTML output
         */
        $GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['tslib/class.tslib_fe.php']['contentPostProc-output'][] =
            \In2code\Template\Hooks\ContentPostProcessor::class . '->render';
        $GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['tslib/class.tslib_fe.php']['contentPostProc-all'][] =
            \In2code\Template\Hooks\ContentPostProcessor::class . '->render';
    }
);
