<?php
namespace In2code\Persons\ViewHelpers;

use In2code\Persons\Domain\Model\Person;
use TYPO3\CMS\Extbase\Utility\LocalizationUtility;
use TYPO3\CMS\Fluid\Core\ViewHelper\AbstractViewHelper;

/**
 * Class NewsletterViewHelper
 */
class NewsletterViewHelper extends AbstractViewHelper
{

    /**
     * @param Person $person
     * @return string
     */
    public function render(Person $person): string
    {
        $key = 'no';
        if ($person->isNewsletter()) {
            $key = 'yes';
        }
        return LocalizationUtility::translate($key, 'Persons');
    }
}
