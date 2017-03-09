<?php

namespace Ukn\Person\Tests\Unit\Domain\Model;

/***************************************************************
 *  Copyright notice
 *
 *  (c) 2017 Alex Kellner <alexander.kellner@in2code.de>, In2code
 *
 *  All rights reserved
 *
 *  This script is part of the TYPO3 project. The TYPO3 project is
 *  free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 2 of the License, or
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
 * Test case for class \Ukn\Person\Domain\Model\Person.
 *
 * @copyright Copyright belongs to the respective authors
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 *
 * @author Alex Kellner <alexander.kellner@in2code.de>
 */
class PersonTest extends \TYPO3\CMS\Core\Tests\UnitTestCase
{
	/**
	 * @var \Ukn\Person\Domain\Model\Person
	 */
	protected $subject = NULL;

	public function setUp()
	{
		$this->subject = new \Ukn\Person\Domain\Model\Person();
	}

	public function tearDown()
	{
		unset($this->subject);
	}

	/**
	 * @test
	 */
	public function getFirstNameReturnsInitialValueForString()
	{
		$this->assertSame(
			'',
			$this->subject->getFirstName()
		);
	}

	/**
	 * @test
	 */
	public function setFirstNameForStringSetsFirstName()
	{
		$this->subject->setFirstName('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'firstName',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getLastNameReturnsInitialValueForString()
	{
		$this->assertSame(
			'',
			$this->subject->getLastName()
		);
	}

	/**
	 * @test
	 */
	public function setLastNameForStringSetsLastName()
	{
		$this->subject->setLastName('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'lastName',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getDateOfBirthReturnsInitialValueForDateTime()
	{
		$this->assertEquals(
			NULL,
			$this->subject->getDateOfBirth()
		);
	}

	/**
	 * @test
	 */
	public function setDateOfBirthForDateTimeSetsDateOfBirth()
	{
		$dateTimeFixture = new \DateTime();
		$this->subject->setDateOfBirth($dateTimeFixture);

		$this->assertAttributeEquals(
			$dateTimeFixture,
			'dateOfBirth',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getDescriptionReturnsInitialValueForString()
	{
		$this->assertSame(
			'',
			$this->subject->getDescription()
		);
	}

	/**
	 * @test
	 */
	public function setDescriptionForStringSetsDescription()
	{
		$this->subject->setDescription('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'description',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getShowProfileReturnsInitialValueForBool()
	{
		$this->assertSame(
			FALSE,
			$this->subject->getShowProfile()
		);
	}

	/**
	 * @test
	 */
	public function setShowProfileForBoolSetsShowProfile()
	{
		$this->subject->setShowProfile(TRUE);

		$this->assertAttributeEquals(
			TRUE,
			'showProfile',
			$this->subject
		);
	}
}
