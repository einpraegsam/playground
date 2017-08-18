<?php
declare(strict_types=1);
namespace In2code\Employees\Domain\Model;

use In2code\Employees\Domain\Service\BirthdateService;
use In2code\Employees\Utility\StringUtility;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Extbase\DomainObject\AbstractEntity;

/**
 * Class Employee
 */
class Employee extends AbstractEntity
{
    /**
     * @var string
     * @validate NotEmpty
     */
    protected $firstName = '';

    /**
     * @var string
     * @validate NotEmpty
     */
    protected $lastName = '';

    /**
     * @var string
     * @validate NotEmpty
     * @ validate \In2code\Employees\Domain\Validation\UniqueEmailValidator
     */
    protected $email;

    /**
     * @var string
     */
    protected $description = '';

    /**
     * @var \DateTime
     */
    protected $birthdate = null;

    /**
     * @var bool
     */
    protected $companyMobile = false;

    /**
     * @var \TYPO3\CMS\Extbase\Domain\Model\FileReference
     * @cascade remove
     */
    protected $image = null;

    /**
     * @var \DateTime
     */
    protected $crdate = null;

    /**
     * @var array
     */
    protected $propertiesForArray = [
        'uid',
        'firstName',
        'lastName'
    ];

    /**
     * @return string
     */
    public function getFirstName(): string
    {
        return StringUtility::firstCharacterUppercase($this->firstName);
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
        return StringUtility::firstCharacterUppercase($this->lastName);
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
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @param string $email
     * @return Employee
     */
    public function setEmail(string $email)
    {
        $this->email = $email;
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
     * @return \DateTime
     */
    public function getCrdate()
    {
        return $this->crdate;
    }

    /**
     * @param \DateTime $crdate
     * @return Employee
     */
    public function setCrdate(\DateTime $crdate)
    {
        $this->crdate = $crdate;
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
        if ($birthdate !== null) {
            $birthdateService = GeneralUtility::makeInstance(BirthdateService::class);
            return $birthdateService->isAtLeast18($birthdate);
        }
        return false;
    }

    /**
     * @return array
     */
    public function getPropertiesForSuggestAction(): array
    {
        $properties = [];
        foreach ($this->propertiesForArray as $property) {
            $properties[$property] = $this->_getProperty($property);
        }
        return $properties;
    }
}
