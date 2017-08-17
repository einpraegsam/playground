<?php
declare(strict_types=1);
namespace In2code\Employees\Domain\Validation;

use In2code\Employees\Domain\Repository\EmployeeRepository;
use In2code\Employees\Utility\ObjectUtility;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Extbase\Validation\Validator\AbstractValidator;

/**
 * Class UniqueEmailValidator
 */
class UniqueEmailValidator extends AbstractValidator
{
    /**
     * @param string $email
     * @return void
     */
    protected function isValid($email = '')
    {
        if (!GeneralUtility::validEmail($email)) {
            $this->addError('Not a valid email address', 1502975089754);
            return;
        }
        $employeeRepository = ObjectUtility::getObjectManager()->get(EmployeeRepository::class);
        if ($employeeRepository->findByEmail($email)->count() > 0) {
            $this->addError('Email is already registered', 1502978169443);
        }
        return;
    }
}
