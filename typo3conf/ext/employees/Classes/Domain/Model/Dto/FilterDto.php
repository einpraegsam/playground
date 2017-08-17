<?php
declare(strict_types=1);
namespace In2code\Employees\Domain\Model\Dto;

use TYPO3\CMS\Core\Utility\GeneralUtility;

/**
 * Class FilterDto
 */
class FilterDto
{
    /**
     * @var string
     */
    protected $searchterm = '';

    /**
     * @var bool
     */
    protected $companyMobile = false;

    /**
     * @return string
     */
    public function getSearchterm(): string
    {
        return $this->searchterm;
    }

    /**
     * @return array
     */
    public function getSearchterms(): array
    {
        $searchterm = $this->searchterm;
        return GeneralUtility::trimExplode(' ', $searchterm, true);
    }

    /**
     * @param string $searchterm
     * @return FilterDto
     */
    public function setSearchterm(string $searchterm)
    {
        $this->searchterm = $searchterm;
        return $this;
    }

    /**
     * @return bool
     */
    public function isCompanyMobile(): bool
    {
        return $this->companyMobile;
    }

    /**
     * @param bool $companyMobile
     * @return FilterDto
     */
    public function setCompanyMobile(bool $companyMobile)
    {
        $this->companyMobile = $companyMobile;
        return $this;
    }

    /**
     * @return bool
     */
    public function isFiltered(): bool
    {
        return $this->getSearchterm() !== '' || $this->isCompanyMobile();
    }
}
