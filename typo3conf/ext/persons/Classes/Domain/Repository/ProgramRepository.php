<?php
namespace In2code\Persons\Domain\Repository;

use TYPO3\CMS\Extbase\Persistence\QueryResultInterface;
use TYPO3\CMS\Extbase\Persistence\Repository;

/**
 * Class ProgramRepository
 */
class ProgramRepository extends Repository
{

    /**
     * @return QueryResultInterface
     */
    public function findEverything(): QueryResultInterface
    {
        $query = $this->createQuery();
        $query->getQuerySettings()->setRespectStoragePage(false);
        return $query->execute();
    }
}
