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
    }
);
