<?php
declare(strict_types=1);
namespace In2code\Personregister\Domain\Repository;

use TYPO3\CMS\Extbase\Persistence\Exception\InvalidQueryException;
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
     * @throws InvalidQueryException
     */
    public function findByFilter(array $filter): QueryResultInterface
    {
        $query = $this->createQuery();

        if ($filter !== []) {
            $constraint = $query->like('firstName', '%' . $filter['searchterm'] . '%');
            $query->matching($constraint);
        }

        return $query->execute();
    }
}
