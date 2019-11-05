<?php
namespace BBAW\Cildb\Domain\Repository;

use BBAW\Cildb\Domain\Model\Inscription;

/**
 * Class CollectionRepository
 */
class CollectionRepository
{
    /**
     * @return array
     */
    public function findAll(): array
    {
        $queryBuilder = GeneralUtility::makeInstance(ConnectionPool::class)->getQueryBuilderForTable('sammmlungen');
        return (array)$queryBuilder
            ->select('*')
            ->from('sammmlungen')
            ->execute()
            ->fetchAll();
    }
}
