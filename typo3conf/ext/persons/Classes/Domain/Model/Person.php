<?php
namespace In2code\Persons\Domain\Model;

use In2code\Persons\Domain\Service\AdultService;
use In2code\Persons\Utility\StringUtility;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Extbase\DomainObject\AbstractEntity;

/***
 *
 * This file is part of the "Personlist" Extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 *  (c) 2017 Alex Kellner <alexander.kellner@in2code.de>, in2code
 *
 ***/

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
     * newsletter
     *
     * @var bool
     */
    protected $newsletter = false;

    /**
     * birthdate
     *
     * @var \DateTime
     */
    protected $birthdate = null;

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
        return StringUtility::firstLetterUpper($this->firstName);
    }

    /**
     * @param string $firstName
     * @return Person
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
     * @return Person
     */
    public function setLastName(string $lastName)
    {
        $this->lastName = $lastName;
        return $this;
    }

    /**
     * @return bool
     */
    public function isNewsletter(): bool
    {
        return $this->newsletter;
    }

    /**
     * @param bool $newsletter
     * @return Person
     */
    public function setNewsletter(bool $newsletter)
    {
        $this->newsletter = $newsletter;
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
     * @return Person
     */
    public function setBirthdate(\DateTime $birthdate)
    {
        $this->birthdate = $birthdate;
        return $this;
    }

    /**
     * @return \TYPO3\CMS\Extbase\Domain\Model\FileReference
     */
    public function getImage(): \TYPO3\CMS\Extbase\Domain\Model\FileReference
    {
        return $this->image;
    }

    /**
     * @param \TYPO3\CMS\Extbase\Domain\Model\FileReference $image
     * @return Person
     */
    public function setImage(\TYPO3\CMS\Extbase\Domain\Model\FileReference $image)
    {
        $this->image = $image;
        return $this;
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
    public function isOver18(): bool
    {
        $adultService = GeneralUtility::makeInstance(AdultService::class);
        return $adultService->isOver18($this);
    }
}
