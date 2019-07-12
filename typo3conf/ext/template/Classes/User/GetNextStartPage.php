<?php
declare(strict_types=1);
namespace In2code\Template\User;

use TYPO3\CMS\Core\Database\ConnectionPool;
use TYPO3\CMS\Core\Utility\GeneralUtility;

/**
 * Class GetNextStartPage
 */
class GetNextStartPage
{

    /**
     * @return int
     */
    public function get(): int
    {
        return $this->getNextStartPage((int)$GLOBALS['TSFE']->id);
    }

    /**
     * @param int $identifier
     * @return int
     */
    protected function getNextStartPage(int $identifier): int
    {
        if ($this->isPageOfTypeStartpage($identifier)) {
            return $identifier;
        } else {
            $parentIdentifier = $this->getParentIdentifier($identifier);
            if ($parentIdentifier > 0) {
                return $this->getNextStartPage($parentIdentifier);
            }
            return 1;
        }
    }

    /**
     * @param int $identifier
     * @return int
     */
    protected function getParentIdentifier(int $identifier): int
    {
        $queryBuilder = GeneralUtility::makeInstance(ConnectionPool::class)->getQueryBuilderForTable('pages');
        return (int)$queryBuilder
            ->select('pid')
            ->from('pages')
            ->where('uid=' . (int)$identifier)
            ->execute()
            ->fetchColumn(0);
    }

    /**
     * @param int $identifier
     * @return bool
     */
    protected function isPageOfTypeStartpage(int $identifier): bool
    {
        $queryBuilder = GeneralUtility::makeInstance(ConnectionPool::class)->getQueryBuilderForTable('pages');
        $backendLayout = (int)$queryBuilder
            ->select('backend_layout')
            ->from('pages')
            ->where('uid=' . (int)$identifier)
            ->execute()
            ->fetchColumn(0);
        return $backendLayout === 2;
    }
}
