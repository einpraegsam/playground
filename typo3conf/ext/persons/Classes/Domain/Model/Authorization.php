<?php
namespace In2code\Persons\Domain\Model;

use TYPO3\CMS\Extbase\DomainObject\AbstractEntity;

/**
 * Class Authorization
 */
class Authorization extends AbstractEntity
{

    const TABLE_NAME = 'tx_persons_domain_model_authorization';

    /**
     * @var string
     */
    protected $title = '';

    /**
     * @var string
     */
    protected $description = '';

    /**
     * @var \In2code\Persons\Domain\Model\Program
     */
    protected $program = null;

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @param string $title
     * @return Authorization
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
     * @return Authorization
     */
    public function setDescription(string $description)
    {
        $this->description = $description;
        return $this;
    }

    /**
     * @return Program
     */
    public function getProgram()
    {
        return $this->program;
    }

    /**
     * @param Program $program
     * @return Authorization
     */
    public function setProgram(Program $program)
    {
        $this->program = $program;
        return $this;
    }
}
