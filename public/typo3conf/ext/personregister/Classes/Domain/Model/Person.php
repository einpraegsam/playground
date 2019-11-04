<?php
declare(strict_types=1);
namespace In2code\Personregister\Domain\Model;

use TYPO3\CMS\Extbase\DomainObject\AbstractEntity;

/**
 * Class Person
 */
class Person extends AbstractEntity
{
    /**
     * @var string
     */
    protected $firstName = 'Alex';

    /**
     * @var string
     */
    protected $lastName = 'Kellner';

    /**
     * @return string {object.firstName}
     */
    public function getFirstName(): string
    {
        return $this->firstName;
    }

    /**
     * @param string $firstName
     * @return Person
     */
    public function setFirstName(string $firstName): self
    {
        $this->firstName = $firstName;
        return $this;
    }

    /**
     * @return string
     */
    public function getLastName(): string
    {
        return $this->lastName;
    }

    /**
     * @param string $lastName
     * @return Person
     */
    public function setLastName(string $lastName): self
    {
        $this->lastName = $lastName;
        return $this;
    }

    /**
     * @return bool {object.night}
     */
    public function isNight(): bool
    {
        return true;
    }
}
