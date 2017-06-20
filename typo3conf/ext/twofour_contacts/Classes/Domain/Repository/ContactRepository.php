<?php
namespace Twofour\TwofourContacts\Domain\Repository;

use TYPO3\CMS\Extbase\Persistence\QueryInterface;
use TYPO3\CMS\Extbase\Persistence\QueryResultInterface;
use TYPO3\CMS\Extbase\Persistence\Repository;

/**
 * Class ContactRepository
 */
class ContactRepository extends Repository
{

    /**
     * @param array $filter
     * @return QueryResultInterface
     */
    public function findByFilter(array $filter): QueryResultInterface
    {
        $query = $this->createQuery();
        $query->getQuerySettings()->setRespectStoragePage(false);

        if (!empty($filter)) {
            $logicalOr = [
                $query->like('firstName', '%' . $filter['searchterm'] . '%'),
                $query->like('lastName', '%' . $filter['searchterm'] . '%'),
                $query->like('email', '%' . $filter['searchterm'] . '%'),
            ];
            $query->matching(
                $query->logicalOr($logicalOr)
            );
        }

        $query->setOrderings([
            'lastName' => QueryInterface::ORDER_DESCENDING
        ]);

        return $query->execute();
    }

    /**
     * @param string $searchterm
     * @return array
     */
    public function findLastNameBySearchterm(string $searchterm): array
    {
        $query = $this->createQuery();
        $query->getQuerySettings()->setRespectStoragePage(false);
        $query->matching($query->like('lastName', $searchterm . '%'));
        return array_column($query->execute(true), 'last_name');
    }
}
