<?php
namespace In2code\Template\DataProcessing;

use In2code\Employees\Domain\Model\Employee;
use In2code\Employees\Domain\Repository\EmployeeRepository;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Extbase\Object\ObjectManager;
use TYPO3\CMS\Frontend\ContentObject\ContentObjectRenderer;
use TYPO3\CMS\Frontend\ContentObject\DataProcessorInterface;

/**
 * Class PageTitleProcessor
 */
class PageTitleProcessor implements DataProcessorInterface
{

    /**
     * @param ContentObjectRenderer $cObj The data of the content element or page
     * @param array $contentObjectConfiguration The configuration of Content Object
     * @param array $processorConfiguration The configuration of this processor
     * @param array $processedData Key/value store of processed data (e.g. to be passed to a Fluid View)
     * @return array the processed data as key/value store
     */
    public function process(
        ContentObjectRenderer $cObj,
        array $contentObjectConfiguration,
        array $processorConfiguration,
        array $processedData
    ): array {
        $processedData = [
            'pagetitle' => $this->getTitle()
        ];
        return $processedData;
    }

    /**
     * Decide which title should be processed
     *
     * @return string
     */
    protected function getTitle(): string
    {
        $title = $this->getTitleFromPage();
        if ($this->isEmployeeDetailPage()) {
            $title = $this->getTitleFromEmployeesDetailAction();
        }
        return $title;
    }

    /**
     * @return string
     */
    protected function getTitleFromEmployeesDetailAction(): string
    {
        $employeeRepository = GeneralUtility::makeInstance(ObjectManager::class)->get(EmployeeRepository::class);
        /** @var Employee $employee */
        $employee = $employeeRepository->findByUid($this->getEmployeeUid());
        return $employee->getFullname();
    }

    /**
     * @return string
     * @SuppressWarnings(PHPMD.Superglobals)
     */
    protected function getTitleFromPage(): string
    {
        return (string)$GLOBALS['TSFE']->page['title'];
    }

    /**
     * @return bool
     */
    protected function isEmployeeDetailPage(): bool
    {
        $employeeArguments = $this->getEmployeeArguments();
        return (string)$employeeArguments['action'] === 'detail';
    }

    /**
     * @return int
     */
    protected function getEmployeeUid(): int
    {
        $employeeArguments = $this->getEmployeeArguments();
        return (int)$employeeArguments['employee'];
    }

    /**
     * @return array
     */
    protected function getEmployeeArguments(): array
    {
        return (array)GeneralUtility::_GPmerged('tx_employees_pi1');
    }
}
