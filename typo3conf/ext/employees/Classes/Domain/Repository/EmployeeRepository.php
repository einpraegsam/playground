<?php
declare(strict_types=1);
namespace In2code\Employees\Domain\Repository;

use In2code\Employees\Domain\Model\Dto\FilterDto;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Extbase\Persistence\QueryInterface;
use TYPO3\CMS\Extbase\Persistence\QueryResultInterface;
use TYPO3\CMS\Extbase\Persistence\Repository;

/**
 * Class EmployeeRepository
 */
class EmployeeRepository extends Repository
{

    /**
     * @param FilterDto $filter
     * @return QueryResultInterface
     */
    public function findByFilter(FilterDto $filter = null): QueryResultInterface
    {
        $query = $this->createQuery();
        $this->findByFilterWhere($filter ?: GeneralUtility::makeInstance(FilterDto::class), $query);
        $this->findByFilterOrderings($query);
        return $query->execute();
    }

    /**
     * @param string $part
     * @return QueryResultInterface
     */
    public function findByLastNamePart(string $part): QueryResultInterface
    {
        $query = $this->createQuery();
        $query->matching($query->like('lastName', $part . '%'));
        $query->getQuerySettings()->setRespectStoragePage(false);
        return $query->execute();
    }

    /**
     * @param FilterDto $filter
     * @param QueryInterface $query
     * @return void
     */
    protected function findByFilterWhere(FilterDto $filter, QueryInterface $query)
    {
        if ($filter->isFiltered()) {
            $logicalAnd = [];
            if ($filter->isCompanyMobile()) {
                $logicalAnd[] = $query->equals('companyMobile', $filter->isCompanyMobile());
            }
            foreach ($filter->getSearchterms() as $searchterm) {
                $logicalOr = [
                    $query->like('lastName', '%' . $searchterm . '%'),
                    $query->like('firstName', '%' . $searchterm . '%'),
                    $query->like('description', '%' . $searchterm . '%')
                ];
                $logicalAnd[] = $query->logicalOr($logicalOr);
            }
            $query->matching($query->logicalAnd($logicalAnd));
        }
    }

    /**
     * @param QueryInterface $query
     * @return void
     */
    protected function findByFilterOrderings(QueryInterface $query)
    {
        $query->setOrderings(
            [
                'lastName' => QueryInterface::ORDER_ASCENDING,
                'firstName' => QueryInterface::ORDER_ASCENDING
            ]
        );
    }
}
