<?php
namespace Group\Person\Domain\Repository;

use Group\Person\Domain\Model\Dto\FilterDto;
use TYPO3\CMS\Extbase\Persistence\QueryInterface;
use TYPO3\CMS\Extbase\Persistence\QueryResultInterface;
use TYPO3\CMS\Extbase\Persistence\Repository;

/**
 * Class PersonRepository
 */
class PersonRepository extends Repository
{

    /**
     * @param FilterDto $filter
     * @return QueryResultInterface
     */
    public function findByFilter(FilterDto $filter = null): QueryResultInterface
    {
        $query = $this->createQuery();
        $this->buildQueryByFilter($filter, $query);
        return $query->execute();
    }

    /**
     * @param FilterDto $filter
     * @param QueryInterface $query
     * @return void
     */
    protected function buildQueryByFilter(FilterDto $filter = null, QueryInterface $query)
    {
        if ($filter !== null) {
            $logicalOr = [
                $query->like('lastName', '%' . $filter->getSearchterm() . '%'),
                $query->like('firstName', '%' . $filter->getSearchterm() . '%'),
                $query->like('description', '%' . $filter->getSearchterm() . '%')
            ];
            $query->matching($query->logicalOr($logicalOr));
        }
    }
}
