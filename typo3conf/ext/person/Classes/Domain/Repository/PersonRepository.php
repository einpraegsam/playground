<?php
namespace Group\Person\Domain\Repository;

use TYPO3\CMS\Extbase\Persistence\QueryInterface;
use TYPO3\CMS\Extbase\Persistence\QueryResultInterface;
use TYPO3\CMS\Extbase\Persistence\Repository;

/**
 * Class PersonRepository
 */
class PersonRepository extends Repository
{

    /**
     * @param array $filter
     * @return QueryResultInterface
     */
    public function findByFilter(array $filter): QueryResultInterface
    {
        $query = $this->createQuery();
        $this->buildQueryByFilter($filter, $query);
        return $query->execute();
    }

    /**
     * @param array $filter
     * @param QueryInterface $query
     * @return void
     */
    protected function buildQueryByFilter(array $filter, QueryInterface $query)
    {
        if (!empty($filter['searchterm'])) {
            $logicalOr = [
                $query->like('lastName', '%' . $filter['searchterm'] . '%'),
                $query->like('firstName', '%' . $filter['searchterm'] . '%'),
                $query->like('description', '%' . $filter['searchterm'] . '%')
            ];
            $query->matching($query->logicalOr($logicalOr));
        }
    }
}
