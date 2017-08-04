<?php
namespace Group\Person\ViewHelpers;

use Group\Person\Domain\Model\Person;
use Group\Person\Domain\Service\BirthdateService;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Fluid\Core\ViewHelper\AbstractViewHelper;

/**
 * Class IsAtLeast18ViewHelper
 */
class IsAtLeast18ViewHelper extends AbstractViewHelper
{

    /**
     * @param Person $person
     * @return bool
     */
    public function render(Person $person): bool
    {
        $birthdate = $person->getBirthDate();
        if ($birthdate !== null) {
            $birthdateService = GeneralUtility::makeInstance(BirthdateService::class);
            return $birthdateService->isAtLeast18($birthdate);
        }
        return false;
    }
}
