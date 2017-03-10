<?php
namespace Ukn\Person\Domain\Repository;

use TYPO3\CMS\Extbase\Persistence\QueryResultInterface;
use TYPO3\CMS\Extbase\Persistence\Repository;

/**
 * The repository for Persons
 */
class PersonRepository extends Repository
{

    /**
     * @param array $filter
     * @return array|QueryResultInterface
     */
    public function findByFilter(array $filter)
    {
        $query = $this->createQuery();
        $query->getQuerySettings()->setRespectStoragePage(false);

        if (!empty($filter)) {
            $logicalOr = [
                $query->like('firstName', '%' . $filter['searchterm'] . '%'),
                $query->like('lastName', '%' . $filter['searchterm'] . '%')
            ];
            $query->matching(
                $query->logicalOr($logicalOr)
            );
        }

        return $query->execute();
    }
}
