<?php
namespace In2code\Template;

use TYPO3\CMS\Core\Utility\GeneralUtility;

/**
 * Class IpService
 */
class IpService
{

    /**
     * @param string $content
     * @param array $configuration
     * @return string
     */
    public function getCurrentIp(string $content = '', array $configuration = []): string
    {
        $ipAddress = GeneralUtility::getIndpEnv('REMOTE_ADDR');
        if ($ipAddress === '127.0.0.1') {
            $ipAddress = $configuration['fallbackOnLocalhost'];
        }
        return $ipAddress;
    }
}
