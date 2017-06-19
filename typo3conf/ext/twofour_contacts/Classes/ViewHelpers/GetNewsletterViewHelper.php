<?php
namespace Twofour\TwofourContacts\ViewHelpers;

use Twofour\TwofourContacts\Domain\Model\Contact;
use TYPO3\CMS\Fluid\Core\ViewHelper\AbstractViewHelper;

/**
 * Class GetNewsletterViewHelper
 */
class GetNewsletterViewHelper extends AbstractViewHelper
{

    /**
     * @param Contact $contact
     * @return bool
     */
    public function render(Contact $contact): bool
    {
        return $contact->getNewsletter() && $this->isAtLeast18($contact);
    }

    /**
     * @param Contact $contact
     * @return bool
     */
    protected function isAtLeast18(Contact $contact): bool
    {
        $birthdate = $contact->getBirthDate();
        return $birthdate->diff(new \DateTime())->y >= 18;
    }
}
