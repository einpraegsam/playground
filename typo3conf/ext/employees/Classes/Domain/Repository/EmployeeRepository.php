<?php
declare(strict_types=1);
namespace In2code\Employees\Domain\Repository;

use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Extbase\Persistence\QueryInterface;
use TYPO3\CMS\Extbase\Persistence\QueryResultInterface;
use TYPO3\CMS\Extbase\Persistence\Repository;

/**
 * Class EmployeeRepository
 */
class EmployeeRepository extends Repository
{

    /**
     * @param array $filter
     * @return QueryResultInterface
     */
    public function findByFilter(array $filter): QueryResultInterface
    {
        $query = $this->createQuery();
        $this->findByFilterWhere($filter, $query);
        $this->findByFilterOrderings($query);
        return $query->execute();
    }

    /**
     * @param array $filter
     * @param QueryInterface $query
     * @return void
     */
    protected function findByFilterWhere(array $filter, QueryInterface $query)
    {
        if (!empty($filter['searchterm'])) {
            $searchterms = GeneralUtility::trimExplode(' ', $filter['searchterm'], true);
            $logicalAnd = [];
            foreach ($searchterms as $searchterm) {
                $logicalOr = [
                    $query->like('lastName', '%' . $searchterm . '%'),
                    $query->like('firstName', '%' . $searchterm . '%'),
                    $query->like('description', '%' . $searchterm . '%')
                ];
                $logicalAnd[] = $query->logicalOr($logicalOr);
            }
            $query->matching($query->logicalAnd($logicalAnd));
        }
    }

    /**
     * @param QueryInterface $query
     * @return void
     */
    protected function findByFilterOrderings(QueryInterface $query)
    {
        $query->setOrderings(
            [
                'lastName' => QueryInterface::ORDER_ASCENDING,
                'firstName' => QueryInterface::ORDER_ASCENDING
            ]
        );
    }
}
