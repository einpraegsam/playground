<?php
declare(strict_types=1);
namespace In2code\Personregister\Domain\Model\Dto;

use TYPO3\CMS\Core\Utility\GeneralUtility;

/**
 * Class Filter
 */
class Filter
{
    /**
     * @var string
     */
    protected $searchterm = '';

    /**
     * @return string
     */
    public function getSearchterm(): string
    {
        return $this->searchterm;
    }

    /**
     * @param string $searchterm
     * @return Filter
     */
    public function setSearchterm(string $searchterm): self
    {
        $this->searchterm = $searchterm;
        return $this;
    }

    /**
     * @return array
     */
    public function getSearchterms(): array
    {
        return GeneralUtility::trimExplode(' ', $this->getSearchterm(), true);
    }

    /**
     * @return bool
     */
    public function isSet(): bool
    {
        return $this->getSearchterm() !== '';
    }
}
