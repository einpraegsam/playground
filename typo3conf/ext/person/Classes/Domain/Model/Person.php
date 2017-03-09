<?php
namespace Ukn\Person\Domain\Model;


/***************************************************************
 *
 *  Copyright notice
 *
 *  (c) 2017 Alex Kellner <alexander.kellner@in2code.de>, In2code
 *
 *  All rights reserved
 *
 *  This script is part of the TYPO3 project. The TYPO3 project is
 *  free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 3 of the License, or
 *  (at your option) any later version.
 *
 *  The GNU General Public License can be found at
 *  http://www.gnu.org/copyleft/gpl.html.
 *
 *  This script is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.
 *
 *  This copyright notice MUST APPEAR in all copies of the script!
 ***************************************************************/

/**
 * Person
 */
class Person extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
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

}