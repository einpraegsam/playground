<?php
namespace Group\Person\Domain\Model\Dto;

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
     * @var array
     */
    protected $settings = [];

    /**
     * FilterDto constructor.
     *
     * @param array $settings
     * @param array $filter
     */
    public function __construct(array $settings, array $filter = [])
    {
        $this->settings = $settings;
        if (!empty($filter['searchterm'])) {
            $this->setSearchterm($filter['searchterm']);
        }
    }

    /**
     * @return string
     */
    public function getSearchterm(): string
    {
        $searchterm = $this->searchterm;
        if (empty($searchterm) && !empty($this->settings['searchterm'])) {
            $searchterm = $this->settings['searchterm'];
        }
        return $searchterm;
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
}
