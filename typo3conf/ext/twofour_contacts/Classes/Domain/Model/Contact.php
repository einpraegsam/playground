<?php
namespace Twofour\TwofourContacts\Domain\Model;

use TYPO3\CMS\Extbase\DomainObject\AbstractEntity;

/**
 * Contact
 */
class Contact extends AbstractEntity
{
    /**
     * lastName
     *
     * @var string
     * @validate NotEmpty
     */
    protected $lastName = '';

    /**
     * firstName
     *
     * @var string
     * @validate NotEmpty
     */
    protected $firstName = '';

    /**
     * birthDate
     *
     * @var \DateTime
     */
    protected $birthDate = null;

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
     * Returns the firstName
     *
     * @return string $firstName
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * Returns the birthDate
     *
     * @return \DateTime $birthDate
     */
    public function getBirthDate()
    {
        return $this->birthDate;
    }

    /**
     * @return string
     */
    public function getFullName(): string
    {
        return $this->getLastName() . ', ' . $this->getFirstName();
    }

    /**
     * @return bool
     */
    public function isAtLeast18(): bool
    {
        $birthdate = $this->getBirthDate();
        return $birthdate->diff(new \DateTime())->y >= 18;
    }
}
