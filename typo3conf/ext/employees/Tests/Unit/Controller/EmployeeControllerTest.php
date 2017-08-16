<?php
namespace In2code\Employees\Tests\Unit\Controller;

/**
 * Test case.
 *
 * @author Alex Kellner <alexander.kellner@in2code.de>
 */
class EmployeeControllerTest extends \TYPO3\CMS\Core\Tests\UnitTestCase
{
    /**
     * @var \In2code\Employees\Controller\EmployeeController
     */
    protected $subject = null;

    protected function setUp()
    {
        parent::setUp();
        $this->subject = $this->getMockBuilder(\In2code\Employees\Controller\EmployeeController::class)
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
    public function listActionFetchesAllEmployeesFromRepositoryAndAssignsThemToView()
    {

        $allEmployees = $this->getMockBuilder(\TYPO3\CMS\Extbase\Persistence\ObjectStorage::class)
            ->disableOriginalConstructor()
            ->getMock();

        $employeeRepository = $this->getMockBuilder(\In2code\Employees\Domain\Repository\EmployeeRepository::class)
            ->setMethods(['findAll'])
            ->disableOriginalConstructor()
            ->getMock();
        $employeeRepository->expects(self::once())->method('findAll')->will(self::returnValue($allEmployees));
        $this->inject($this->subject, 'employeeRepository', $employeeRepository);

        $view = $this->getMockBuilder(\TYPO3\CMS\Extbase\Mvc\View\ViewInterface::class)->getMock();
        $view->expects(self::once())->method('assign')->with('employees', $allEmployees);
        $this->inject($this->subject, 'view', $view);

        $this->subject->listAction();
    }
}
