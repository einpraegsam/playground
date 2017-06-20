<?php
namespace Twofour\TwofourContacts\Utility;

use TYPO3\CMS\Frontend\Controller\TypoScriptFrontendController;

/**
 * Class UserUtility
 */
class UserUtility
{

    /**
     * Is a frontend user logged in
     *
     * @return bool
     */
    public static function isLoggedInFrontendUser(): bool
    {
        return !empty(self::getTyposcriptFrontendController()->fe_user->user['uid']);
    }

    /**
     * @return TypoScriptFrontendController
     * @SuppressWarnings(PHPMD.Superglobals)
     */
    protected static function getTyposcriptFrontendController(): TypoScriptFrontendController
    {
        return $GLOBALS['TSFE'];
    }
}
