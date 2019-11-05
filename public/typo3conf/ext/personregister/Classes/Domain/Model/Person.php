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
     * @var string
     */
    protected $room = '';

    /**
     * @var string
     */
    protected $phone = '';

    /**
     * @var bool
     */
    protected $gender = false;

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

    /**
     * @return string
     */
    public function getRoom(): string
    {
        return $this->room;
    }

    /**
     * @param string $room
     * @return Person
     */
    public function setRoom(string $room): self
    {
        $this->room = $room;
        return $this;
    }

    /**
     * @return string
     */
    public function getPhone(): string
    {
        return $this->phone;
    }

    /**
     * @param string $phone
     * @return Person
     */
    public function setPhone(string $phone): self
    {
        $this->phone = $phone;
        return $this;
    }

    /**
     * @return bool
     */
    public function isGender(): bool
    {
        return $this->gender;
    }

    /**
     * @param bool $gender
     * @return Person
     */
    public function setGender(bool $gender): self
    {
        $this->gender = $gender;
        return $this;
    }

    /**
     * @return array
     */
    public function getAllProperties()
    {
        return $this->_getProperties();
    }
}
