<?php
namespace In2code\In2template\UserFuncs;

use TYPO3\CMS\Core\Database\DatabaseConnection;
use TYPO3\CMS\Frontend\Controller\TypoScriptFrontendController;

/**
 * Handle 404 page requests and request to restricted pages
 *
 * $GLOBALS['TYPO3_CONF_VARS']['FE']['pageNotFoundOnCHashError'] = true;
 * $GLOBALS['TYPO3_CONF_VARS']['FE']['pageNotFound_handling'] = 'USER_FUNCTION:In2code\\Template\\UserFuncs\\PageNotFound->handlePageNotFound';
 * $GLOBALS['TYPO3_CONF_VARS']['FE']['pageNotFound_handling_statheader'] = 'HTTP/1.1 404 Not Found';
 *
 * Class PageNotFound
 */
class PageNotFound
{

    /**
     * @var array
     */
    protected $rootPageUids = [
        'default' => 781,
        'en' => 782
    ];

    /**
     * @var array
     */
    protected $loginPids = [
        'default' => 9,
        'en' => 8902
    ];

    /**
     * @var int
     */
    protected $pageNotFoundUid = 32;

    /**
     * @param array $params
     * @param TypoScriptFrontendController $tsfe
     * @return void
     */
    public function handlePageNotFound(array $params, TypoScriptFrontendController $tsfe)
    {
        if ($this->isNotAuthorized($params)) {
            error_log('User is not authorized, redirect to frontend login page', 0);
            $tsfe->pageErrorHandler(
                $this->getLoginUri($params),
                'HTTP/1.1 302 Found',
                $params['pageAccessFailureReasons']['reasonText']
            );
        } else {
            error_log($params['reasonText'], 0);
            $tsfe->pageErrorHandler(
                $this->get404Uri(),
                $this->getStatHeader(),
                $params['pageAccessFailureReasons']['reasonText']
            );
        }
    }

    /**
     * If user tries to call a page that is restricted for FE Users only
     *      If page is behind fe-login (e.g.): $params['pageAccessFailureReasons']['fe_group'] = [131 => 2];
     *      If page does not exist (index.php?id=9999999): $params['pageAccessFailureReasons'] = [];
     *      If page does not exist in realurl (/xxxxxxxx/): $params['pageAccessFailureReasons']['fe_group'] = ['' => 0];
     *
     * @param array $params
     * @return bool
     */
    protected function isNotAuthorized(array $params): bool
    {
        return !empty($params['pageAccessFailureReasons']['fe_group'])
            && !array_key_exists('', $params['pageAccessFailureReasons']['fe_group']);
    }

    /**
     * @return string
     * @SuppressWarnings(PHPMD.Superglobals)
     */
    protected function getStatHeader(): string
    {
        return (string)$GLOBALS['TYPO3_CONF_VARS']['FE']['accessRestrictedPages_handling_statheader'];
    }

    /**
     * @param array $params
     * @return string
     */
    protected function getLoginUri(array $params): string
    {
        $uri = '/index.php?id=' . $this->getLoginPageUid($params) . '&redirect_url=' . urlencode($params['currentUrl']);
        return $uri;
    }

    /**
     * @param array $params
     * @return int
     */
    protected function getLoginPageUid(array $params): int
    {
        $rootPagePid = $this->getRootPageToCurrentPage($this->getCurrentPid($params));
        if ($rootPagePid > 0) {
            return $rootPagePid;
        }
        return $this->loginPids['default'];
    }

    /**
     * @param int $startPageUid
     * @return int
     */
    protected function getRootPageToCurrentPage(int $startPageUid): int
    {
        if ($startPageUid > 0) {
            if (in_array($startPageUid, $this->rootPageUids)) {
                $key = array_search($startPageUid, $this->rootPageUids);
                if (array_key_exists($key, $this->loginPids)) {
                    return $this->loginPids[$key];
                }
            } else {
                return $this->getRootPageToCurrentPage($this->parentUid($startPageUid));
            }
        }
        return 0;
    }

    /**
     * @param int $uid
     * @return int
     */
    protected function parentUid(int $uid): int
    {
        if ($uid > 0) {
            $row = $this->getDatabase()->exec_SELECTgetSingleRow('pid', 'pages', 'uid=' . (int)$uid);
            return (int)$row['pid'];
        }
        return 0;
    }

    /**
     * @return string
     */
    protected function get404Uri()
    {
        return '/index.php?id=' . $this->pageNotFoundUid;
    }

    /**
     * Try to get current pid from params
     *      $params['pageAccessFailureReasons']['fe_group'] = [123 => '-2']
     *
     * @param array $params
     * @return int
     */
    protected function getCurrentPid(array $params): int
    {
        $pageIdentifier = 0;
        if (!empty($params['pageAccessFailureReasons']['fe_group'])) {
            $key = key($params['pageAccessFailureReasons']['fe_group']);
            if (is_numeric($key) && $key > 0) {
                $pageIdentifier = (int)$key;
            }
        }
        return $pageIdentifier;
    }

    /**
     * @return DatabaseConnection
     * @SuppressWarnings(PHPMD.Superglobals)
     */
    protected function getDatabase(): DatabaseConnection
    {
        return $GLOBALS['TYPO3_DB'];
    }
}
