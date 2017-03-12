<?php
namespace Ukn\Person\Domain\Repository;

use TYPO3\CMS\Core\Database\DatabaseConnection;
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

    /**
     * @param string $autocomplete
     * @return array
     */
    public function findForAjax(string $autocomplete): array
    {
        /** @var DatabaseConnection $database */
        $database = $GLOBALS['TYPO3_DB'];
        $rows = $database->exec_SELECTgetRows(
            'first_name,last_name',
            'tx_person_domain_model_person',
            'first_name like "' . $database->quoteStr($autocomplete, '')  . '%"'
        );
        return $rows;
    }
}
