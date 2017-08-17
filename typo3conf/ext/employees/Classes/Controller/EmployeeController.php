<?php
declare(strict_types=1);
namespace In2code\Employees\Controller;

use In2code\Employees\Domain\Model\Employee;
use In2code\Employees\Domain\Model\Dto\FilterDto;
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
     * @param FilterDto $filter
     * @return void
     */
    public function listAction(FilterDto $filter = null)
    {
        $employees = $this->employeeRepository->findByFilter($filter);
        $this->view->assign('employees', $employees);
        $this->view->assign('filter', $filter);
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
