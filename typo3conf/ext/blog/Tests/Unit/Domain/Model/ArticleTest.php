<?php
namespace In2code\Blog\Tests\Unit\Domain\Model;

/**
 * Test case.
 *
 * @author Alex Kellner <alexander.kellner@in2code.de>
 */
class ArticleTest extends \TYPO3\CMS\Core\Tests\UnitTestCase
{
    /**
     * @var \In2code\Blog\Domain\Model\Article
     */
    protected $subject = null;

    protected function setUp()
    {
        parent::setUp();
        $this->subject = new \In2code\Blog\Domain\Model\Article();
    }

    protected function tearDown()
    {
        parent::tearDown();
    }

    /**
     * @test
     */
    public function getTitleReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getTitle()
        );
    }

    /**
     * @test
     */
    public function setTitleForStringSetsTitle()
    {
        $this->subject->setTitle('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'title',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getTextReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getText()
        );
    }

    /**
     * @test
     */
    public function setTextForStringSetsText()
    {
        $this->subject->setText('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'text',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getAuthorReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getAuthor()
        );
    }

    /**
     * @test
     */
    public function setAuthorForStringSetsAuthor()
    {
        $this->subject->setAuthor('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'author',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getPublicationDateReturnsInitialValueForDateTime()
    {
        self::assertEquals(
            null,
            $this->subject->getPublicationDate()
        );
    }

    /**
     * @test
     */
    public function setPublicationDateForDateTimeSetsPublicationDate()
    {
        $dateTimeFixture = new \DateTime();
        $this->subject->setPublicationDate($dateTimeFixture);

        self::assertAttributeEquals(
            $dateTimeFixture,
            'publicationDate',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getPublishedReturnsInitialValueForBool()
    {
        self::assertSame(
            false,
            $this->subject->getPublished()
        );
    }

    /**
     * @test
     */
    public function setPublishedForBoolSetsPublished()
    {
        $this->subject->setPublished(true);

        self::assertAttributeEquals(
            true,
            'published',
            $this->subject
        );
    }
}
