<?php
namespace In2code\Employees\Domain\Model;

use TYPO3\CMS\Extbase\DomainObject\AbstractEntity;

/**
 * Class Employee
 */
class Employee extends AbstractEntity
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
     * description
     *
     * @var string
     */
    protected $description = '';

    /**
     * birthdate
     *
     * @var \DateTime
     */
    protected $birthdate = null;

    /**
     * companyMobile
     *
     * @var bool
     */
    protected $companyMobile = false;

    /**
     * image
     *
     * @var \TYPO3\CMS\Extbase\Domain\Model\FileReference
     * @cascade remove
     */
    protected $image = null;

    /**
     * @return string
     */
    public function getFirstName(): string
    {
        return $this->firstName;
    }

    /**
     * @param string $firstName
     * @return Employee
     */
    public function setFirstName(string $firstName)
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
     * @return Employee
     */
    public function setLastName(string $lastName)
    {
        $this->lastName = $lastName;
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
     * @return Employee
     */
    public function setDescription(string $description)
    {
        $this->description = $description;
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getBirthdate()
    {
        return $this->birthdate;
    }

    /**
     * @param \DateTime $birthdate
     * @return Employee
     */
    public function setBirthdate(\DateTime $birthdate)
    {
        $this->birthdate = $birthdate;
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
     * @return Employee
     */
    public function setCompanyMobile(bool $companyMobile)
    {
        $this->companyMobile = $companyMobile;
        return $this;
    }

    /**
     * @return \TYPO3\CMS\Extbase\Domain\Model\FileReference
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * @param \TYPO3\CMS\Extbase\Domain\Model\FileReference $image
     * @return Employee
     */
    public function setImage(\TYPO3\CMS\Extbase\Domain\Model\FileReference $image)
    {
        $this->image = $image;
        return $this;
    }

    /**
     * @return string
     */
    public function getFullname(): string
    {
        return $this->getFirstName() . ' ' . $this->getLastName();
    }

    /**
     * @return bool
     */
    public function isAtLeast18(): bool
    {
        $birthdate = $this->getBirthdate();
        return $birthdate->diff(new \DateTime())->y >= 18;
    }
}
