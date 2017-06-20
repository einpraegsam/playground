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
