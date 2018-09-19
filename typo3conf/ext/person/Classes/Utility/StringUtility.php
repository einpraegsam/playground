<?php
namespace In2code\Person\Utility;

use TYPO3\CMS\Core\Utility\GeneralUtility;

/**
 * Class StringUtility
 */
class StringUtility
{

    /**
     * @param string $email
     * @return string
     */
    public static function convertEmail(string $email): string
    {
        if (GeneralUtility::validEmail($email) === false) {
            throw new \DomainException('Not a valid email', 1537358444);
        }
        return str_replace('@', '[at]', $email);
    }
}
