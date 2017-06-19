<?php
namespace Twofour\TwofourContacts\Tests\Unit\Controller;

/**
 * Test case.
 *
 * @author Alex Kellner <alexander.kellner@in2code.de>
 */
class ContactControllerTest extends \TYPO3\CMS\Core\Tests\UnitTestCase
{
    /**
     * @var \Twofour\TwofourContacts\Controller\ContactController
     */
    protected $subject = null;

    protected function setUp()
    {
        parent::setUp();
        $this->subject = $this->getMockBuilder(\Twofour\TwofourContacts\Controller\ContactController::class)
            ->setMethods(['redirect', 'forward', 'addFlashMessage'])
            ->disableOriginalConstructor()
            ->getMock();
    }

    protected function tearDown()
    {
        parent::tearDown();
    }

    /**
     * @test
     */
    public function listActionFetchesAllContactsFromRepositoryAndAssignsThemToView()
    {

        $allContacts = $this->getMockBuilder(\TYPO3\CMS\Extbase\Persistence\ObjectStorage::class)
            ->disableOriginalConstructor()
            ->getMock();

        $contactRepository = $this->getMockBuilder(\Twofour\TwofourContacts\Domain\Repository\ContactRepository::class)
            ->setMethods(['findAll'])
            ->disableOriginalConstructor()
            ->getMock();
        $contactRepository->expects(self::once())->method('findAll')->will(self::returnValue($allContacts));
        $this->inject($this->subject, 'contactRepository', $contactRepository);

        $view = $this->getMockBuilder(\TYPO3\CMS\Extbase\Mvc\View\ViewInterface::class)->getMock();
        $view->expects(self::once())->method('assign')->with('contacts', $allContacts);
        $this->inject($this->subject, 'view', $view);

        $this->subject->listAction();
    }
}
