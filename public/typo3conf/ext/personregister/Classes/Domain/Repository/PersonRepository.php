<?php
declare(strict_types=1);
namespace In2code\Personregister\Domain\Repository;

use In2code\Personregister\Domain\Model\Dto\Filter;
use In2code\Personregister\Domain\Model\Person;
use TYPO3\CMS\Extbase\Persistence\Exception\InvalidQueryException;
use TYPO3\CMS\Extbase\Persistence\Generic\Typo3QuerySettings;
use TYPO3\CMS\Extbase\Persistence\QueryResultInterface;
use TYPO3\CMS\Extbase\Persistence\Repository;

/**
 * Class PersonRepository
 */
class PersonRepository extends Repository
{
    /**
     * @return void
     */
    public function initializeObject()
    {
        /** @var Typo3QuerySettings $defaultQuerySettings */
        $defaultQuerySettings = $this->objectManager->get(Typo3QuerySettings::class);
        $defaultQuerySettings->setRespectStoragePage(false);
        $this->setDefaultQuerySettings($defaultQuerySettings);
    }

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

    /**
     * @param Filter|null $filter
     * @return array
     * @throws InvalidQueryException
     */
    public function findByFilterArray(Filter $filter = null): array
    {
        $persons = $this->findByFilter($filter);
        $result = [];
        /** @var Person $person */
        foreach ($persons as $person) {
            $result[] = $person->getAllProperties();
        }
        return $result;
    }
}
