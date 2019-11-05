<?php
declare(strict_types=1);
namespace In2code\Personregister\Domain\Repository;

use In2code\Personregister\Domain\Model\Dto\Filter;
use TYPO3\CMS\Extbase\Persistence\Exception\InvalidQueryException;
use TYPO3\CMS\Extbase\Persistence\QueryResultInterface;
use TYPO3\CMS\Extbase\Persistence\Repository;

/**
 * Class PersonRepository
 */
class PersonRepository extends Repository
{
    /**
     * @param Filter $filter
     * @return QueryResultInterface
     * @throws InvalidQueryException
     */
    public function findByFilter(Filter $filter = null): QueryResultInterface
    {
        $query = $this->createQuery();

        if ($filter !== null && $filter->isSet()) {
            $logicalOr = [];
            foreach ($filter->getSearchterms() as $searchterm) {
                $logicalOr[] = $query->like('firstName', '%' . $searchterm . '%');
                $logicalOr[] = $query->like('lastName', '%' . $searchterm . '%');
                $logicalOr[] = $query->like('room', '%' . $searchterm . '%');
                $logicalOr[] = $query->like('phone', '%' . $searchterm . '%');
            }
            $constraint = $query->logicalOr($logicalOr);
            $query->matching($constraint);
        }

        return $query->execute();
    }
}
