<?php
namespace In2code\Persons\Domain\Repository;

use TYPO3\CMS\Extbase\Persistence\QueryInterface;
use TYPO3\CMS\Extbase\Persistence\QueryResultInterface;
use TYPO3\CMS\Extbase\Persistence\Repository;

/***
 *
 * This file is part of the "Personlist" Extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 *  (c) 2017 Alex Kellner <alexander.kellner@in2code.de>, in2code
 *
 ***/

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
        $query->getQuerySettings()->setRespectStoragePage(false);
        $this->getQueryFilter($filter, $query);
        return $query->execute();
    }

    /**
     * @param array $filter
     * @param QueryInterface $query
     * @return void
     */
    protected function getQueryFilter(array $filter, QueryInterface $query)
    {
        if (!empty($filter['searchterm'])) {
            $logicalOr = [
                $query->like('firstName', '%' . $filter['searchterm'] . '%'),
                $query->like('lastName', '%' . $filter['searchterm'] . '%')
            ];
            $query->matching($query->logicalOr($logicalOr));
        }
    }
}
