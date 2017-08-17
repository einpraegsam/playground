<?php
declare(strict_types=1);
namespace In2code\Employees\Domain\Repository;

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
        if (!empty($filter['searchterm'])) {
            $logicalOr = [
                $query->like('lastName', '%' . $filter['searchterm'] . '%'),
                $query->like('firstName', '%' . $filter['searchterm'] . '%'),
                $query->like('description', '%' . $filter['searchterm'] . '%')
            ];
            $query->matching($query->logicalOr($logicalOr));
        }
        return $query->execute();
    }
}
