<?php
namespace Twofour\TwofourContacts\Controller;

use Twofour\TwofourContacts\Domain\Model\Contact;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Extbase\Mvc\Controller\ActionController;

/**
 * ContactController
 */
class ContactController extends ActionController
{
    /**
     * contactRepository
     *
     * @var \Twofour\TwofourContacts\Domain\Repository\ContactRepository
     * @inject
     */
    protected $contactRepository = null;

    /**
     * @param array $filter
     * @return void
     */
    public function listAction(array $filter = [])
    {
        $contacts = $this->contactRepository->findByFilter($filter);
        $this->view->assignMultiple([
            'contacts' => $contacts,
            'filter' => $filter
        ]);
    }

    /**
     * @param Contact $contact
     * @return void
     */
    public function detailAction(Contact $contact)
    {
        $this->view->assign('contact', $contact);
    }
}
