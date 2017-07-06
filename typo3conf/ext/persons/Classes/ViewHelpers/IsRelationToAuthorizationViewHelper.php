<?php
namespace In2code\Persons\ViewHelpers;

use In2code\Persons\Domain\Model\Authorization;
use In2code\Persons\Domain\Model\Person;
use TYPO3\CMS\Fluid\Core\ViewHelper\AbstractViewHelper;

/**
 * Class IsRelationToAuthorizationViewHelper
 */
class IsRelationToAuthorizationViewHelper extends AbstractViewHelper
{

    /**
     * @param Person $person
     * @param Authorization $authorization
     * @return bool
     */
    public function render(Person $person, Authorization $authorization): bool
    {
        foreach ($person->getAuthorizations() as $personAuthorization) {
            if ($personAuthorization === $authorization) {
                return true;
            }
        }
        return false;
    }
}
