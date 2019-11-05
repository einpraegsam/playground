<?php
declare(strict_types=1);
namespace In2code\Personregister\Domain\Repository;

use In2code\Personregister\Domain\Model\Dto\Filter;
use TYPO3\CMS\Core\Database\ConnectionPool;
use TYPO3\CMS\Core\Utility\GeneralUtility;

/**
 * Class PersonRepository
 * Use https://docs.typo3.org/m/typo3/reference-coreapi/master/en-us/ApiOverview/Database/Configuration/Index.html
 * to define more then only 1 database
 */
class InscriptionRepository
{
    /**
     * @var \Doctrine\DBAL\Driver\Mysqli\MysqliConnection|null
     */
    protected $connection = null;

    /**
     * PersonRepository constructor.
     */
    public function __construct()
    {
        $this->connection = GeneralUtility::makeInstance(DatabaseConnection::class)->build();
    }

    /**
     * @param Filter|null $filter
     * @return array
     */
    public function findByFilter(Filter $filter = null): array
    {
        $filter = ['suchbegriff' => 'III'];
        $queryBuilder = GeneralUtility::makeInstance(ConnectionPool::class)->getQueryBuilderForTable('inschrift');
        return (array)$queryBuilder
            ->select('id', 'inschrift', 'text')
            ->from('inschrift')
            ->where(
                $queryBuilder->expr()->eq('inschrift', $queryBuilder->createNamedParameter($filter['suchbegriff'], \PDO::PARAM_STR))
            )
            ->execute()
            ->fetchAll();
    }

    /**
     * See https://docs.typo3.org/m/typo3/reference-coreapi/master/en-us/ApiOverview/Database/QueryBuilder/Index.html
     * for some exapmles how to use the querybuilder in TYPO3
     *
     * @param int $identifier
     * @return array
     */
    public function findByUid(int $identifier): array
    {
        $queryBuilder = GeneralUtility::makeInstance(ConnectionPool::class)->getQueryBuilderForTable('inschrift');
        return (array)$queryBuilder
            ->select('id', 'inschrift', 'text')
            ->from('inschrift')
            ->where(
                $queryBuilder->expr()->eq('id', $queryBuilder->createNamedParameter($identifier, \PDO::PARAM_INT))
            )
            ->execute()
            ->fetch();
    }
}
