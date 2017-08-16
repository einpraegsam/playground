<?php
namespace In2code\Employees\Controller;

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
     * action list
     *
     * @return void
     */
    public function listAction()
    {
        $employees = $this->employeeRepository->findAll();
        $this->view->assign('employees', $employees);
    }
}
