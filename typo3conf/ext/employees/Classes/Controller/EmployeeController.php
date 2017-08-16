<?php
namespace In2code\Employees\Controller;

use In2code\Employees\Domain\Model\Employee;
use TYPO3\CMS\Extbase\Mvc\Controller\ActionController;

/**
 * Class EmployeeController
 */
class EmployeeController extends ActionController
{
    /**
     * @var \In2code\Employees\Domain\Repository\EmployeeRepository
     * @inject
     */
    protected $employeeRepository = null;

    /**
     * @return void
     */
    public function listAction()
    {
        $employees = $this->employeeRepository->findAll();
        $this->view->assign('employees', $employees);
    }

    /**
     * @param Employee $employee
     * @return void
     */
    public function detailAction(Employee $employee)
    {
        $this->view->assign('employee', $employee);
    }
}
