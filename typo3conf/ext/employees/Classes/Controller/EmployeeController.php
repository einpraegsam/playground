<?php
declare(strict_types=1);
namespace In2code\Employees\Controller;

use In2code\Employees\Domain\Model\Employee;
use In2code\Employees\Domain\Model\Dto\FilterDto;
use TYPO3\CMS\Extbase\Mvc\Controller\ActionController;
use TYPO3\CMS\Extbase\Property\TypeConverter\DateTimeConverter;
use TYPO3\CMS\Extbase\Utility\LocalizationUtility;

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
     * @var \TYPO3\CMS\Extbase\Persistence\Generic\PersistenceManager
     * @inject
     */
    protected $persistenceManager;

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
     * @return void
     */
    public function list2Action()
    {
        $employees = $this->employeeRepository->findAll();
        \TYPO3\CMS\Extbase\Utility\DebuggerUtility::var_dump($employees, 'in2code: ' . __CLASS__ . ':' . __LINE__);
    }

    /**
     * @param Employee $employee
     * @return void
     */
    public function detailAction(Employee $employee)
    {
        $this->view->assign('employee', $employee);
        $this->changePageMetaInformation($employee);
    }

    /**
     * @return void
     */
    public function newAction()
    {
    }

    /**
     * @return void
     */
    public function initializeCreateAction()
    {
        $this->checkAuthentication();
        $this->prepareBirthdateArguments();
    }

    /**
     * @param Employee $employee
     * @return void
     */
    public function createAction(Employee $employee)
    {
        $this->employeeRepository->add($employee);
        $this->persistenceManager->persistAll();
        $this->addFlashMessage(
            LocalizationUtility::translate('flashmessage.new', 'employees', [$employee->getFullname()])
        );
        $this->redirect('list');
    }

    /**
     * @param Employee $employee
     * @return void
     */
    public function editAction(Employee $employee)
    {
        $this->view->assign('employee', $employee);
    }

    /**
     * @return void
     */
    public function initializeUpdateAction()
    {
        $this->prepareBirthdateArguments();
    }

    /**
     * @param Employee $employee
     * @return void
     */
    public function updateAction(Employee $employee)
    {
        $this->checkAuthentication();
        $this->employeeRepository->update($employee);
        $this->persistenceManager->persistAll();
        $this->addFlashMessage(
            LocalizationUtility::translate('flashmessage.update', 'employees', [$employee->getFullname()])
        );
        $this->redirect('list');
    }

    /**
     * @param string $search
     * @return string
     */
    public function suggestAjaxAction(string $search): string
    {
        $employees = $this->employeeRepository->findByLastNamePart($search);
        $employeesArray = [];
        /** @var Employee $employee */
        foreach ($employees as $employee) {
            $employeesArray[] = $employee->getPropertiesForSuggestAction();
        }
        return json_encode($employeesArray);
    }

    /**
     * Deactivate unneeded errormessages in validation result viewhelper
     *
     * @return bool
     */
    protected function getErrorFlashMessage()
    {
        return false;
    }

    /**
     * Check if fe_user is logged in
     *
     * @SuppressWarnings(PHPMD.Superglobals)
     * @return void
     */
    protected function checkAuthentication()
    {
        if ((int)$GLOBALS['TSFE']->fe_user->user['uid'] === 0) {
            $this->forward('list');
        }
    }

    /**
     * @return void
     */
    protected function prepareBirthdateArguments()
    {
        $configuration = $this->arguments->getArgument('employee')->getPropertyMappingConfiguration();
        $configuration->forProperty('birthdate')->setTypeConverterOption(
            DateTimeConverter::class,
            DateTimeConverter::CONFIGURATION_DATE_FORMAT,
            LocalizationUtility::translate('format.date', 'employees')
        );
    }

    /**
     * @param Employee $employee
     * @return void
     * @SuppressWarnings(PHPMD.Superglobals)
     */
    protected function changePageMetaInformation(Employee $employee)
    {
        $GLOBALS['TSFE']->page['title'] = $employee->getFullname();
        $GLOBALS['TSFE']->page['keywords'] = $employee->getFullname();
        $GLOBALS['TSFE']->page['description'] = $employee->getFullname();
        $GLOBALS['TSFE']->indexedDocTitle = $employee->getFullname();
    }
}
