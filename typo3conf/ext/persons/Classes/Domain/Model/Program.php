<?php
namespace In2code\Persons\Domain\Model;

use TYPO3\CMS\Extbase\DomainObject\AbstractEntity;

/**
 * Class Program
 */
class Program extends AbstractEntity
{

    const TABLE_NAME = 'tx_persons_domain_model_program';

    /**
     * @var string
     */
    protected $title = '';

    /**
     * @var string
     */
    protected $description = '';

    /**
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\In2code\Persons\Domain\Model\Authorization>
     */
    protected $authorizations = null;

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @param string $title
     * @return Program
     */
    public function setTitle(string $title)
    {
        $this->title = $title;
        return $this;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @param string $description
     * @return Program
     */
    public function setDescription(string $description)
    {
        $this->description = $description;
        return $this;
    }

    /**
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage
     */
    public function getAuthorizations()
    {
        return $this->authorizations;
    }

    /**
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage $authorizations
     * @return Authorization
     */
    public function setAuthorizations(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $authorizations)
    {
        $this->authorizations = $authorizations;
        return $this;
    }
}
