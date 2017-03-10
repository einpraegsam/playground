<?php
namespace Ukn\Person\Domain\Model;

use TYPO3\CMS\Extbase\DomainObject\AbstractEntity;

/**
 * Person
 */
class Person extends AbstractEntity
{

    /**
     * firstName
     *
     * @var string
     * @validate NotEmpty
     */
    protected $firstName = '';
    
    /**
     * lastName
     *
     * @var string
     * @validate NotEmpty
     */
    protected $lastName = '';
    
    /**
     * dateOfBirth
     *
     * @var \DateTime
     */
    protected $dateOfBirth = null;
    
    /**
     * description
     *
     * @var string
     */
    protected $description = '';
    
    /**
     * showProfile
     *
     * @var bool
     */
    protected $showProfile = false;
    
    /**
     * Returns the firstName
     *
     * @return string $firstName
     */
    public function getFirstName()
    {
        return $this->firstName;
    }
    
    /**
     * Sets the firstName
     *
     * @param string $firstName
     * @return void
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;
    }
    
    /**
     * Returns the lastName
     *
     * @return string $lastName
     */
    public function getLastName()
    {
        return $this->lastName;
    }
    
    /**
     * Sets the lastName
     *
     * @param string $lastName
     * @return void
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;
    }
    
    /**
     * Returns the dateOfBirth
     *
     * @return \DateTime $dateOfBirth
     */
    public function getDateOfBirth()
    {
        return $this->dateOfBirth;
    }
    
    /**
     * Sets the dateOfBirth
     *
     * @param \DateTime $dateOfBirth
     * @return void
     */
    public function setDateOfBirth(\DateTime $dateOfBirth)
    {
        $this->dateOfBirth = $dateOfBirth;
    }
    
    /**
     * Returns the description
     *
     * @return string $description
     */
    public function getDescription()
    {
        return $this->description;
    }
    
    /**
     * Sets the description
     *
     * @param string $description
     * @return void
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }
    
    /**
     * Returns the showProfile
     *
     * @return bool $showProfile
     */
    public function getShowProfile()
    {
        return $this->showProfile;
    }
    
    /**
     * Sets the showProfile
     *
     * @param bool $showProfile
     * @return void
     */
    public function setShowProfile($showProfile)
    {
        $this->showProfile = $showProfile;
    }
    
    /**
     * Returns the boolean state of showProfile
     *
     * @return bool
     */
    public function isShowProfile()
    {
        return $this->showProfile;
    }

    /**
     * @return bool
     */
    public function isOver30(): bool
    {
        return $this->getDateOfBirth()->diff(new \DateTime())->y > 30;
    }
}
